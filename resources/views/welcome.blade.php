@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">E - Voting </div>

                    <div class="card-body">
                        <img src="{{asset('img/logo_musda.png')}}" class="card-img" alt="">
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <a class="btn btn-block btn-primary" href="{{url('vote')}}">Pemilihan</a>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-block btn-success" href="{{url('polling')}}">Hasil</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
