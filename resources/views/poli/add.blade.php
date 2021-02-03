@extends('layouts.main')
@section('content')
<div class="col-lg-12">
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">{{$aksi??''}}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('poli.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-form-label" for="inputSuccess">Kode</label>
                    <input type="text" class="form-control" id="inputSuccess" name="kode" id="kode" required>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="inputSuccess">Nama Poli</label>
                    <input type="text" class="form-control" placeholder="masukan nama poli" name="poli" id="poli" required>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="inputSuccess">Tanggal aktif</label>
                    <input type="date" class="form-control" id="tanggal_aktif" name="tanggal_aktif" id="tanggal_aktif">
                </div>
                <div class="form-group">
                        <label>Status</label>
                        <select class="custom-select" name="status" id="status">
                          <option value="1">Aktif</option>
                          <option value="0">Tidak Aktif</option>
                        </select>
                      </div>
                <div class="form-group">
                    <label class="col-form-label" for="inputSuccess">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                    <button type="button" class="btn btn-warning" name="kembali"
                        onclick="window.location.href='/poli'">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
