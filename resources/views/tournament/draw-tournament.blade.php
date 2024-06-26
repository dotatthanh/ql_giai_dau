@extends('layouts.default')

@section('title') Chia bảng giải đấu {{ $tournament->name }} @endsection

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Chia bảng giải đấu {{ $tournament->name }}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('tournaments.index') }}" title="Quản lý giải đấu" data-toggle="tooltip" data-placement="top">Quản lý giải đấu</a></li>
                                    <li class="breadcrumb-item active">Chia bảng giải đấu {{ $tournament->name }}</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        

                                {{-- <form class="custom-validation" method="POST" action="{{ route('tournaments.update-draw', $tournament->id) }}" enctype="multipart/form-data">
                                    @include('tournament._form_draw', ['routeType' => 'update'])
                                </form> --}}

                        <div class="card">
                            <div class="card-body">

                                @csrf
                                <h4 class="card-title">Thông tin các bảng đấu</h4>
                                <p class="card-title-desc">Chọn bảng đấu để chia bảng</p>

                                <div class="row">
                                    @foreach ($tournament->groups as $group)
                                        <div class="col-4">
                                            <a href="{{ route('tournaments.draw-group', [
                                                'tournament' => $tournament,
                                                'group' => $group,
                                            ]) }}">{{ $group->name }}</a>
                                        </div>
                                    @endforeach
                                </div>
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
    <!-- Summernote js -->
    <script src="{{ asset('libs\summernote\summernote-bs4.min.js') }}"></script>
    <!-- init js -->
    <script src="{{ asset('js\pages\form-editor.init.js') }}"></script>

    <!-- form repeater js -->
    <script src="{{ asset('libs\jquery.repeater\jquery.repeater.min.js') }}"></script>

    <script src="{{ asset('js\pages\form-repeater.int.js') }}"></script>

    <script src="{{ asset('libs\parsleyjs\parsley.min.js') }}"></script>

    <script src="{{ asset('js\pages\form-validation.init.js') }}"></script>

    <script type="text/javascript">
        $('.docs-date').datepicker({
            format: 'dd-mm-yyyy',
        });
    </script>
@endpush

@push('css')
    <!-- datepicker css -->
    <link href="{{ asset('libs\bootstrap-datepicker\css\bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('libs\bootstrap-colorpicker\css\bootstrap-colorpicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('libs\bootstrap-timepicker\css\bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('libs\@chenfengyuan\datepicker\datepicker.min.css') }}">
    <!-- Summernote css -->
    <link href="{{ asset('libs\summernote\summernote-bs4.min.css') }}" rel="stylesheet" type="text/css">
    <!-- select2 css -->
    <link href="{{ asset('libs\select2\css\select2.min.css') }}" rel="stylesheet" type="text/css">
@endpush