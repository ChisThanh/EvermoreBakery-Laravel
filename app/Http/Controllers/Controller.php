<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class Controller
{
    protected $model;
    protected $view;

    public function __construct()
    {
        $this->setModel();
        $this->setView();
    }

    abstract public function setModel();
    abstract public function setView();

    public function index(Request $request)
    {
        $query = $this->model->query();
        if ($request->has('q')) {
            $query = $query->where('name', 'like', '%' . $request->q . '%')->get();
        }
        if($request->has('sort')){
            $query = $query->orderBy($request->sort, $request->order ?? 'asc');
        }
        if($request->has('filter')){
            // ?filter[id]=1&filter[name]=sadmin
            foreach($request->filter as $key => $value){
                $query = $query->where($key, 'like', '%' . $value . '%');
            }
        }
        $data = $query->paginate($request->limit ?? 10);
        return view($this->view . '.index', compact('data'));
    }

    public function create()
    {
        return view($this->view .'.create');
    }

    public function store(Request $request)
    {
        $this->validateInputs($request);
        $this->model->create($request->all());
        return redirect()->route($this->view .'.index');
    }

    public function show($id)
    {
        $data = $this->model->find($id);
        if(!$data){
            return redirect()->back()->with('error',  __('Data not found'));
        }
        return view($this->view .'.show', compact('data'));
    }

    public function edit($id)
    {
        $data = $this->model->find($id);
        if(!$data){
            return redirect()->back()->with('error', __('Data not found'));
        }
        return view($this->view .'.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $this->validateInputs($request);
        $data = $this->model->find($id);
        if(!$data){
            return redirect()->back()->with('error', __('Data not found'));
        }
        $data->update($request->all());
        return redirect()->route($this->view .'.index');
    }

    public function validateInputs(Request $request)
    {
        return $request->validate([]);
    }
}
