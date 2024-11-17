<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Jobs\GenerateKeywordJob;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ProductCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use PermissionTrait;

    public function setup()
    {
        CRUD::setModel(\App\Models\Product::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product');
        CRUD::setEntityNameStrings('product', 'products');
        $this->checkPermission();
        $this->crud->addColumn([
            'name' => 'category_id',
            'type' => 'select',
            'label' => 'Thể loại',
            'entity' => 'category',
            'attribute' => 'name',
            'model' => "App\Models\Category",
        ]);
        $this->crud->addColumn([
            'name' => 'image',
            'type' => 'image',
            'label' => 'Hình ảnh',
            'width' => '50px',
            'height' => '50px',
            'value' => function ($entry) {
                return optional($entry->images->first())->url
                    ? asset('storage/' . $entry->images->first()->url)
                    : null;
            }
        ]);
    }

    protected function setupListOperation()
    {
        CRUD::setFromDb();
        CRUD::setOperationSetting('lineButtonsAsDropdown', true);
        $this->crud->addClause('with', 'images');
    }


    protected function setupCreateOperation()
    {
        CRUD::setValidation(ProductRequest::class);
        CRUD::setFromDb();

        CRUD::addField([
            'name' => 'category_id',
            'label' => "Thể loại",
            'type' => 'select',
            'entity' => 'category',
            'model' => 'App\Models\Category',
            'attribute' => 'name',
        ]);

        CRUD::addField([
            'name' => 'price',
            'type' => 'number',
            'label' => 'Giá',
            'prefix' => '$',
            'attributes' => ["step" => "1"]
        ]);

        CRUD::addField([
            'name' => 'images',
            'label' => 'Hình ảnh',
            'type' => 'upload_multiple',
            'upload' => true,
            'disk' => 'public',
            'prefix' => 'storage/',
            'temporary' => 10,
            'hint' => 'Tải lên nhiều hình ảnh.',
        ]);

        CRUD::removeField('price_sale');
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
            'type' => 'upload_multiple',
            'upload' => true,
            'temporary' => 10,
            'hint' => 'Tải lên nhiều hình ảnh.',
        ]);
    }

    public function store(ProductRequest $request)
    {
        $product = $this->crud->model->create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'price_sale' => $request->price,
            'description' => $request->description,
        ]);

        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('images/products', 'public');
                $images[] = ['url' => $path];
            }
            $product->images()->createMany($images);
        }
        \Alert::success(trans('backpack::crud.insert_success'))->flash();
        dispatch(new GenerateKeywordJob(
            $product->id,
            $product->name . ' ' . $product->description
        ));
        return $this->crud->performSaveAction($product->id);
    }

    public function update(ProductRequest $request)
    {
        $item = $this->crud->model->findOrFail($request->id);
        if ($request->has('old') && $request->hasFile('images_new')) {
            $ids = [];
            foreach ($request->old as $image) {
                [$id, $url] = explode('_', $image);
                $ids[] = $id;
                \Storage::disk('public')->delete($url);
            }
            $item->images()->whereIn('id', $ids)->delete();

            if ($request->hasFile('images_new')) {
                $images = [];
                foreach ($request->file('images_new') as $image) {
                    $path = $image->store('images/products', 'public');
                    $images[] = ['url' => $path];
                }
                $item->images()->createMany($images);
            }
        }
        $item->update($request->all());
        \Alert::success(trans('backpack::crud.update_success'))->flash();
        return $this->crud->performSaveAction($item->getKey());
    }
}
