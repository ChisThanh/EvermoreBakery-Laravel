<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Str;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(Product::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product');
        CRUD::setEntityNameStrings('product', 'products');

        $this->crud->addColumn([
            'name' => 'category_id',
            'type' => 'select',
            'label' => 'Category name',
            'entity' => 'category',
            'attribute' => 'name',
            'model' => "App\Models\Category",
        ]);

        $this->crud->addColumn([
            'name' => 'image',
            'type' => 'image',
            'label' => 'Image',
            'width' => '50px',
            'height' => '50px',
            'value' => function ($entry) {
                if (
                    Str::startsWith(
                        $entry->image,
                        ['http', 'https']
                    )
                ) {
                    return "http://localhost:9090/storage/images/products/gJeGtNP1pJhkYC6JV1M3ycB6W5mf26GEzLAkEzFA.jpg";
                }
                return asset('storage/' . $entry->image);
            }
        ]);
    }

    public function store(ProductRequest $request)
    {
        $image = "";
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')
            ->store('images/products', 'public'); 
            $image = $imagePath; 
        }
        $product = $this->crud->model->create([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'price' => $request->input('price'),
            'price_sale' => $request->input('price_sale'),
            'description' => $request->input('description'),
            'image' => $image,
            'stock_quantity' => $request->input('stock_quantity')
        ]);

        \Alert::success(trans('backpack::crud.insert_success'))->flash();
        return $this->crud->performSaveAction($product->id);
    }

    public function update()
    {
        $this->crud->hasAccessOrFail('update');

        $request = $this->crud->validateRequest();
        $array = $request->all();

        $item = $this->crud->model->findOrFail($request->id);
        if ($request->hasFile('image')) {
                \Storage::disk('public')->delete($item->image);

            $imagePath = $request->file('image')
                ->store('images/products', 'public');
            $array['image'] = $imagePath;
        }

        $item->update($array);

        \Alert::success(trans('backpack::crud.update_success'))->flash();
        return $this->crud->performSaveAction($item->getKey());
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ProductRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::addField([
            'name' => 'category_id',
            'label' => "Category",
            'type' => 'select',
            'entity' => 'category', // Tên phương thức quan hệ trong model
            'model' => 'App\Models\Category', // Đường dẫn tới model Category
            'attribute' => 'name', // Trường hiển thị tên category
            'attributes' => ['required' => 'required'], // Đánh dấu là bắt buộc
        ]);

        CRUD::addField([
            'name' => 'price',
            'type' => 'number',
            'label' => 'Price',
            'prefix' => '$',
            'attributes' => ["step" => "1"]
        ]);

        CRUD::addField([
            'name' => 'price_sale',
            'type' => 'number',
            'label' => 'Price sale',
            'prefix' => '$',
            'attributes' => ["step" => "1"]
        ]);

        CRUD::addField([
            'name' => 'image',
            'type' => 'upload',
            'label' => 'Image',
            'upload' => true,
            'prefix' => 'storage/'
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
