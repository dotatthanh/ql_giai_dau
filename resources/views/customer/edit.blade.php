@extends('layouts.default')

@section('title') Cập nhật khách hàng @endsection

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Cập nhật khách hàng</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('customers.index') }}" title="Quản lý khách hàng" data-toggle="tooltip" data-placement="top">Quản lý khách hàng</a></li>
                                    <li class="breadcrumb-item active">Cập nhật khách hàng</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Thông tin cơ bản</h4>
                                <p class="card-title-desc">Điền tất cả thông tin bên dưới</p>

                                <form method="POST" action="{{ route('customers.update', $data_edit->id) }}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @include('customer._form', ['routeType' => 'update'])
                                    
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
@endsection

@push('js')
    <!-- select 2 plugin -->
    <script src="{{ asset('libs\select2\js\select2.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('js\pages\ecommerce-select2.init.js') }}"></script>

    <!-- datepicker -->
    <script src="{{ asset('libs\bootstrap-datepicker\js\bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('libs\bootstrap-colorpicker\js\bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('libs\bootstrap-timepicker\js\bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('libs\bootstrap-maxlength\bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('libs\@chenfengyuan\datepicker\datepicker.min.js') }}"></script>
    <!-- form advanced init -->
    <script src="{{ asset('js\pages\form-advanced.init.js') }}"></script>
    <script type="text/javascript">
        $('.docs-date').datepicker({
            format: 'dd-mm-yyyy',
            endDate: new Date(),
        });

        function getDistricts(id) {
            $.ajax({
                url: "{{ route('get.district') }}",
                type: "POST",
                data: {
                    id: id
                },
                success: function (respon) {
                    let text = '';
                    $.each( respon.districts, function( key, value ) {
                        text += `<option value="${value.id}">${value.name}</option>`;
                    });
                    $('#district_id').html(text);
                },
                errors: function () {
                    alert('Lỗi server chưa lấy được danh sách Quận/Huyện.')
                }
            })
        }
    </script>
@endpush

@push('css')
    <!-- datepicker css -->
    <link href="{{ asset('libs\bootstrap-datepicker\css\bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('libs\bootstrap-colorpicker\css\bootstrap-colorpicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('libs\bootstrap-timepicker\css\bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('libs\@chenfengyuan\datepicker\datepicker.min.css') }}">
@endpush