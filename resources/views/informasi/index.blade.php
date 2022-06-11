@extends('layouts.app2', [
    'namePage' => 'Informasi',
    'activePage' => 'informasi',
   
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
                <h5 class="m-0 font-weight-bold text-primary">Data Informasi</h5>
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
                        <th>Informasi</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($informations as $information)
                    <tr >
                        <td class="text-center align-middle">{{$loop->iteration}}</td>
                        <td class="align-middle">{{$information->nama_informasi}}</td>
                        <td class="text-center align-middle">{{$information->keterangan}}</td>
                        <td class="text-center align-middle">{{$information->tanggal}}</td>
                        <td class="text-center align-middle">{{$information->waktu}}</td>
                        <td class="text-center align-middle">{{$information->status == 1 ? 'Aktif' :'Tidak aktif' }}</td>
                        <td class="text-center align-middle">
                            <a href="/informasi/{{$information->id}}/edit" class="btn btn-sm btn-success"><i class="fas fa-edit"></i> Ubah</a>
                            <form action="/informasi/{{$information->id}}" class="d-inline" method="post">
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
        <h4 class="modal-title text-white" id="exampleModalLabel" >Tambah Data Informasi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/informasi/store" method="POST">
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label for="nama_informasi">Nama Infomasi</label>
                    <input type="text" class="form-control" id="nama_informasi" name="nama_informasi" placeholder="Masukan informasi">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukan keterangan">
                </div>          
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukan tanggal">
                </div>          
                <div class="form-group">
                    <label for="waktu">Waktu</label>
                    <input type="time" class="form-control" id="waktu" name="waktu" placeholder="Masukan waktu">
                </div>   
                <div class="form-group">
                    <select class="form-control" name="status" id="status">
                            <option  value="1">Aktif</option>
                            <option  value="0">Tidak aktif</option>
                    </select>
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
