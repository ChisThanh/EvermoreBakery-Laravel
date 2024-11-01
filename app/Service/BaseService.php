<?php   

namespace App\Service;

class BaseService
{
    protected $repository;

    public function all(): mixed
    {
        return $this->repository->all();
    }

    public function paginate($perPage = 10): mixed
    {
        return $this->repository->paginate($perPage);
    }

    public function search(array $columns, mixed $value): mixed
    {
        return $this->repository->search($columns, $value);
    }

    public function where($column, $value): mixed
    {
        return $this->repository->where($column, $value);
    }

    public function find($id): mixed
    {
        return $this->repository->find($id);
    }

    public function create(array $data): mixed
    {
        return $this->repository->create($data);
    }

    public function update($id, array $data): mixed
    {
        return $this->repository->update($id, $data);
    }

    public function delete($id): mixed
    {
        return $this->repository->destroy($id);
    }
}