<?php

namespace App\Repositories;

abstract class BaseRepository
{
    protected $model;
    private static $instance = null;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    abstract public function getModel();

    public static function getInstance(): mixed
    {
        if (self::$instance === null) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    public function all(): mixed
    {
        return $this->model->all();
    }

    public function paginate($perPage = 10): mixed
    {
        return $this->model->paginate($perPage);
    }

    public function search(array $columns, mixed $value): mixed
    {
        return $this->model->where(function ($query) use ($columns, $value): void {
            foreach ($columns as $column) {
                $query->orWhere($column, 'like', '%' . $value . '%');
            }
        })->get();
    }

    public function where($column, $value): mixed
    {
        return $this->model->where($column, $value)->get();
    }

    public function find($id): mixed
    {
        return $this->model->find($id);
    }

    public function create(array $data): mixed
    {
        return $this->model->create($data);
    }

    public function update($id, array $data): mixed
    {
        $record = $this->model->find($id);
        if (!$record)
            return false;
        $record->update($data);
        return $record;
    }

    public function delete($id): mixed
    {
        $record = $this->model->find($id);
        if (!$record)
            return false;
        return $record->delete();
    }

    public function deleteIds(array $ids, $field = 'id'): mixed
    {
        if (empty($ids))
            return false;
        return $this->model->whereIn($field, $ids)->delete();
    }

}