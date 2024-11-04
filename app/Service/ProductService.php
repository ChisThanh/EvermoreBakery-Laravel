<?php


namespace App\Service;

use App\Models\Cart;
use App\Models\Product;
use App\Repositories\CartRepository;
use App\Repositories\ProductRepository;

class ProductService extends BaseService
{
    protected $repository;
    protected $cartRepository;
    public function __construct(
        ProductRepository $repository,
        CartRepository $cartRepository
    ) {
        $this->repository = $repository;
        $this->cartRepository = $cartRepository;
    }


    public function index(array $inputs): mixed
    {
        // \DB::enableQueryLog();
        $model = $this->repository->getModel();

        $query = $model->select('id', 'name', 'category_id', 'price', 'price_sale', 'stock_quantity', 'slug')
            ->with([
                'category:id,name',
                'images:id,imageable_id,url',
                'likes:id',
            ]);

        if (isset($inputs['q'])) {
            $query->where('name', 'like', '%' . $inputs['q'] . '%');
        }

        if (isset($inputs['sort'])) {
            $query->orderBy($inputs['sort'], $inputs['order'] ?? 'asc');
        }

        // ví dụ filter[id]=1&filter[name]=sadmin
        if (isset($inputs['filter'])) {
            foreach ($inputs['filter'] as $key => $value) {
                if (!empty($value)) {
                    $query->where($key, 'like', '%' . $value . '%');
                }
            }
        }
        $data = $query->paginate($inputs['limit'] ?? 10);
        $data->getCollection()->transform(function ($product) {
            $product->category_name = $product->category->name;
            $product->image = $product->images->first()->url ?? null;
            $product->liked = false;
            return $product;
        });

        if (auth()->check()) {
            $userId = auth()->id();
            $data->getCollection()->transform(function ($product) use ($userId) {
                $product->liked = $product->likes->contains('id', $userId);
                return $product;
            });
        }
        // dd(\DB::getQueryLog());
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
            ])
            ->first();

        if (!$product)
            $product = $model->first();

        return $product;
    }

    public function addToCart($slug, $cookie_id = null)
    {
        $product = $this->repository->getModel()->where('slug', $slug)->first();
        if (!$product) {
            return false;
        }

        $cart = $this->getCart($cookie_id);
        if (!$cart) {
            return false;
        }

        $cartDetails = json_decode($cart->cart_details, true) ?? [];
        $productId = $product->id;

        if (isset($cartDetails[$productId])) {
            $cartDetails[$productId]['quantity'] += 1;
        } else {
            $cartDetails[$productId] = [
                'quantity' => 1,
                'price' => $product->price,
                'product_name' => substr($product->name, 0, 20) . '...',
                'slug' => $product->slug,
                'category_name' => $product->category->name,
                'image' => $product->images->first()->url ?? null,
            ];
        }

        $cartDetails[$productId]['total'] = $cartDetails[$productId]['quantity'] * $product->price;
        $cart->cart_details = json_encode($cartDetails);
        $cart->total += array_sum(array_column($cartDetails, 'total'));
        $cart->save();

        return true;
    }

    private function getCart($cookie_id = null)
    {
        $cartModel = $this->cartRepository->getModel();

        if ($cookie_id && !auth()->check()) {
            return $cartModel->firstOrCreate(['cookie_id' => $cookie_id]);
        }

        $user = auth()->user();
        if (!$user) {
            return null;
        }

        $cart = $cartModel->firstOrCreate(['user_id' => $user->id]);

        return $cart;
    }


    // public function showCart()
    // {
    //     $user = auth()->user();
    //     $cartModel = $this->cartRepository->getModel();
    //     $cart = $cartModel->where('user_id', $user->id)->first();
    //     $cartDetails = json_decode($cart->cart_details, true) ?? [];

    //     $productIds = array_keys($cartDetails);
    //     $productModel = $this->repository->getModel();
    //     $products = $productModel->whereIn('id', $productIds)->get();

    //     $products->transform(function ($product) use ($cartDetails) {
    //         $product->quantity = $cartDetails[$product->id]['quantity'];
    //         $product->total = $cartDetails[$product->id]['total'];
    //         return $product;
    //     });

    //     return $products;
    // }

}
// SELECT 
//     p.id AS product_id,
//     p.name AS product_name,
//     p.category_id,
//     p.price,
//     p.stock_quantity,
//     c.id AS category_id,
//     c.name AS category_name,
//     i.id AS image_id,
//     i.imageable_id,
//     i.url AS image_url,
//     u.id AS user_id,
//     l.user_id AS liked_user_id
// FROM 
//     products p
// LEFT JOIN 
//     categories c ON p.category_id = c.id AND c.deleted_at IS NULL
// LEFT JOIN 
//     images i ON i.imageable_id = p.id AND i.imageable_type = 'App\Models\Product'
// LEFT JOIN 
//     likes l ON l.product_id = p.id
// LEFT JOIN 
//     users u ON u.id = l.user_id
// WHERE 
//     p.deleted_at IS NULL
// ORDER BY 
//     p.id
// OFFSET 0 ROWS FETCH NEXT 10 ROWS ONLY;