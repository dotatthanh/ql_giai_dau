@extends('layouts.default')

@section('title') Thêm khách hàng @endsection

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Thêm khách hàng</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('customers.index') }}" title="Quản lý khách hàng" data-toggle="tooltip" data-placement="top">Quản lý khách hàng</a></li>
                                    <li class="breadcrumb-item active">Thêm khách hàng</li>
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

                                <form method="POST" action="{{ route('customers.store') }}" enctype="multipart/form-data">

                                    @include('customer._form', ['routeType' => 'create'])
                                    
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

        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password input').attr("type") == "text"){
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass( "fa-eye-slash" );
                    $('#show_hide_password i').removeClass( "fa-eye" );
                }else if($('#show_hide_password input').attr("type") == "password"){
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password i').addClass( "fa-eye" );
                }
            });

            $("#show_hide_password_confirmation a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password_confirmation input').attr("type") == "text"){
                    $('#show_hide_password_confirmation input').attr('type', 'password');
                    $('#show_hide_password_confirmation i').addClass( "fa-eye-slash" );
                    $('#show_hide_password_confirmation i').removeClass( "fa-eye" );
                }else if($('#show_hide_password_confirmation input').attr("type") == "password"){
                    $('#show_hide_password_confirmation input').attr('type', 'text');
                    $('#show_hide_password_confirmation i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password_confirmation i').addClass( "fa-eye" );
                }
            });
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

    <style>
        .input-group-addon {
            padding: 0.5rem 0.75rem;
            margin-bottom: 0;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.25;
            color: #495057;
            text-align: center;
            background-color: #e9ecef;
            border: 1px solid rgba(0,0,0,.15);
            border-radius: 0.25rem;
            width: 45px;
        }

        .input-group-addon a i{
            color: #495057;
        }
    </style>
@endpush