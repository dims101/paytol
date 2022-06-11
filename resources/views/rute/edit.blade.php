@extends('layouts.app2', [
    'namePage' => 'Rute Tol',
    'activePage' => 'rute',
   
])

@section('content')
<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Edit Rute Tol</h5>
    </div>
    <div class="card-body">
        <form action="/rute/{{$route->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_gate_masuk">Gate Masuk</label>
                            <select class="form-control" name="id_gate_masuk" id="id_gate_masuk">
                                @foreach ($gates as $key => $gate)
                                    <option  value="{{$key}}" {{ ( $key == $route->id_gate_masuk) ? 'selected' : '' }}>{{$gate}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_gate_keluar">Gate Masuk</label>
                            <select class="form-control" name="id_gate_keluar" id="id_gate_keluar">
                                @foreach ($gates as $key => $gate)
                                    <option  value="{{$key}}" {{ ( $key == $route->id_gate_keluar) ? 'selected' : '' }}>{{$gate}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tarif_golongan_i">Tarif Golongan I</label>
                            <input type="number" class="form-control" id="tarif_golongan_i" name="tarif_golongan_i" value="{{$route->tarif_golongan_i}}" placeholder="Masukan nominal">
                        </div>
                        <div class="form-group">
                            <label for="tarif_golongan_ii">Tarif Golongan II</label>
                            <input type="number" class="form-control" id="tarif_golongan_ii" name="tarif_golongan_ii" value="{{$route->tarif_golongan_ii}}" placeholder="Masukan nominal">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tarif_golongan_iii">Tarif Golongan III</label>
                            <input type="number" class="form-control" id="tarif_golongan_iii" name="tarif_golongan_iii" value="{{$route->tarif_golongan_iii}}" placeholder="Masukan nominal">
                        </div>
                        <div class="form-group">
                            <label for="tarif_golongan_iv">Tarif Golongan IV</label>
                            <input type="number" class="form-control" id="tarif_golongan_iv" name="tarif_golongan_iv" value="{{$route->tarif_golongan_iv}}" placeholder="Masukan nominal">
                        </div>
                        <div class="form-group">
                            <label for="tarif_golongan_v">Tarif Golongan V</label>
                            <input type="number" class="form-control" id="tarif_golongan_v" name="tarif_golongan_v" value="{{$route->tarif_golongan_v}}" placeholder="Masukan nominal">
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
