<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    protected Model $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract protected function getModel();

    protected function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function getModelInstance(): Model
    {
        return $this->model;
    }

    public function index(array $inputs): mixed
    {
        $query = $this->model->query();

        if (isset($inputs['q']))
            $query->where('name', 'like', '%' . $inputs['q'] . '%');

        if (isset($inputs['sort']))
            $query->orderBy($inputs['sort'], $inputs['order'] ?? 'asc');

        if (isset($inputs['filter'])) {
            foreach ($inputs['filter'] as $key => $value)
                if (!empty($value))
                    $query->where($key, 'like', '%' . $value . '%');
        }

        $data = $query->paginate($inputs['limit'] ?? 10);
        return $data;
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

    /**
     * @param array|string $inputs
     * @param mixed $value = null
     * @param bool $latest = false
     * @param array|null $with = null
     * @return mixed
     */
    public function whereFirst(
        mixed $inputs,
        mixed $value = null,
        array $with = null,
        bool $latest = false,
    ): mixed {
        $query = $this->model;

        if (!is_array($inputs)) {
            $query = $query->where($inputs, $value);
        } else {
            foreach ($inputs as $column => $value) {
                $query = $query->where($column, $value);
            }
        }

        if ($with)
            $query = $query->with($with);

        if ($latest)
            $query = $query->latest();

        return $query->first();
    }

    /**
     * @param array|string $inputs
     * @param mixed $value = null
     * @param bool $latest = false
     * @param array|null $with = null
     * @return mixed
     */
    public function whereAll(
        mixed $inputs,
        mixed $value = null,
        bool $latest = false
    ): mixed {
        $query = $this->model;

        if (!is_array($inputs)) {
            $query = $query->where($inputs, $value);
        } else {
            foreach ($inputs as $column => $value) {
                $query = $query->where($column, $value);
            }
        }
        
        if ($latest)
            $query = $query->latest();

        return $query->first();
    }

    public function whereIn($column, $values, $boolean = 'and', $not = false): mixed
    {
        return $this->model->whereIn($column, $values, $boolean, $not)->get();
    }

    public function firstOrCreate(array $attributes = [], array $values = []): mixed
    {
        $data = $this->model->firstOrCreate($attributes, $values);
        $data = $data->fresh();
        return $data;
    }

    public function find($id): mixed
    {
        return $this->model->find($id);
    }

    public function create(array $data): mixed
    {
        $data = $this->model->create($data);
        $data = $data->fresh();
        return $data;
    }

    public function insert(array $data): mixed
    {
        $data = $this->model->insert($data);
        return $data;
    }

    public function update($id, array $data): mixed
    {
        $record = $this->model->find($id);
        if (!$record)
            return false;
        $record->update($data);
        $record = $record->fresh();
        return $record;
    }

    public function delete($id): mixed
    {
        $record = $this->model->find($id);
        if (!$record)
            return false;
        $record = $record->fresh();
        return $record->delete();
    }

    public function deleteIds(array $ids, $field = 'id'): mixed
    {
        $data = $this->model->whereIn($field, $ids)->delete();
        if ($data == 0)
            return false;
        return $data;
    }

    public function whereDelete($column, $value = null, $operator = '='): mixed
    {
        $data = $this->model->where($column, $operator, $value)->delete();
        if ($data == 0)
            return false;
        return $data;
    }
}