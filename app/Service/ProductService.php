<?php


namespace App\Service;

use App\Jobs\ProductInteractionJob;
use App\Repositories\BillRepository;
use App\Repositories\CartRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ProductReviewRepository;

class ProductService extends BaseService
{
    protected $repository;
    protected $cartRepository;
    protected $billRepository;
    protected $productReviewRepository;
    protected $dataProcessorService;

    public function __construct(
        ProductRepository $repository,
        CartRepository $cartRepository,
        BillRepository $billRepository,
        ProductReviewRepository $productReviewRepository,
        DataProcessorService $dataProcessorService

    ) {
        $this->repository = $repository;
        $this->cartRepository = $cartRepository;
        $this->billRepository = $billRepository;
        $this->productReviewRepository = $productReviewRepository;
        $this->dataProcessorService = $dataProcessorService;
    }

    public function getProductHome()
    {
        $model = $this->repository->getModel();
        $products = $model
            ->select('id', 'name', 'category_id', 'price', 'price_sale', 'slug', 'created_at')
            ->with([
                'category:id,name',
                'images:id,imageable_id,url',
                'likes:id',
                'events' => function ($query) {
                    $query->where('start_date', '<=', now())
                        ->where('end_date', '>=', now())
                        ->orderBy('event_products.created_at', 'desc')
                        ->limit(1);
                },
            ])
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();

        $products->transform(function ($product) {
            $product->category_name = $product->category->name;
            $product->image = $product->images->first()->url ?? null;
            $product->liked = auth()->check() ? $product->likes->contains('id', auth()->id()) : false;
            return $product;
        });

        return $products;
    }

    public function index(array $inputs): mixed
    {
        $model = $this->repository->getModel();
        $query = $model->search(strtolower($inputs['q'] ?? ''))
            ->query(function ($query) use ($inputs) {
                $query->select('id', 'name', 'category_id', 'price', 'price_sale', 'slug')
                    ->with([
                        'category:id,name',
                        'images:id,imageable_id,url',
                        'likes:id',
                        'events' => function ($query) {
                            $query->where('start_date', '<=', now())
                                ->where('end_date', '>=', now())
                                ->orderBy('event_products.created_at', 'desc')
                                ->limit(1);
                        },
                    ]);
            });

        $data = $query->paginate($inputs['limit'] ?? 9);
        $data->transform(function ($product) {
            $product->category_name = $product->category->name;
            $product->image = $product->images->first()->url ?? null;
            $product->liked = auth()->check() ? $product->likes->contains('id', auth()->id()) : false;
            return $product;
        });

        $this->getCart(request()->cookie('cookie_id'));
        return $data;
    }

    public function show($slug)
    {
        $model = $this->repository->getModel();
        $product = $model->where('slug', $slug)
            ->with([
                'category',
                'images',
                'likes',
                'latestEvent',
            ])
            ->first();

        if (!$product)
            $product = $model->first();

        $productRecommend = $this->dataProcessorService->recommendProducts([
            'user_id' => auth()->id() ?? 0,
            'cookie_id' => request()->cookie('cookie_id') ?? 'tmp',
        ]);

        $product->liked = false;
        $userId = '';
        if (auth()->check()) {
            $userId = auth()->id();
            $product->liked = $product->likes->contains('id', $userId);
        }

        $cookieId = request()->cookie('cookie_id');
        dispatch(new ProductInteractionJob($userId, $cookieId, $product->id));

        return [
            'success' => true,
            'data' => $product,
            'recommend' => $productRecommend['data'],
        ];
    }

    public function showCart()
    {
        $model = $this->cartRepository->getModel();
        if (auth()->check() && empty(request()->cookie('cookie_id'))) {
            $userId = auth()->id();
            $carts = $model->where('user_id', $userId)->first();
            $cookie_id = \Str::random(32);
            \Cookie::queue('cookie_id', $cookie_id, 60 * 24 * 30);
            if ($carts) {
                $carts->cookie_id = $cookie_id;
                $carts->save();
            }
        } else {
            $cookie = request()->cookie('cookie_id');
            $carts = $model->where('cookie_id', $cookie)->first();
        }
        $cartDetails = [];
        if ($carts)
            $cartDetails = json_decode($carts->cart_details, true) ?? [];

        return [
            "success" => true,
            "cartDetails" => $cartDetails,
            "total" => $carts->total ?? 0
        ];
    }

    public function addToCart($slug)
    {
        $cookie_id = request()->cookie('cookie_id');

        if (!auth()->check() && !request()->cookie('cookie_id')) {
            $cookie_id = \Str::random(32);
            \Cookie::queue('cookie_id', $cookie_id, 60 * 24 * 30);
        }

        $product = $this->repository->getModel()
            ->where('slug', $slug)
            ->first();

        if (!$product)
            return ['success' => false, 'message' => 'Product not found'];

        $cart = $this->getCart($cookie_id)['data'];
        if (!$cart)
            return ['success' => false, 'message' => 'Cart not found'];

        $cartDetails = json_decode($cart->cart_details, true) ?? [];
        $productId = $product->id;

        if (isset($cartDetails[$productId])) {
            $cartDetails[$productId]['quantity'] += 1;
        } else {
            $cartDetails[$productId] = [
                'quantity' => 1,
                'price' => $product->price_sale,
                'product_name' => substr($product->name, 0, 20) . '...',
                'slug' => $product->slug,
                'category_name' => $product->category->name,
                'image' => $product->images->first()->url ?? null,
            ];
        }

        $cartDetails[$productId]['total'] = $cartDetails[$productId]['quantity'] * $product->price_sale;
        $cart->cart_details = json_encode($cartDetails);
        $cart->total += array_sum(array_column($cartDetails, 'total'));
        if (auth()->check())
            $cart->user_id = auth()->id();

        $cart->save();

        return ['success' => true, 'data' => $product];
    }

    public function getCart($cookie_id)
    {
        $cartModel = $this->cartRepository->getModel();
        if (auth()->check()) {
            $userId = auth()->id();
            $cartUser = $cartModel->firstWhere('user_id', $userId);
            if (isset($cartUser) && $cartUser->cookie_id != $cookie_id) {
                $cartCookie = $cartModel->firstWhere('cookie_id', $cookie_id);

                $jsonCartUser = json_decode($cartUser->cart_details, true) ?? [];
                $jsonCartCookie = json_decode($cartCookie->cart_details, true) ?? [];
                $mergedArray = array_merge_recursive($jsonCartUser, $jsonCartCookie);
                $cartUser->cart_details = json_encode($mergedArray);
                $cartUser->total += $cartCookie->total;
                $cartUser->cookie_id = $cookie_id;
                $cartUser->save();
                $cartCookie->delete();
            }
            if ($cartUser) {
                $cartUser->cookie_id = $cookie_id;
                $cartUser->save();
                return [
                    'success' => true,
                    'data' => $cartUser,
                ];
            }
        }

        $cart = $cartModel->firstOrCreate(['cookie_id' => $cookie_id]);
        return ['success' => true, 'data' => $cart];
    }

    public function updateFromCart($slug, $quantity)
    {
        $cookie_id = request()->get('cartId') ?? request()->cookie('cookie_id');

        $cart = $this->getCart($cookie_id)['data'];
        $cartDetails = json_decode($cart->cart_details, true) ?? [];
        foreach ($cartDetails as $index => $cartDetail) {
            if ($cartDetail['slug'] == $slug && $quantity <= 99) {
                $cartDetail['quantity'] += (int) $quantity;
                $cartDetail['total'] = $cartDetail['quantity'] * $cartDetail['price'];
                if ($cartDetail['quantity'] <= 0) {
                    unset($cartDetails[$index]);
                } else {
                    $cartDetails[$index] = $cartDetail;
                }
                break;
            }
        }
        $cart->cart_details = json_encode($cartDetails);
        $cart->total = array_sum(array_column($cartDetails, 'total'));
        $cart->save();

        return ['success' => true];
    }

    public function likeProduct($slug)
    {
        $product = $this->repository->getModel()->where('slug', $slug)->first();
        if (!$product)
            return ['success' => false, 'message' => 'Product not found'];

        $userId = auth()->id();
        $hasLiked = $product->likes()->where('user_id', $userId)->exists();
        $product->likes()->toggle($userId);

        $product->like_count = $hasLiked ? max(0, $product->like_count - 1) : $product->like_count + 1;
        $product->save();

        return ['success' => true, 'liked' => !$hasLiked];
    }

    public function productReview($inputs)
    {
        $userId = auth()->id();
        $inputs['user_id'] = $userId;
        $modelProductReview = $this->productReviewRepository->getModel();

        $review = $modelProductReview->where('product_id', $inputs['product_id'])
            ->where('user_id', $userId)
            ->first();

        if ($review) {
            $review->update([
                "comment" => $inputs['comment'],
                "rating" => $inputs['rating'],
            ]);
        } else {
            $review = $modelProductReview->create([
                "product_id" => $inputs['product_id'],
                "user_id" => auth()->id(),
                "comment" => $inputs['comment'],
                "rating" => $inputs['rating'],
            ]);
        }
        return ['success' => true, 'data' => $review];
    }
}