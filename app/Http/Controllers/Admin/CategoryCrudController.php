<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\Request;


class CategoryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use PermissionTrait;

    
    public function setup()
    {
        CRUD::setModel(\App\Models\Category::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/category');
        CRUD::setEntityNameStrings('category', 'categories');
        $this->checkPermission();
        $this->crud->addColumn([
            'name' => 'image',
            'type' => 'image',
            'label' => 'Hình ảnh',
            'width' => '50px',
            'height' => '50px',
            'value' => function ($entry) {
                $image = $entry->images()->latest()->first();
                return $image ? asset('storage/' . $image->url) : '';
            }
        ]);
    }

    protected function setupListOperation()
    {
        CRUD::setFromDb();
        $this->crud->addClause('with', 'images');
    }


    protected function setupCreateOperation()
    {
        CRUD::setValidation(CategoryRequest::class);
        CRUD::setFromDb();

        CRUD::addField([
            'name' => 'images',
            'label' => 'Hình ảnh',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public',
            'prefix' => 'storage/',
        ]);
    }


    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
        $this->crud->removeField('images');
        $currentEntry = $this->crud->getCurrentEntry();
        $images = $currentEntry->images()->get();

        CRUD::addField([
            'name' => 'image_old',
            'label' => 'Hình ảnh cũ',
            'type' => 'view',
            'view' => 'vendor.backpack.ui.customs.images',
            'images' => $images,
        ]);
        CRUD::addField([
            'name' => 'images_new',
            'label' => 'Hình ảnh',
            'type' => 'upload',
            'upload' => true,
        ]);
    }

    public function store(CategoryRequest $request)
    {
        $inputs = $request->validated();
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $imagePath = $image->store('categories', 'public');
            $inputs['images'] = $imagePath;
        }
        $category = $this->crud->model->create($inputs);
        $category->images()->create(['url' => $inputs['images']]);
        \Alert::success(trans('backpack::crud.insert_success'))->flash();
        return $this->crud->performSaveAction($category->id);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        $item = $this->crud->model->findOrFail($request->id);
        if ($request->has('old')) {
            $ids = [];
            foreach ($request->old as $image) {
                [$id, $url] = explode('_', $image);
                $ids[] = $id;
                \Storage::disk('public')->delete($url);
            }
            $item->images()->whereIn('id', $ids)->delete();
        }
        if ($item->images()->count() == 0) {
            if ($request->hasFile('images_new')) {
                $image = $request->file('images_new');
                $imagePath = $image->store('categories', 'public');
                $item->images()->create(['url' => $imagePath]);
            }
        }
        $item->update($request->all());
        \Alert::success(trans('backpack::crud.update_success'))->flash();
        return $this->crud->performSaveAction($item->getKey());
    }
}
