<?php


namespace App\Service;

use App\Jobs\CheckProductReviewJob;
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
    protected $productReviewService;

    public function __construct(
        ProductRepository $repository,
        CartRepository $cartRepository,
        BillRepository $billRepository,
        ProductReviewRepository $productReviewRepository,
        DataProcessorService $dataProcessorService,
        ProductReviewService $productReviewService
    ) {
        $this->repository = $repository;
        $this->cartRepository = $cartRepository;
        $this->billRepository = $billRepository;
        $this->productReviewRepository = $productReviewRepository;
        $this->dataProcessorService = $dataProcessorService;
        $this->productReviewService = $productReviewService;
    }

    public function getProductHome()
    {
        $products = $this->repository->getProductHome();

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
        $data = $this->repository->searchProducts($inputs);
        $this->getCart(request()->cookie('cookie_id'));
        return $data;
    }

    public function show($slug)
    {
        $product = $this->repository->getProductDetail($slug);
        $reviewProduct = $this->productReviewService->getAllReview($product->id);

        $productRecommend = ['data' => []];
        if (env('APP_ENV') != 'local')
            $productRecommend = $this->dataProcessorService->recommendProducts([
                'user_id' => auth()->id() ?? 0,
                'cookie_id' => request()->cookie('cookie_id') ?? 'tmp',
            ]);
        $userId = '';
        if (auth()->check()) {
            $userId = auth()->id();
            $product->liked = $product->likes->contains('id', $userId) ?? false;
            $product->review = $this->productReviewService->checkReview($product->id, $userId) ?? null;
        }

        $cookieId = request()->cookie('cookie_id');

        if (env('APP_ENV') != 'local')
            ProductInteractionJob::dispatch($userId, $cookieId, $product->id);

        return [
            'success' => true,
            'data' => $product,
            'recommend' => $productRecommend['data'],
            'reviewProduct' => $reviewProduct,
        ];
    }

    public function showCart()
    {
        if (auth()->check() && empty(request()->cookie('cookie_id'))) {
            $userId = auth()->id();
            $carts = $this->cartRepository->whereFirst('user_id', $userId);
            $cookie_id = \Str::random(32);
            \Cookie::queue('cookie_id', $cookie_id, 60 * 24 * 30);
            if ($carts) {
                $carts->cookie_id = $cookie_id;
                $carts->save();
            }
        } else {
            $cookie = request()->cookie('cookie_id');
            $carts = $this->cartRepository->whereFirst('cookie_id', $cookie);
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

        $product = $this->repository->whereFirst('slug', $slug);

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
        $cartDetails = mb_convert_encoding($cartDetails, 'UTF-8', 'UTF-8');
        $cart->cart_details = json_encode($cartDetails);
        $cart->total += array_sum(array_column($cartDetails, 'total'));
        if (auth()->check())
            $cart->user_id = auth()->id();

        $cart->save();
        $cart->fresh();

        return ['success' => true, 'data' => $product];
    }

    public function getCart($cookie_id)
    {
        if (auth()->check()) {
            $userId = auth()->id();
            $cartUser = $this->cartRepository->whereFirst('user_id', $userId);
            if (isset($cartUser) && $cartUser->cookie_id != $cookie_id) {
                $cartCookie = $this->cartRepository->whereFirst('cookie_id', $cookie_id);

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

        $cart = $this->cartRepository->firstOrCreate(['cookie_id' => $cookie_id]);
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
        $product = $this->repository->whereFirst('slug', $slug);
        if (!$product)
            return ['success' => false, 'message' => 'Product not found'];

        $userId = auth()->id();
        $hasLiked = $product->likes()->where('user_id', $userId)->exists();
        $product->likes()->toggle($userId);

        $product->like_count = $hasLiked ? max(0, $product->like_count - 1) : $product->like_count + 1;
        $product->save();

        return ['success' => true, 'liked' => !$hasLiked];
    }

    public function reviewProduct($inputs)
    {
        $product = $this->repository->whereFirst('slug', $inputs['slug']);
        if (!$product)
            return ['success' => false, 'message' => 'Sản phẩm không tồn tại'];

        $userId = auth()->id();
        $inputs['user_id'] = $userId;
        $inputs['product_id'] = $product->id;

        $review = $this->productReviewRepository->whereFirst([
            'product_id' => $inputs['product_id'],
            'user_id' => $userId
        ]);

        if ($review) {
            $review->update([
                "comment" => $inputs['review'],
                "rating" => $inputs['rating'],
            ]);
        } else {
            $review = $this->productReviewRepository->create([
                "product_id" => $inputs['product_id'],
                "user_id" => $userId,
                "comment" => $inputs['review'],
                "rating" => $inputs['rating'],
            ]);
        }
        $billIds = $this->billRepository->getBillByUser($userId);
        $billIds = $billIds->pluck('id')->join(',');
        \DB::statement(
            "UPDATE bill_details SET review = :review WHERE bill_id IN ($billIds) AND product_id = :product_id",
            ['review' => 0, 'product_id' => $product->id]
        );

        if(env('APP_ENV') != 'local')
            CheckProductReviewJob::dispatch($userId, $product->id, $inputs['review']);
        
        return ['success' => true, 'data' => $review];
    }
}