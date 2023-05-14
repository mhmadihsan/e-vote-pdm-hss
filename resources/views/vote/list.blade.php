@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{asset('bs/css/bootstrap.css')}}">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Masukan Kode Ticket - Voting </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <h3 for="exampleFormControlInput1" class="form-label"> Masukan Nomor Tiket E-Voting</h3>
                            <div class="input-group input-group-lg">
                                <input type="text" class="form-control" id="input_ticket" placeholder="Nomor Tiket" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-success" onclick="search_button(this)" type="button" id="button-addon2">Vote </button>
                            </div>
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
    <script src="{{asset('main/check.js')}}"></script>
@endsection
