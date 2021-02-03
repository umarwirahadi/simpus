@extends('layouts.main')
@section('content')
<div class="col-lg-12">
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">{{$aksi??''}}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="" method="POST" id="form-rekening-update" data-url="{{route('rekening.update',[$data->id])}}">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label class="col-form-label" for="kode_rekening">Kode rekening</label>
                    <input type="text" class="form-control" name="kode_rekening" id="kode_rekening" placeholder="masukan kode rekening" required value="{{$data->kode_rekening}}">
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="nama_rekening">Nama rekening</label>
                    <input type="text" class="form-control" placeholder="masukan nama rekening" name="nama_rekening" id="nama_rekening" required value="{{$data->nama_rekening}}">
                </div>
                <div class="form-group">
                    <label>Jenis rekening</label>
                    <select class="custom-select" name="jenis" id="jenis">
                        {!!KustomHelper::getItem('jenis-rekening',$data->jenis)!!}
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="biaya">biaya</label>
                    <input type="text" class="form-control" placeholder="biaya" name="biaya" id="biaya" required value="{{$data->biaya}}">
                </div>              
                <div class="form-group">
                        <label class="col-form-label" for="status">Status</label>
                        <select class="custom-select" name="status" id="status" required>
                            {!!KustomHelper::getItem('Status-aktif',$data->status)!!}
                        </select>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control">{{$data->deskripsi}}</textarea>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                    <button type="button" class="btn btn-warning" name="kembali" onclick="window.location.href='/rekening'">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
