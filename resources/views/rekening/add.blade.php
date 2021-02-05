@extends('layouts.main')
@section('content')
<div class="col-lg-12">
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">{{$aksi??''}}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="" method="POST" id="form-rekening">
                @csrf
                <input type="hidden" name="_method" value="POST">
                <div class="form-group">
                    <label class="col-form-label" for="kode_rekening">Kode rekening</label>
                    <input type="text" class="form-control" name="kode_rekening" id="kode_rekening" placeholder="masukan kode rekening" required value="">
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="nama_rekening">Nama rekening</label>
                    <input type="text" class="form-control" placeholder="masukan nama rekening" name="nama_rekening" id="nama_rekening" required>
                </div>
                <div class="form-group">
                    <label>Jenis rekening</label>
                    <select class="custom-select" name="jenis" id="jenis">
                        {!!KustomHelper::getItem('jenis-rekening')!!}
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="biaya">biaya</label>
                    <input type="text" class="form-control" placeholder="biaya" name="biaya" id="biaya" required value="0">
                </div>              
                <div class="form-group">
                    <label for="jenis_biaya">Jenis biaya</label>
                    <select class="custom-select" name="jenis_biaya" id="jenis_biaya">
                        {!!KustomHelper::getItem('jenis-biaya')!!}
                    </select>
                </div>
                <div class="form-group">
                    <label for="satuan">Satuan</label>
                    <select class="custom-select" name="satuan" id="satuan">
                        {!!KustomHelper::getItem('satuan-biaya')!!}
                    </select>
                </div>
                <div class="form-group">
                        <label class="col-form-label" for="status">Status</label>
                        <select class="custom-select" name="status" id="status">
                            {!!KustomHelper::getItem('Status-aktif')!!}
                        </select>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                    <button type="button" class="btn btn-warning" name="kembali"
                        onclick="window.location.href='/rekening'">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
