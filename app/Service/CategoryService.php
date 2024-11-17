<?php


namespace App\Service;

use App\Repositories\CategoryRepository;


class CategoryService extends BaseService
{
    protected $repository;
    public function __construct(
        CategoryRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function getCategoryHome()
    {
        $model = $this->repository->getModel();

        $topCategories = $model->query()
            ->leftJoin('products', 'products.category_id', '=', 'categories.id')
            ->leftJoin('bill_details', 'bill_details.product_id', '=', 'products.id')
            ->select('categories.id', 'categories.name', 'categories.description', \DB::raw('COUNT(bill_details.bill_id) AS total_sales'))
            ->groupBy('categories.id', 'categories.name', 'categories.description')
            ->orderBy('total_sales', 'desc')
            ->limit(3)
            ->get();

        if ($topCategories->isEmpty()) {
            $topCategories = $model->query()
            ->select('id', 'name', 'description')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        }

        return $topCategories;
    }



}