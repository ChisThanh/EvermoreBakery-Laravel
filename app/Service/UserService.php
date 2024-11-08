<?php


namespace App\Service;

use App\Repositories\UserRepository;

class UserService extends BaseService
{
    protected $repository;
    public function __construct(
    ) {
        $this->repository = UserRepository::getInstance();
    }

}