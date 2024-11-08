<?php

namespace App\Service;

class BaseService
{
    protected $repository;

    public function index(array $inputs): mixed
    {
        $query = $this->repository->getModel()->query();
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
        return [
            'success' => true,
            'data' => $data
        ];
    }

    public function all(): mixed
    {
        $data = $this->repository->all();
        return [
            'success' => true,
            'data' => $data
        ];
    }

    public function paginate($perPage = 10): mixed
    {
        $data = $this->repository->paginate($perPage);
        return [
            'success' => true,
            'data' => $data
        ];
    }

    public function search(array $columns, mixed $value): mixed
    {
        $data = $this->repository->search($columns, $value);
        return [
            'success' => true,
            'data' => $data
        ];
    }

    public function where($column, $value): mixed
    {
        $data = $this->repository->where($column, $value);
        return [
            'success' => true,
            'data' => $data
        ];
    }

    public function find($id): mixed
    {
        $data = $this->repository->find($id);
        return [
            'success' => true,
            'data' => $data
        ];
    }

    public function create(array $data): mixed
    {
        $data = $this->repository->create($data);
        return [
            'success' => true,
            'data' => $data
        ];
    }

    public function update($id, array $data): mixed
    {
        $data = $this->repository->update($id, $data);
        return [
            'success' => true,
            'data' => $data
        ];
    }

    public function delete($id): mixed
    {
        $check = $this->repository->destroy($id);
        if (!$check) {
            return [
                'success' => false,
                'message' => 'Delete error'
            ];
        }
        return [
            'success' => true,
            'message' => 'Delete success'
        ];
    }
}