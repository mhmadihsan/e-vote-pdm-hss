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
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif
                    <div class="card-header">Daftar Calon </div>
                    <div class="card-body">
                        <div class="col-3">
                            <a href="{{route('admin.candidate.add')}}" class="btn btn-success btn-block">Tambah</a>
                        </div>
                        <hr>
                        <table class="table" id="table-datable">
                            <thead>
                            <tr>
                                <th style="text-align: center;" scope="col">#</th>
                                <th style="text-align: center;" scope="col">Nama</th>
                                <th style="text-align: center;" scope="col">Informasi</th>
                                <th style="text-align: center;" scope="col">Foto</th>
                                <th style="text-align: center;" scope="col">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($candidate->sortBy('name') as $d)
                            <tr>
                                <td style="text-align: center" scope="row">{{$no++}}</td>
                                <td>{{$d->name}}</td>
                                <td>{{$d->information}}</td>
                                <td style="text-align: center">
                                    @if($d->image_path)
                                        <img style="max-height: 100px; max-width: 100px" src="{{asset($d->image_path)}}" alt="">
                                    @else
                                       -
                                    @endif
                                </td>
                                <td style="text-align: center">
                                    <a href="{{url('admin/candidate/edit/'.$d->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                    <button onclick="btn_delete(this)" type="button" class="btn btn-danger btn-sm">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
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
    <script>
        new DataTable('#table-datable');
    </script>
@endsection
