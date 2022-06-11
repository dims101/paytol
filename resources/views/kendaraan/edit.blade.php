@extends('layouts.app2', [
    'namePage' => 'Kendaraan',
    'activePage' => 'kendaraan',
   
])

@section('content')
<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Edit Kendaraan</h5>
    </div>
    <div class="card-body">
        <form action="/kendaraan/{{$vehicle->id}}" method="POST">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="form-group">
                    <label for="">Nama </label>
                    <input type="text" name="nama" class="form-control" value="{{$vehicle->nama}}">
                </div>
                <div class="form-group">
                    <label for="">Kode Barcode </label>
                    <input type="text" name="golongan" class="form-control" value="{{$vehicle->golongan}}">
                </div>         
            <div class="card-footer text-right">
                <button class="btn btn-primary" type="submit">Simpan</button>
                
            </div>
        </form>
    </div>
</div>
@endsection
