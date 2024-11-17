@extends(backpack_view('blank'))
@section('content')
    <div class="app-body flex-grow-1 px-2">
        <main class="main">
            <nav aria-label="breadcrumb" class="d-none d-lg-block">
                <ol class="breadcrumb bg-transparent p-0 mx-3 justify-content-end">
                    <li class="breadcrumb-item text-capitalize"><a href="http://localhost:9090/admin/dashboard">Quản trị</a>
                    </li>
                    <li class="breadcrumb-item text-capitalize"><a href="http://localhost:9090/admin/event">Sự kiện</a></li>
                    <li class="breadcrumb-item text-capitalize active" aria-current="page">Xem lại</li>
                </ol>
            </nav>
            <div class="container-fluid d-flex justify-content-between my-3">
                <section class="header-operation animated fadeIn d-flex mb-2 align-items-baseline d-print-none"
                    bp-section="page-header">
                    <h1 class="text-capitalize mb-0" bp-section="page-heading">Sự kiện</h1>
                    <p class="ms-2 ml-2 mb-0" bp-section="page-subheading">Xem lại event</p>
                    <p class="ms-2 ml-2 mb-0" bp-section="page-subheading-back-button"><small><a
                                href="http://localhost:9090/admin/event" class="font-sm"><i
                                    class="la la-angle-double-left"></i> Quay lại danh sách <span>events</span></a></small>
                    </p>
                </section><a href="javascript: window.print();" class="btn float-end float-right"><i
                        class="la la-print"></i></a>
            </div>
            <div class="container-fluid animated fadeIn">
                <div class="row" bp-section="crud-operation-show">
                    <div class="col-md-12">
                        <div class="">
                            <div class="card no-padding no-border mb-0">
                                <table class="table table-striped m-0 p-0">
                                    <tbody>
                                        <tr>
                                            <td class="border-top-0"><strong>Name:</strong></td>
                                            <td class="border-top-0"><span>{{ $event->name }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Description:</strong></td>
                                            <td><span>{{ $event->description }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Start date:</strong></td>
                                            <td><span>{{ $event->start_date }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>End date:</strong></td>
                                            <td><span>{{ $event->end_date }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Hành động</strong></td>
                                            <td><a class="btn btn-sm btn-link" href="/admin/event/add-product/3"><i
                                                        class="la la-edit"></i> Thêm sản phẩm</a>
                                                <a href="#" class="btn btn-sm btn-link"
                                                    onclick="calculatePriceSale('{{ $event->id }}', event)">
                                                    <i class="la la-edit"></i> Tính giá sale
                                                </a>
                                                <a href="http://localhost:9090/admin/event/{{ $event->id }}/edit" bp-button="update"
                                                    class="btn btn-sm btn-link"><i
                                                        class="la la-edit"></i><span>Sửa</span></a>
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
                                <th scope="col"><strong>Phần trăm giảm giá</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($eventProducts as $item)
                                <tr>
                                    <th scope="row"> {{ $item->product_name }}</th>
                                    <td>{{ $item->percentage }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
@endsection
