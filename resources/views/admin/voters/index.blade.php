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
                    <div class="card-header">Daftar Pemilih </div>
                    <div class="card-body">
                        <div class="col-3">
                            <a href="{{route('admin.tickets.add')}}" class="btn btn-success btn-block">Tambah</a>
                        </div>
                        <hr>
                        <table class="table" id="table-datable">
                            <thead>
                            <tr>
                                <th style="text-align: center;" scope="col">#</th>
                                <th style="text-align: center;" scope="col">Nama</th>
                                <th style="text-align: center;" scope="col">Tiket</th>
                                <th style="text-align: center;" scope="col">Status</th>
                                <th style="text-align: center;" scope="col">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $d)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$d->name_tickets ?? '-'}}</td>
                                    <td>{{$d->number_ticket}}</td>
                                    @if($d->voted==1)
                                        <td>
                                            <label class="alert alert-success">
                                                Sudah Vote
                                            </label>
                                        </td>
                                        <td>-</td>
                                    @else
                                        <td>
                                            <label class="alert alert-error">
                                                Belum Vote
                                            </label>
                                        </td>
                                        <td>
                                            <button onclick="btn_delete(this)" data-id="{{$d->id}}" type="button" class="btn btn-danger btn-sm">Hapus</button>
                                        </td>
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
@endsection


@section('custom_js')
    <script src="{{asset('bs/js/jquery.min.js')}}"></script>
    <script src="{{asset('bs/js/axios.min.js')}}"></script>
    <script src="{{asset('bs/js/bootstrap.js')}}"></script>
    <script src="{{asset('bs/js/sw.js')}}"></script>
    <script src="{{asset('bs/datatable/databale.min.js')}}"></script>
    <script>
        new DataTable('#table-datable');
    </script>
    <script src="{{asset('main/ticket.js')}}"></script>
@endsection
