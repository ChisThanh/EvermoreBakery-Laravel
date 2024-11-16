<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EventRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;


class EventCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;


    public function setup()
    {
        CRUD::setModel(\App\Models\Event::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/event');
        CRUD::setEntityNameStrings('event', 'events');
        CRUD::addButton('line', 'add_product', 'view', 'vendor.backpack.ui.customs.btn-event', 'beginning', false);
    }


    protected function setupListOperation()
    {
        CRUD::setFromDb();
        CRUD::setOperationSetting('lineButtonsAsDropdown', true);
    }


    protected function setupCreateOperation()
    {
        CRUD::setValidation(EventRequest::class);
        CRUD::setFromDb();
    }


    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
