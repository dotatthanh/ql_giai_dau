@extends('layouts.master')

@section('title') Thay đổi thông tin các nhân @endsection

@section('content')
<div class="container">
    <h2 class="title">THAY ĐỔI THÔNG TIN CÁ NHÂN</h2>
    <form action="{{ route('web.post-change-profile', auth()->guard('web')->user()->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Họ và tên <span class="text-danger">*</span></label>
                    <input id="name" name="name" type="text" class="form-control" placeholder="Họ và tên" value="{{ old('name', auth()->guard('web')->user()->name ?? '') }}">
                    {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label for="gender">Giới tính <span class="text-danger">*</span></label>
                    <div class="form-check form-check">
                        <input type="radio" class="form-check-input" id="nam" name="gender" value="Nam" 
                        checked>
                        <label class="form-check-label" for="nam">Nam</label>
                    </div>
                    <div class="form-check form-check">
                        <input type="radio" class="form-check-input" id="nu" name="gender" value="Nữ" >
                        <label class="form-check-label" for="nu">Nữ</label>
                    </div>
                    {!! $errors->first('gender', '<span class="text-danger">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label for="birthday">Ngày sinh <span class="text-danger">*</span></label>
                    <div class="docs-datepicker">
                        <div class="input-group">
                            <input type="text" class="form-control docs-date" name="birthday" placeholder="Chọn ngày sinh" autocomplete="off" value="{{ old('birthday', isset(auth()->guard('web')->user()->birthday) ? date('d-m-Y', strtotime(auth()->guard('web')->user()->birthday)) : '') }}">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary docs-datepicker-trigger" disabled="">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <div class="docs-datepicker-container"></div>
                    </div>
                    {!! $errors->first('birthday', '<span class="text-danger">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label for="university_id">Trường đại học</label>
                    <select name="university_id" id="university_id" class="form-control">
                        <option value="">Chọn trường đại học</option>
                        @foreach ($universities as $university)
                        <option value="{{ $university->id }}" {{ auth()->guard('web')->user()->university_id == $university->id ? 'selected' : '' }}>{{ $university->name }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('university_id', '<span class="text-danger">:message</span>') !!}
                </div>

            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input id="email" name="email" type="text" class="form-control" placeholder="Email" value="{{ old('email', auth()->guard('web')->user()->email ?? '') }}">
                    {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label for="avatar">Ảnh đại diện</label>
                    <input id="avatar" name="avatar" type="file" class="form-control">
                    {!! $errors->first('avatar', '<span class="text-danger">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label for="phone">Số điện thoại <span class="text-danger">*</span></label>
                    <input id="phone" name="phone" type="number" class="form-control" placeholder="Số điện thoại" value="{{ old('phone', auth()->guard('web')->user()->phone ?? '') }}">
                    {!! $errors->first('phone', '<span class="text-danger">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label for="province_id">Tỉnh/Thành phố <span class="text-danger">*</span></label>
                    <select name="province_id" id="province_id" class="form-control" onchange="getDistricts($(this).val())">
                        @foreach ($provinces as $province)
                        <option value="{{ $province->id }}" {{ auth()->guard('web')->user()->province_id == $province->id ? 'selected' : ''}}>{{ $province->name }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('province_id', '<span class="text-danger">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label for="district_id">Quận/Huyện <span class="text-danger">*</span></label>
                    <select name="district_id" id="district_id" class="form-control">
                        @foreach($provinces->find(auth()->guard('web')->user()->province_id)->districts as $district)
                            <option value="{{ $district->id }}" {{ auth()->guard('web')->user()->district_id == $district->id ? 'selected' : ''}}>{{ $district->name }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('district_id', '<span class="text-danger">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label for="address">Địa chỉ <span class="text-danger">*</span></label>
                    <input id="address" name="address" type="text" class="form-control" placeholder="Địa chỉ" value="{{ old('address', auth()->guard('web')->user()->address ?? '') }}">
                    {!! $errors->first('address', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>

            <div class="col text-center">
                <button type="submit" class="btn btn-success">Lưu thông tin</button>
            </div>  
        </div>
    </form>
</div>
@endsection

@push('js')
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