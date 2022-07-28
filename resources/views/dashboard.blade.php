@extends('layouts.app2', [
    'namePage' => 'Dashboard',
    'activePage' => 'dashboard',
   
])

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Jumlah transaksi berhasil</h6>
            </div>
            <div class="card-body">
                <h1>{{$total_transaksi}}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Total pemasukan </h6>
            </div>
            <div class="card-body">
                <h1>Rp. {{$total_pemasukan}},-</h1>
            </div>
        </div>
    </div>
    <div class="col md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">10 Rute yang paling banyak dilalui</h6>
            </div>
            <div class="card-body">
                <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection
