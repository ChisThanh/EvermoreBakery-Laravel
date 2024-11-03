<?php   

namespace App\Service;

class BaseService
{
    protected $repository;

    // public function index(Request $request)
    // {
    //     $query = $this->model->query();
    //     if ($request->has('q')) {
    //         $query->where('name', 'like', '%' . $request->q . '%');
    //     }

    //     if ($request->has('sort')) {
    //         $query->orderBy($request->sort, $request->order ?? 'asc');
    //     }

    //     // ví dụ filter[id]=1&filter[name]=sadmin
    //     if ($request->has('filter')) {
    //         foreach ($request->filter as $key => $value) {
    //             if (!empty($value)) {
    //                 $query->where($key, 'like', '%' . $value . '%');
    //             }
    //         }
    //     }
    //     $data = $query->paginate($request->limit ?? 10);
    //     return view($this->view . '.index', compact('data'));
    // }

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