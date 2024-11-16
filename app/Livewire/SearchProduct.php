<?php
namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class SearchProduct extends Component
{
    // <input type="text" wire:model.live="search">
    use WithPagination;
    public $search = '';
    public $limit = 9;
    public $categoryName = null;
    public $price = null;

    protected $queryString = ['search', 'limit', 'categoryName', 'price'];
    protected $listeners = ['setSearch', 'setCategory', 'setPrice'];

    public function render()
    {
        return view('livewire.search-product', [
            'products' => $this->searchProduct(),
            'categories' => $this->getCategory(),
        ]);
    }
    public function setSearch($value)
    {
        if (!is_null($value))
            $this->search = $value;
    }

    public function setCategory($category)
    {
        $this->categoryName = $category;
    }

    public function setPrice($price)
    {
        if (!in_array($price, ['asc', 'desc', null]))
            $price = 'asc';
        $this->price = $price;
    }

    public function searchSubmit()
    {
        return null;
    }
    public function searchProduct()
    {
        if ($this->categoryName)
            $options['filter_by'] = 'category:=' . $this->categoryName;

        $query = Product::search(strtolower($this->search ?? ''))
            ->options($options ?? []);

        if ($this->price)
            $query->orderBy('price', $this->price);

        $query->query(function ($query) {
            $query->select('id', 'name', 'category_id', 'price', 'price_sale', 'slug')
                ->with([
                    'category:id,name',
                    'images:id,imageable_id,url',
                    'likes:id',
                    'events' => function ($query) {
                        $query->orderBy('event_products.created_at', 'desc')->limit(1);
                    },
                ]);
        });

        $data = $query->paginate($this->limit ?? 9);
        $data->transform(function ($product) {
            $product->category_name = $product->category->name;
            $product->image = $product->images->first()->url ?? null;
            $product->liked = false;
            return $product;
        });

        if (auth()->check()) {
            $userId = auth()->id();
            $data->transform(function ($product) use ($userId) {
                $product->liked = $product->likes->contains('id', $userId);
                return $product;
            });
        }
        return $data;
    }

    public function getCategory()
    {
        // return cache()->remember('categories', 60 * 24 * 30, function () {
        //     return Category::select('id', 'name')->get();
        // });
        return Category::select('id', 'name')->get();
    }
}
