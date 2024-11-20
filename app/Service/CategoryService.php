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
        $topCategories = $this->repository->getCategoryHome();
        $topCategories->transform(function ($item) {
            $item->image = $item->images->first()->url ?? null;
            return $item;
        });
        return $topCategories;
    }
}