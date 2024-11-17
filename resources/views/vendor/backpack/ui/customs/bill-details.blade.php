@extends(backpack_view('blank'))

@section('content')
    <div class="app-body flex-grow-1 px-2">
        <main class="main">
            <nav aria-label="breadcrumb" class="d-none d-lg-block">
                <ol class="breadcrumb bg-transparent p-0 mx-3 justify-content-end">
                    <li class="breadcrumb-item text-capitalize"><a href="http://localhost:9090/admin/dashboard">Quản Trị</a>
                    </li>
                    <li class="breadcrumb-item text-capitalize"><a href="http://localhost:9090/admin/bill">Hóa Đơn</a>
                    </li>
                    <li class="breadcrumb-item text-capitalize active" aria-current="page">Xem Lại</li>
                </ol>
            </nav>
            <div class="container-fluid d-flex justify-content-between my-3">
                <section class="header-operation animated fadeIn d-flex mb-2 align-items-baseline d-print-none"
                    bp-section="page-header">
                    <h1 class="text-capitalize mb-0" bp-section="page-heading">Hóa Đơn</h1>
                    <p class="ms-2 ml-2 mb-0" bp-section="page-subheading">Xem Lại Hóa Đơn</p>
                    <p class="ms-2 ml-2 mb-0" bp-section="page-subheading-back-button">
                        <small><a href="http://localhost:9090/admin/bill" class="font-sm">
                                <i class="la la-angle-double-left"></i> Quay Lại Danh Sách
                                <span>Hóa Đơn</span></a></small>
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
                                            <td><strong>Tổng Tiền:</strong></td>
                                            <td><span>{{ round($bill->total, 2) }} đ</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tình Trạng Thanh Toán:</strong></td>
                                            <td><span>
                                                    @php
                                                        $payment_status = [
                                                            '1' => 'Đã Thanh Toán',
                                                            '2' => 'Chưa Thanh Toán',
                                                        ];
                                                        echo $payment_status[$bill->payment_status] ??
                                                            'Chưa Thanh Toán';
                                                    @endphp

                                                </span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Phương Thức Thanh Toán:</strong></td>
                                            <td><span>
                                                    @php
                                                        $payment_method = [
                                                            '1' => 'Thanh Toán Khi Nhận Hàng',
                                                            '2' => 'Thanh Toán Qua Thẻ',
                                                        ];
                                                        echo $payment_method[$bill->payment_method];
                                                    @endphp
                                                </span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Trình Trạng Hóa Đơn:</strong></td>
                                            <td><span>
                                                    @php
                                                        $status = [
                                                            '1' => 'Chờ Xác Nhận',
                                                            '2' => 'Đang Xử Lý',
                                                            '3' => 'Đang Giao Hàng',
                                                            '4' => 'Đã Giao Hàng',
                                                            '5' => 'Hũy Bỏ',
                                                        ];
                                                        echo $status[$bill->status] ?? 'Chờ Xác Nhận';
                                                    @endphp
                                                </span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Mã Giảm Giá:</strong></td>
                                            <td><span>{{ $bill->coupon->code ?? '_' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Ghi Chú:</strong></td>
                                            <td><span>{{ $bill->note ?? '_' }}</span></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Người Nhận:</strong></td>
                                            <td><span>{{ $billAddress->name }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Số Điện Thoại:</strong></td>
                                            <td><span>{{ $billAddress->phone }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Ngày Giao:</strong></td>
                                            <td><span>{{ $bill->delivery_date }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Địa Chỉ</strong></td>
                                            <td><span>{{ $billAddress->street . ', ' . $billAddress->ward . ', ' . $billAddress->district . ', ' . $billAddress->city }}</span>
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
                                <th scope="col"><strong>Tên Sản Phẩm</strong></th>
                                <th scope="col"><strong>Số Lượng</strong></th>
                                <th scope="col"><strong>Đơn Giá</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($billDetails as $item)
                                <tr>
                                    <th scope="row"> {{ $item->product->name }}</th>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->price }} Đ</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>
@endsection
