<?php


namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository
{
    protected function getModel()
    {
        return Product::class;
    }

    public function getProductDetail($slug)
    {
        $product = $this->model->where('slug', $slug)
            ->with([
                'category',
                'images',
                'likes',
                'latestEvent',
            ])
            ->first();

        if (!$product)
            $product = $this->model->first();
        return $product;
    }

    public function getProductHome()
    {
        return $this->model
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
    }

    public function searchProducts($inputs)
    {
        $query = $this->model->search(strtolower($inputs['q'] ?? ''))
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
        return $data;
    }
}