@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{asset('bs/css/bootstrap.css')}}">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Result Voting {{env('app_name')}} {{now()->format('d M Y h:m')}}</div>

                    <div class="card-body">
                        <div style="width:100%;">
                            <canvas id="acquisitions"></canvas>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('custom_js')
    <script src="{{asset('bs/js/jquery.min.js')}}"></script>
    <script src="{{asset('bs/js/axios.min.js')}}"></script>
    <script src="{{asset('bs/js/bootstrap.js')}}"></script>
    <script src="{{asset('bs/js/sw.js')}}"></script>
    <script src="{{asset('bs/js/chart.js')}}"></script>
    <script src="{{asset('main/chart.js')}}"></script>
@endsection
