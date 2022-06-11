@extends('layouts.app2', [
    'namePage' => 'Gerbang Tol',
    'activePage' => 'gate',
   
])

@section('content')
<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Edit Gerbang Tol</h5>
    </div>
    <div class="card-body">
        <form action="/gate/{{$gate->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img class="img-thumbnail img-responsive" src="/img/gambar_barcode/{{$gate->gambar_barcode}}" style="width: 250px;">  
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Nama </label>
                            <input type="text" name="nama" class="form-control" value="{{$gate->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="">Kode Barcode </label>
                            <input type="text" name="kode_barcode" class="form-control" value="{{$gate->kode_barcode}}">
                        </div>
                                    
                        <div class="form-group">
                            <label for="gambar_barcode">Example file input</label>
                            <input type="file" name="gambar_barcode" class="form-control-file" id="gambar_barcode">
                        </div> 
                    </div>
                </div>                
            <div class="card-footer text-right">
                <button class="btn btn-primary" type="submit">Simpan</button>
                
            </div>
        </form>
    </div>
</div>
@endsection
