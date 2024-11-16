<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CouponRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class CouponCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use PermissionTrait;

    public function setup()
    {
        CRUD::setModel(\App\Models\Coupon::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/coupon');
        CRUD::setEntityNameStrings('coupon', 'coupons');
        $this->checkPermission();
    }

    protected function setupListOperation()
    {
        CRUD::setFromDb();
    }


    protected function setupCreateOperation()
    {
        CRUD::setValidation(CouponRequest::class);
        CRUD::setFromDb();
    }


    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
