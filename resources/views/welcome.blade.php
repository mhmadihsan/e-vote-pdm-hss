@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">E - Voting </div>

                    <div class="card-body">
                        <div class="row">
                            <a href="{{url('vote')}}">
                            <div class="mb-3" style="text-align: center;">
                                <img width="60%" src="{{asset('logo_musda_crop.png')}}"  alt="">
                            </div>
                            </a>
                            <div class="mb-3" style="text-align: center;">
                                <h3>E-VOTING</h3>
                            </div>
                            <div class="mb-3" style="text-align: center;">
                                <h4>MUSYAWARAH DAERAH MUHAMMADIYAH KE - 11</h4>
                            </div>
                            <div class="mb-3" style="text-align: center;">
                                <h2>HULU SUNGAI SELATAN</h2>
                            </div>
                            <div class="mb-3" style="text-align: center;">

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
