@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{asset('bs/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('bs/icons/fa.min.css')}}">
    <style>
        .float{
            position:fixed;
            width:60px;
            height:60px;
            bottom:60px;
            right:70px;
            background-color:#0a58ca;
            color:#FFF;
            border-radius:50px;
            text-align:center;
            box-shadow: 2px 2px 3px #999;
        }

        .my-float{
            margin-top:15px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{$ticket->name_tickets ?? null}} </div>

                    <div class="card-body">
                        <div class="mb-lg-1">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Calon</th>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Calon</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($candidate->chunk(2) as $index => $value)
                                    <tr>
                                        <td scope="row">{{$index}}</td>
                                        <td>
                                            <div class="input-group input-group-lg mb-3">
                                                <div class="input-group-text">
                                                    <input onclick="checking(this)" class="form-check-input mt-0" type="checkbox" value="{{$value->first()->id}}" aria-label="Checkbox for following text input">
                                                </div>
                                                <input type="text" value="{{$value->first()->name ?? null}}" readonly class="form-control" aria-label="Text input with checkbox">
                                                <small>{{$value->first()->information ?? null}}</small>
                                            </div>
                                        </td>
                                        @if($value->count()==2)
                                        <td scope="row">{{$index + 1}}</td>
                                        <td>
                                            <div class="input-group input-group-lg mb-3">
                                                <div class="input-group-text">
                                                    <input onclick="checking(this)" class="form-check-input mt-0" type="checkbox" value="{{$value->last()->id}}" aria-label="Checkbox for following text input">
                                                </div>
                                                <input type="text" value="{{$value->last()->name ?? null}}" readonly class="form-control" aria-label="Text input with checkbox">
                                                <small>{{$value->last()->information ?? null}}</small>
                                            </div>
                                        </td>
                                        @else
                                            <td colspan="2">-</td>
                                        @endif
                                    </tr>
                                @endforeach
                               </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button id="btn_sumbit" onclick="submit_vote(this)" disabled class="float">
            <p id="count_show_choice" class="my-float">0</p>
        </button>
    </div>
@endsection


@section('custom_js')
    <script src="{{asset('bs/js/jquery.min.js')}}"></script>
    <script src="{{asset('bs/js/axios.min.js')}}"></script>
    <script src="{{asset('bs/js/bootstrap.js')}}"></script>
    <script src="{{asset('bs/js/sw.js')}}"></script>
    <script src="{{asset('main/voting.js')}}"></script>
@endsection
