@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{asset('bs/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('bs/datatable/datable.min.css')}}">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Calon </div>
                    <div class="card-body">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }} <br/>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{url('admin/candidate/update_candidate')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" class="form-control" hidden readonly value="{{$data->id}}" name="idnya" aria-describedby="emailHelp">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Calon</label>
                                <input type="text" class="form-control" value="{{$data->name}}" name="name" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                                <input type="text" value="{{$data->information}}" class="form-control" name="keterangan">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Photo</label>
                                <input type="file" class="form-control" name="photo">
                            </div>
                            <a href="{{route('admin.candidate')}}" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
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
    <script src="{{asset('bs/datatable/databale.min.js')}}"></script>
@endsection
