@extends('layouts.app2', [
    'namePage' => 'Informasi',
    'activePage' => 'informasi',
   
])

@section('content')
<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Edit Informasi</h5>
    </div>
    <div class="card-body">
        <form action="/informasi/{{$information->id}}" method="POST">
            @csrf
            @method('patch')
            <div class="card-body">
            <div class="form-group">
                    <label for="nama_informasi">Nama Infomasi</label>
                    <input type="text" class="form-control" id="nama_informasi" value="{{$information->nama_informasi}}" name="nama_informasi" placeholder="Masukan informasi">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" value="{{$information->keterangan}}" name="keterangan" placeholder="Masukan keterangan">
                </div>          
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" value="{{$information->tanggal}}" name="tanggal" placeholder="Masukan tanggal">
                </div>          
                <div class="form-group">
                    <label for="waktu">Waktu</label>
                    <input type="time" class="form-control" id="waktu" value="{{$information->waktu}}" name="waktu" placeholder="Masukan waktu">
                </div>   
                <div class="form-group">
                    <select class="form-control" name="status" id="status">
                            <option  value="1" {{$information->status==1 ? 'selected' : ''}}>Aktif</option>
                            <option  value="0" {{$information->status==0 ? 'selected' : ''}}>Tidak aktif</option>
                    </select>
                </div>               
            <div class="card-footer text-right">
                <button class="btn btn-primary" type="submit">Simpan</button>
                
            </div>
        </form>
    </div>
</div>
@endsection
