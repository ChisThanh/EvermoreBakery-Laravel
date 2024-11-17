<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EventRequest;
use App\Models\EventProduct;
use App\Models\Product;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\Request;


class EventCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation { show as traitShow;
    }


    public function setup()
    {
        CRUD::setModel(\App\Models\Event::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/event');
        CRUD::setEntityNameStrings('event', 'events');
        CRUD::addButton('line', 'add_product', 'view', 'vendor.backpack.ui.customs.btn-event', 'beginning', false);
        CRUD::addButton('line', 'cal_product', 'view', 'vendor.backpack.ui.customs.btn-event-cal', 'beginning', false);
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

    public function viewAddProduct($id)
    {
        $eventProducts = EventProduct::where('event_id', $id)->get();
        $products = Product::select('id', 'name')
            ->whereNotIn('id', $eventProducts->pluck('product_id'))
            ->get();

        return view('vendor.backpack.ui.customs.add-product', compact('products'));
    }

    public function addProduct(Request $request, $id)
    {
        if (sizeof($request->product_id) != sizeof($request->per)) {
            \Alert::error('Có lỗi xảy ra!!, Bạn đã chọn trùng hoặc thiếu dữ liệu')->flash();
            return redirect()->back();
        }

        $insert = [];
        $now = date('Y-m-d H:i:s');
        foreach ($request->product_id as $key => $value) {
            $insert[] = [
                'event_id' => $id,
                'product_id' => $value,
                'percentage' => $request->per[$key],
                'created_at' => $now,
                'updated_at' => $now
            ];
        }
        try {
            EventProduct::insert($insert);
        } catch (\Exception $e) {
            \Alert::error('Có lỗi xảy ra!!, Bạn đã chọn trùng hoặc thiếu dữ liệu')->flash();
            return redirect()->back();
        }

        \Alert::success(trans('backpack::crud.update_success'))->flash();
        return redirect('/admin/event');
    }

    public function show($id)
    {
        $event = \App\Models\Event::find($id);
        $eventProducts = EventProduct::where('event_id', $id)
            ->leftJoin('products', 'event_products.product_id', '=', 'products.id')
            ->select('event_products.*', 'products.name as product_name')
            ->get();
        return view('vendor.backpack.ui.customs.event-details', compact('event', 'eventProducts'));
    }

    public function edit($id)
    {
        $event = \App\Models\Event::find($id);
        $eventProducts = EventProduct::where('event_id', $id)
            ->leftJoin('products', 'event_products.product_id', '=', 'products.id')
            ->select('event_products.*', 'products.name as product_name')
            ->get();
        return view('vendor.backpack.ui.customs.event-edit', compact('event', 'eventProducts'));
    }

    public function update(Request $request, $id)
    {
        try {
            $event = \App\Models\Event::find($id);
            $event->update($request->all());

            foreach ($request->ids as $key => $value) {
                if (!is_null($request->per[$key])) {
                    \DB::table('event_products')
                        ->where('product_id', $value)
                        ->where('event_id', $id)
                        ->update(['percentage' => $request->per[$key]]);
                }
            }

            if (isset($request->del) && sizeof($request->del) > 0)
                \DB::table('event_products')
                    ->where('event_id', $id)
                    ->whereIn('product_id', $request->del)
                    ->delete();

            \Alert::success(trans('backpack::crud.update_success'))->flash();

        } catch (\Exception $e) {
            \Alert::error('Có lỗi xảy ra!!')->flash();
            return redirect()->back();
        }

        return redirect("/admin/event/$id/show");
    }

    public function destroy($id)
    {
        \DB::table('event_products')->where('event_id', $id)->delete();
        return \App\Models\Event::destroy($id);
    }

    public function calculatePriceSale($id)
    {
        try {
            \App\Models\Event::findOrFail($id);
            $eventProducts = \DB::table('event_products')
                ->where('event_id', $id)
                ->get();

            $productIds = $eventProducts->pluck('product_id')->toArray();
            $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

            foreach ($eventProducts as $item) {
                $product = $products->get($item->product_id);
                if ($product) {
                    $product->price_sale = (int)($product->price * (1 - $item->percentage / 100));
                    $product->save();
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Cập nhật trạng thái đơn hàng thành công'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }

    }
}


