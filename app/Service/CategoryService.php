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
        return $topCategories;
    }
}