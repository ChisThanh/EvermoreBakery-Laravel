<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Service\BillService;

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
}