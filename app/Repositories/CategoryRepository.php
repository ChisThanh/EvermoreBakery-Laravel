<?php


namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{
    protected function getModel()
    {
        return Category::class;
    }

    public function getCategoryHome()
    {
        $topCategories = $this->model->query()
            ->leftJoin('products', 'products.category_id', '=', 'categories.id')
            ->leftJoin('bill_details', 'bill_details.product_id', '=', 'products.id')
            ->select('categories.id', 'categories.name', 'categories.description', \DB::raw('COUNT(bill_details.bill_id) AS total_sales'))
            ->groupBy('categories.id', 'categories.name', 'categories.description')
            ->orderBy('total_sales', 'desc')
            ->limit(3)
            ->get();

        if ($topCategories->isEmpty()) {
            $topCategories = $this->model->query()
                ->select('id', 'name', 'description')
                ->orderBy('created_at', 'desc')
                ->limit(3)
                ->get();
        }
        return $topCategories;
    }
}