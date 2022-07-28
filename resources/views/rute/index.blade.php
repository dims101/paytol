@extends('layouts.app2', [
    'namePage' => 'Rute Tol',
    'activePage' => 'rute',
   
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
                <h5 class="m-0 font-weight-bold text-primary">Data Rute Tol</h5>
            </div>
            <div class="col-md-6 text-right">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="align-middle">No</th>
                        <th class="align-middle">Gate Masuk</th>
                        <th class="align-middle">Gate Keluar</th>
                        <th class="align-middle">Tarif Gol I</th>
                        <th class="align-middle">Tarif Gol II</th>
                        <th class="align-middle">Tarif Gol III</th>
                        <th class="align-middle">Tarif Gol IV</th>
                        <th class="align-middle">Tarif Gol V</th>
                        <th class="align-middle">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($routes as $route)
                    <tr >
                        <td class="text-center align-middle">{{$loop->iteration}}</td>
                        <td class="align-middle">{{$route->gate_masuk}}</td>
                        <td class="align-middle">{{$route->gate_keluar}}</td>
                        <td class="align-middle">Rp. {{$route->tarif_golongan_i}}</td>
                        <td class="align-middle">Rp. {{$route->tarif_golongan_ii}}</td>
                        <td class="align-middle">Rp. {{$route->tarif_golongan_iii}}</td>
                        <td class="align-middle">Rp. {{$route->tarif_golongan_iv}}</td>
                        <td class="align-middle">Rp. {{$route->tarif_golongan_v}}</td>
                        <td class="text-center align-middle">
                            <a href="/rute/{{$route->id}}/edit" class="btn btn-sm btn-success"><i class="fas fa-edit"></i> Ubah</a>
                            <form action="/rute/{{$route->id}}" class="d-inline" method="post">
                                @csrf
                                @method('delete')                              
                                <button class="btn btn-sm btn-danger" onClick="return confirm('Yakin menghapus?');"><i class="fas fa-trash"></i> Hapus</button>
                            </form>
                        </td>   
                    </tr>           
                    @endforeach                       
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title text-white" id="exampleModalLabel">Tambah Data Rute Tol</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/rute/store" method="POST">
            <div class="modal-body">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_gate_masuk">Gate Masuk</label>
                            <select class="form-control" name="id_gate_masuk" id="id_gate_masuk">
                                @foreach ($gates as $key => $gate)
                                    <option  value="{{$key}}" {{ ( $key == $selectedID) ? 'selected' : '' }}>{{$gate}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_gate_keluar">Gate Keluar</label>
                            <select class="form-control" name="id_gate_keluar" id="id_gate_keluar">
                                @foreach ($gates as $key => $gate)
                                    <option  value="{{$key}}" {{ ( $key == $selectedID) ? 'selected' : '' }}>{{$gate}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tarif_golongan_i">Tarif Golongan I</label>
                            <input type="number" class="form-control" id="tarif_golongan_i" name="tarif_golongan_i" placeholder="Masukan nominal">
                        </div>
                        <div class="form-group">
                            <label for="tarif_golongan_ii">Tarif Golongan II</label>
                            <input type="number" class="form-control" id="tarif_golongan_ii" name="tarif_golongan_ii" placeholder="Masukan nominal">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tarif_golongan_iii">Tarif Golongan III</label>
                            <input type="number" class="form-control" id="tarif_golongan_iii" name="tarif_golongan_iii" placeholder="Masukan nominal">
                        </div>
                        <div class="form-group">
                            <label for="tarif_golongan_iv">Tarif Golongan IV</label>
                            <input type="number" class="form-control" id="tarif_golongan_iv" name="tarif_golongan_iv" placeholder="Masukan nominal">
                        </div>
                        <div class="form-group">
                            <label for="tarif_golongan_v">Tarif Golongan V</label>
                            <input type="number" class="form-control" id="tarif_golongan_v" name="tarif_golongan_v" placeholder="Masukan nominal">
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
      </form>
    </div>
  </div>
</div>
@endsection
