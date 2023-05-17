@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{asset('bs/css/bootstrap.css')}}">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Result Voting {{env('app_name')}} {{now()->toDayDateTimeString()}} </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($data->chunk(4) as $index => $d)
                                @foreach($d as $value)
                                    <div class="col-lg-3">
                                        <div class="card">
                                            <div style="text-align: center;">
                                                @if($value->image_path)
                                                    <img src="{{asset($value->image_path)}}" style="max-width: 160px; max-height: 160px" class="card-img-top" alt="...">
                                                @else
                                                    <img src="{{asset('user.png')}}" style="max-width: 160px; max-height: 160px" class="card-img-top" alt="...">
                                                @endif

                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title"><b>{{$value->name}}</b></h5>
                                                <p class="card-text">
                                                {{$value->information}}
                                                <hr>
                                                Total Suara {{$value->count}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <hr>
                            @endforeach
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
@endsection
