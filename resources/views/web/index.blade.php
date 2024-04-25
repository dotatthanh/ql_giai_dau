@extends('layouts.master')

@section('title') Trang chủ @endsection

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-sm-12">
            <h2 class="title">Các Giải đấu</h2>
            <div class="row">
                @foreach ($tournaments as $tournament)
                    <div class="col-sm-3 mb-3">
                        <a href="{{ route('web.tournament-detail', $tournament->id) }}" class="c-img hv-light"><img src="{{ asset($tournament->image) }}" alt=""></a>
                        <a href="{{ route('web.tournament-detail', $tournament->id) }}" class="font-weight-bold font-size-20">{{ $tournament->name }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        <div class="m-auto">
            {{ $tournaments->links() }}
        </div>
    </div>
</div>
@endsection

@push('js')
    <!-- select 2 plugin -->
    <script src="{{ asset('libs\select2\js\select2.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('js\pages\ecommerce-select2.init.js') }}"></script>

    <script type="text/javascript">
        // Menu
        var Menu=function(){
            $('.dropdown-item-1').click(function(){
                $(this).children('i').toggleClass('fa-angle-down').toggleClass('fa-angle-right');
                $(this).parent('li').children('ul').slideToggle();
            });

            $('.btn-close').click(function(){
                $(this).parent('.menu-mb').removeClass('open');
                $(this).parent('.menu-mb').addClass('close');
            });
        };

        $(function(){
            Menu();
        });
    </script>
@endpush

<style>
    .image_1{
        width: 300px;
    }
</style>
@push('css')
    <!-- select2 css -->
    <link href="{{ asset('libs\select2\css\select2.min.css') }}" rel="stylesheet" type="text/css">
@endpush