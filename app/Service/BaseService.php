<?php

namespace App\Service;

class BaseService
{
    protected $repository;

    public function index(array $inputs): mixed
    {
        $data = $this->repository->index($inputs);
        return ['success' => true, 'data' => $data];
    }

    public function all(): mixed
    {
        $data = $this->repository->all();
        return ['success' => true, 'data' => $data];
    }

    public function paginate($perPage = 10): mixed
    {
        $data = $this->repository->paginate($perPage);
        return ['success' => true, 'data' => $data];
    }

    public function search(array $columns, mixed $value): mixed
    {
        $data = $this->repository->search($columns, $value);
        return ['success' => true, 'data' => $data];
    }

    public function where($column, $value): mixed
    {
        $data = $this->repository->where($column, $value);
        return ['success' => true, 'data' => $data];
    }

    public function find($id): mixed
    {
        $data = $this->repository->find($id);
        return ['success' => true, 'data' => $data];
    }

    public function create(array $data): mixed
    {
        $data = $this->repository->create($data);
        return ['success' => true, 'data' => $data];
    }

    public function update($id, array $data): mixed
    {
        $data = $this->repository->update($id, $data);
        return ['success' => true, 'data' => $data];
    }

    public function delete($id): mixed
    {
        $check = $this->repository->destroy($id);
        if (!$check) {
            return ['success' => false, 'message' => 'Delete error'];
        }
        return ['success' => true, 'message' => 'Delete success'];
    }
}