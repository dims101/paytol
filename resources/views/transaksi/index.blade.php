@extends('layouts.app2', [
    'namePage' => 'Transaksi Tol',
    'activePage' => 'transaksi',
   
])

@section('content')
@if (Session::has('message'))
    <div class="alert alert-success" role="alert">
        {{Session::get('message')}}
    </div>
@endif
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-md-6">
                <h5 class="m-0 font-weight-bold text-primary">Data Transaksi</h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Rute</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Tarif</th>
                        <th>ID Pengguna</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaksi)
                    <tr >
                        <td class="text-center align-middle">{{$loop->iteration}}</td>
                        <td class="align-middle">{{$transaksi->id_rute}}</td>
                        <td class="text-center align-middle">{{$transaksi->tanggal}}</td>
                        <td class="text-center align-middle">{{$transaksi->waktu}}</td>
                        <td class="text-center align-middle">{{$transaksi->tarif}}</td>
                        <td class="text-center align-middle">{{$transaksi->id_user}}</td>
                    </tr>           
                    @endforeach                       
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
