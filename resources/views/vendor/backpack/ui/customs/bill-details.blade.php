@extends(backpack_view('blank'))

@section('content')
    <div class="app-body flex-grow-1 px-2">
        <main class="main">
            <nav aria-label="breadcrumb" class="d-none d-lg-block">
                <ol class="breadcrumb bg-transparent p-0 mx-3 justify-content-end">
                    <li class="breadcrumb-item text-capitalize"><a href="http://localhost:9090/admin/dashboard">Quản trị</a>
                    </li>
                    <li class="breadcrumb-item text-capitalize"><a href="http://localhost:9090/admin/bill">Hóa đơn</a>
                    </li>
                    <li class="breadcrumb-item text-capitalize active" aria-current="page">Xem lại</li>
                </ol>
            </nav>
            <div class="container-fluid d-flex justify-content-between my-3">
                <section class="header-operation animated fadeIn d-flex mb-2 align-items-baseline d-print-none"
                    bp-section="page-header">
                    <h1 class="text-capitalize mb-0" bp-section="page-heading">Hóa đơn</h1>
                    <p class="ms-2 ml-2 mb-0" bp-section="page-subheading">Xem lại hóa đơn</p>
                    <p class="ms-2 ml-2 mb-0" bp-section="page-subheading-back-button">
                        <small><a href="http://localhost:9090/admin/bill" class="font-sm">
                                <i class="la la-angle-double-left"></i> Quay lại danh sách
                                <span>hóa đơn</span></a></small>
                    </p>
                </section>
                <a href="javascript: window.print();" class="btn float-end float-right">
                    <i class="la la-print"></i>
                </a>
            </div>
            <div class="container-fluid animated fadeIn">
                <div class="row" bp-section="crud-operation-show">
                    <div class="col-md-12">
                        <div class="">
                            <div class="card no-padding no-border mb-0">
                                <table class="table table-striped m-0 p-0">
                                    <tbody>
                                        <tr>
                                            <td><strong>Ngày giao:</strong></td>
                                            <td><span>
                                                    {{ $bill->delivery_date }}
                                                </span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tổng tiền:</strong></td>
                                            <td><span>{{ $bill->total }} đ</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tình tạng thanh toán:</strong></td>
                                            <td><span>
                                                    @php
                                                        $payment_status = [
                                                            '1' => 'Đã thanh toán',
                                                            '2' => 'Chưa thanh toán',
                                                        ];
                                                        echo $payment_status[$bill->payment_status] ?? "Chưa thanh toán";
                                                    @endphp

                                                </span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Phương thức thanh toán:</strong></td>
                                            <td><span>
                                                    @php
                                                        $payment_method = [
                                                            '1' => 'Thanh toán khi nhận hàng',
                                                            '2' => 'Thanh toán qua thẻ',
                                                        ];
                                                        echo $payment_method[$bill->payment_method];
                                                    @endphp
                                                </span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Trình trạng hóa đơn:</strong></td>
                                            <td><span>
                                                    @php
                                                        $status = [
                                                            '1' => 'Chờ xác nhận',
                                                            '2' => 'Đang xử lý',
                                                            '3' => 'Đã giao hàng',
                                                            '4' => 'Hũy bỏ',
                                                            '5' => 'Hoàn thành',
                                                        ];
                                                        echo $status[$bill->status] ?? "Chờ xác nhận";
                                                    @endphp
                                                </span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Mã giảm giá:</strong></td>
                                            <td><span>{{ $bill->coupon_id }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Note:</strong></td>
                                            <td><span>{{ $bill->note }}</span></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Người nhận:</strong></td>
                                            <td><span>{{ $billAddress->name }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Số điện thoại:</strong></td>
                                            <td><span>{{ $billAddress->phone }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Địa chỉ</strong></td>
                                            <td><span>{{ $billAddress->street . ',' . $billAddress->ward . ',' . $billAddress->district . ',' . $billAddress->city }}</span>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card no-padding no-border mb-0 mt-5">
                    <table class="table table-striped m-0 p-0 ">
                        <thead>
                            <tr>
                                <th scope="col"><strong>Tên sản phẩm</strong></th>
                                <th scope="col"><strong>Số lượng</strong></th>
                                <th scope="col"><strong>Đơn giá</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($billDetails as $item)
                                <tr>
                                    <th scope="row"> {{ $item->product->name }}</th>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->price }} đ</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>
@endsection
