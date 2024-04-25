@extends('layouts.master')

@section('title')
    Chi tiết trận đấu
@endsection

@section('content')
    <div class="container">
        <h2 class="title">CHI TIẾT TRẬN ĐẤU</h2>
        <div class="row">


                <div class="col-12" style="padding : 20px;">
                    {{-- <h5 class="RoomName">{{ $tournament->name }}</h5> --}}

                    <div class="row">
                        <div class="col-sm-12">


                                <div class="row justify-content-center mt-3">
                                    <div class="col-1">
                                        <img src="{{ asset($match->team1->logo) }}" alt="" class="w-100">
                                    </div>
                                    <div class="col-3">
                                        {{ $match->team1->name }}
                                    </div>
                                    <div class="col-1 text-center">
                                        @if (isset($match->score_team1) && isset($match->score_team2))
                                            {{ $match->score_team1 }} - {{ $match->score_team2 }}
                                        @else
                                            -
                                        @endif
                                    </div>
                                    <div class="col-3 text-right">
                                        {{ $match->team2->name }}
                                    </div>
                                    <div class="col-1">
                                        <img src="{{ asset($match->team2->logo) }}" alt="" class="w-100">
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
        </div>

        <div class="row1">
            <h2 class="title" style=" font-size: 50px;">Mô tả</h2>
            <div class="col-12" style="font-size : 40px;"> {!! $match->description !!} </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
    </script>
@endpush

<style>
    .w-1001 {
        width: 1100px;
        height: 700px;
    }

    .row1 {
        font-family: Nunito-Regular;
        font-size: 30px;
        box-sizing: border-box;
        padding-left: 32px;
        padding-right: 32px;
        background-color: #FFFFFF;
        padding-top: 5px;
        padding-bottom: 24px;
        border-radius: 20px;
        margin: auto;
        border: 3px solid green;

    }

    .cloum {
        width: 500px;
        padding: 30px;
    }

    .RoomName {
        font-size: 21px;
        color: #333333;
        letter-spacing: 0;
    }
</style>
