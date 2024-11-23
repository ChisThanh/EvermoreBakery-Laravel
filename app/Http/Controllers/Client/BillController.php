<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Service\BillService;
use Illuminate\Http\Request;

class BillController extends Controller
{
    protected $service;

    public function __construct(
        BillService $service
    ) {
        $this->service = $service;
    }

    public function cancel($id)
    {
        $res = $this->service->cancelBill($id);

        if ($res['success'] === false)
            return redirect()->back()
                ->with('error', 'Hệ thống lỗi xin vui lòng thử lại');

        return redirect()->back()->with('success', 'Hủy đơn thành công');
    }

    public function repaymentVnPay($id)
    {
        $res = $this->service->repaymentVnPay($id);

        if ($res['success'] === false)
            return redirect()->back()
                ->with('error', 'Hệ thống lỗi xin vui lòng thử lại');
                
        $url = $res['url'];
        return redirect($url);
    }

    public function HandleCheckout(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'street' => 'required',
            'city' => 'required',
            'district' => 'required',
            'ward' => 'required',
            'note' => 'string|nullable',
            'payment' => 'required',
        ], [
            'name.required' => 'Tên không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'street.required' => 'Đường không được để trống',
            'city.required' => 'Thành phố không được để trống',
            'district.required' => 'Quận không được để trống',
            'ward.required' => 'Phường không được để trống',
            'payment.required' => 'Phương thức thanh toán không được để trống',
        ]);

        $data = $this->service->store($request->all());

        if ($data['success'] === false)
            return redirect()->back()->with('error', $data['message']);

        if (isset($data['url']))
            return redirect($data['url']);

        return redirect()
            ->route('products')
            ->with('success', 'Đặt hàng thành công');
    }

    public function CheckoutCallback(Request $request)
    {
        $inputs = $request->validate([
            "vnp_TransactionStatus" => "required",
            "vnp_ResponseCode" => "required",
            "vnp_TxnRef" => "required",
        ]);

        $data = $this->service->updateBillStatusPayment($inputs);

        if ($data['success'] === false)
            return redirect()->route('products')
                ->with('error', $data['message']);

        return redirect()
            ->route('products')
            ->with('success', 'Đặt hàng thành công');
    }
}