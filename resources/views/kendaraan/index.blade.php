@extends('layouts.app2', [
    'namePage' => 'Kendaraan',
    'activePage' => 'kendaraan',
   
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
                <h5 class="m-0 font-weight-bold text-primary">Data Kendaraan</h5>
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
                        <th>No</th>
                        <th>Nama</th>
                        <th>Golongan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vehicles as $vehicle)
                    <tr >
                        <td class="text-center align-middle">{{$loop->iteration}}</td>
                        <td class="align-middle">{{$vehicle->nama}}</td>
                        <td class="text-center align-middle">{{$vehicle->golongan}}</td>
                        <td class="text-center align-middle">
                            <a href="/kendaraan/{{$vehicle->id}}/edit" class="btn btn-sm btn-success"><i class="fas fa-edit"></i> Ubah</a>
                            <form action="/kendaraan/{{$vehicle->id}}" class="d-inline" method="post">
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
        <h4 class="modal-title text-white" id="exampleModalLabel" >Tambah Data Kendaraan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/kendaraan/store" method="POST">
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Kendaraan</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama">
                </div>
                <div class="form-group">
                    <label for="golongan">Golongan</label>
                    <input type="text" class="form-control" id="golongan" name="golongan" placeholder="Masukan golongan">
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
