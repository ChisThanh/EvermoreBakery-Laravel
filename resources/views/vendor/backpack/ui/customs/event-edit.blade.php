@extends(backpack_view('blank'))
@section('content')
    <div class="app-body flex-grow-1 px-2">
        <main class="main">
            <nav aria-label="breadcrumb" class="d-none d-lg-block">
                <ol class="breadcrumb bg-transparent p-0 mx-3 justify-content-end">
                    <li class="breadcrumb-item text-capitalize"><a href="http://localhost:9090/admin/dashboard">Quản trị</a>
                    </li>
                    <li class="breadcrumb-item text-capitalize"><a href="http://localhost:9090/admin/event">events</a></li>
                    <li class="breadcrumb-item text-capitalize active" aria-current="page">Sửa</li>
                </ol>
            </nav>
            <section class="header-operation container-fluid animated fadeIn d-flex mb-2 align-items-baseline d-print-none"
                bp-section="page-header">
                <h1 class="text-capitalize mb-0" bp-section="page-heading">events</h1>
                <p class="ms-2 ml-2 mb-0" bp-section="page-subheading">Sửa event.</p>
                <p class="mb-0 ms-2 ml-2" bp-section="page-subheading-back-button"><small><a
                            href="http://localhost:9090/admin/event" class="d-print-none font-sm"><i
                                class="la la-angle-double-left"></i> Quay lại danh sách <span>events</span></a></small></p>
            </section>
            <div class="container-fluid animated fadeIn">
                <div class="row" bp-section="crud-operation-update">
                    <div class="col-md-12 bold-labels">
                        <form method="post" action="http://localhost:9090/admin/event/3"><input type="hidden"
                                name="_token" value="NHU1oZYKVbNc2Va1WRoHSjyvuiskGCQBNwTq7plR" autocomplete="off"><input
                                type="hidden" name="_method" value="PUT"><input type="hidden" name="_http_referrer"
                                value="http://localhost:9090/admin/event/2/show">
                            <div class="card">
                                <div class="card-body row">
                                    <div class="form-group col-sm-12 mb-3" element="div" bp-field-wrapper="true"
                                        bp-field-name="name" bp-field-type="text" bp-section="crud-field">
                                        <label>Name</label><input type="text" name="name" value="{{ $event->name }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group col-sm-12 mb-3" element="div" bp-field-wrapper="true"
                                        bp-field-name="description" bp-field-type="text" bp-section="crud-field">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control">{{ $event->description }}</textarea>
                                    </div>
                                    <div class="form-group col-sm-12 mb-3" element="div" bp-field-wrapper="true"
                                        bp-field-name="start_date" bp-field-type="date" bp-section="crud-field"><label>Start
                                            date</label><input type="date" name="start_date"
                                            value="{{ $event->start_date }}" class="form-control"></div>
                                    <div class="form-group col-sm-12 mb-3" element="div" bp-field-wrapper="true"
                                        bp-field-name="end_date" bp-field-type="date" bp-section="crud-field"><label>End
                                            date</label><input type="date" name="end_date" value="{{ $event->end_date }}"
                                            class="form-control"></div>
                                    <div class="form-group col-sm-12 mb-3" element="div" bp-field-wrapper="true"
                                        bp-field-name="end_date" bp-field-type="date" bp-section="crud-field">
                                        <label>Danh sách sản phẩm</label>
                                        <table class="table table-striped m-0 p-0 ">
                                            <thead>
                                                <tr>
                                                    <th scope="col"><strong>Tên sản phẩm</strong></th>
                                                    <th scope="col"><strong>Phần trăm giảm giá</strong></th>
                                                    <th scope="col"><strong>Xóa</strong></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($eventProducts as $item)
                                                    <tr>
                                                        <th scope="row"> {{ $item->product_name }}</th>
                                                        <td>
                                                            <input type="text" class="percentage form-control"
                                                                value="{{ $item->percentage }}"
                                                                data-index="{{ $item->product_id }}"
                                                                oninput="updateHiddenValue(this)">

                                                            <input type="hidden" name="per[]"
                                                                data-index="{{ $item->product_id }}">

                                                            <input type="hidden" name="ids[]"
                                                                value="{{ $item->product_id }}">
                                                        </td>
                                                        <td>
                                                            <input class="form-check-input" type="checkbox" value="{{ $item->product_id }}"
                                                                name="del[]">
                                                            </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="hidden" element="div" bp-field-wrapper="true" bp-field-name="id"
                                        bp-field-type="hidden" bp-section="crud-field"><input type="hidden"
                                            name="id" value="3" class="form-control"></div>
                                </div>
                            </div>
                            <div class="d-none" id="parentLoadedAssets">[]</div>
                            <div id="saveActions" class="form-group my-3"><input type="hidden" name="_save_action"
                                    value="save_and_back">
                                <div class="btn-group" role="group"><button type="submit"
                                        class="btn btn-success text-white"><span class="la la-save" role="presentation"
                                            aria-hidden="true"></span> &nbsp; <span data-value="save_and_back">Lưu và Quay
                                            lại</span></button><button id="bpSaveButtonsGroup" type="button"
                                        class="btn btn-success text-white dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" data-bs-toggle="dropdown" aria-expanded="false"><span
                                            class="d-none visually-hidden">Toggle Dropdown</span></button>
                                    <ul class="dropdown-menu" aria-labelledby="bpSaveButtonsGroup">
                                        <li><button class="dropdown-item" type="button" data-value="save_and_edit">Lưu
                                                và Tiếp tục sửa</button></li>
                                        <li><button class="dropdown-item" type="button" data-value="save_and_new">Lưu và
                                                Thêm mới</button></li>
                                        <li><button class="dropdown-item" type="button"
                                                data-value="save_and_preview">Lưu và Xem lại</button></li>
                                    </ul>
                                </div><a href="http://localhost:9090/admin/event"
                                    class="btn btn-secondary text-decoration-none"><span class="la la-ban"></span>
                                    &nbsp;Huỷ bỏ</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
@section('after_scripts')
    <script>
        function updateHiddenValue(input) {
            var index = input.getAttribute('data-index');

            var percentageValue = input.value;

            var hiddenInput = document.querySelector('input[name="per[]"][data-index="' + index + '"]');
            hiddenInput.value = percentageValue;
        }
    </script>
@endsection
