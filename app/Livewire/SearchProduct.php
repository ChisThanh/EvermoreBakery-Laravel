<?php
namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class SearchProduct extends Component
{
    // <input type="text" wire:model.live="search">
    use WithPagination;
    public $search = '';
    public $limit = 9;
    protected $queryString = ['search', 'limit'];
    protected $listeners = ['setSearch'];

    public function render()
    {
        return view('livewire.search-product', [
            'products' => $this->searchProduct(),
        ]);
    }
    public function setSearch($value)
    {
        if(!is_null($value))
            $this->search = $value;
    }

    public function searchSubmit()
    {
        return null;
    }
    public function searchProduct()
    {
        $query = Product::search(strtolower($this->search ?? ''))
            ->query(function ($query) {
                $query->select('id', 'name', 'category_id', 'price', 'price_sale', 'slug')
                    ->with([
                        'category:id,name',
                        'images:id,imageable_id,url',
                        'likes:id',
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
}
