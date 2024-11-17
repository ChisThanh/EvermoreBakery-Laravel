<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BillRequest;
use App\Models\Bill;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;


class BillCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation { show as traitShow; }


    public function setup()
    {
        CRUD::setModel(\App\Models\Bill::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/bill');
        CRUD::setEntityNameStrings('bill', 'bills');
        CRUD::denyAccess('delete');
        CRUD::denyAccess('update');
        CRUD::denyAccess('create');

        $this->crud->addColumn([
            'name' => 'payment_method',
            'label' => 'Phương thức thanh toán',
            'type' => 'select_from_array',
            'options' => [
                '1' => 'Thanh toán khi nhận hàng',
                '2' => 'Thanh toán qua thẻ',
            ],
        ]);
        $this->crud->addColumn([
            'name' => 'payment_status',
            'label' => 'Trình tạng thanh toán',
            'type' => 'select_from_array',
            'options' => [
                '1' => 'Đã thanh toán',
                '2' => 'Chưa thanh toán',
            ],
        ]);
        $this->crud->addColumn([
            'name' => 'user_id',
            'type' => 'select',
            'label' => 'Người đặt hàng',
            'entity' => 'user',
            'attribute' => 'name',
            'model' => "App\Models\User",
        ]);
        $this->crud->addColumn([
            'name' => 'quick_update',
            'label' => 'Thay đổi trình trạng',
            'type' => 'custom_html',
            'value' => function ($entry) {
                return '
                <select class="form-select"  onchange="updateStatusBill(' . $entry->id . ', this)">
                    <option value="1" ' . ($entry->status == 1 ? 'selected' : '') . '>Chờ xác nhận</option>
                    <option value="2" ' . ($entry->status == 2 ? 'selected' : '') . '>Đang xử lý</option>
                    <option value="3" ' . ($entry->status == 3 ? 'selected' : '') . '>Đang giao hàng</option>
                    <option value="4" ' . ($entry->status == 4 ? 'selected' : '') . '>Đã giao hàng</option>
                    <option value="5" ' . ($entry->status == 5 ? 'selected' : '') . '>Hủy bỏ</option>
                </select>
                ';
            },
        ]);
    }


    protected function setupListOperation()
    {
        CRUD::setFromDb();
    }


    protected function setupCreateOperation()
    {
        CRUD::setValidation(BillRequest::class);
        CRUD::setFromDb();
    }


    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }


    public function show($id)
    {
        $bill = Bill::with(['details.product', 'address', 'user'])->find($id);
        $billDetails = $bill->details;
        $billAddress = $bill->address;
        return view(
            "vendor.backpack.ui.customs.bill-details",
            compact('bill', 'billDetails', 'billAddress')
        );
    }

    public function updateStatus($id, $status)
    {
        $bill = Bill::findOrFail($id);
        $statusBase = [Bill::STATUS_PENDING, Bill::STATUS_PROCESSING, Bill::STATUS_DELIVERY, Bill::STATUS_COMPLETED, Bill::STATUS_CANCEL];

        if (!in_array($status, $statusBase)) {
            return response()->json([
                'success' => false,
                'message' => 'Trạng thái không hợp lệ'
            ]);
        }

        $bill->status = $status;
        if ($status == Bill::STATUS_DELIVERY)
            $bill->delivery_date = now();

        $bill->save();
        return response()->json([
            'success' => true,
            'message' => 'Cập nhật trạng thái đơn hàng thành công'
        ]);
    }
}
