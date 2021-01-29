@extends('layouts.main')
@section('content')
<div class="col-lg-12">
    @php
        // print_r($data);
    @endphp
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">{{$aksi??''}}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('poli.update',$data->id)}}" method="POST">
                @csrf
                <input type="hidden" value="PUT" name="_method">
                <div class="form-group">
                    <label class="col-form-label" for="inputSuccess">Kode</label>
                    <input type="text" class="form-control" id="inputSuccess" name="kode" id="kode" value="{{$data->kode}}">
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="inputSuccess">Nama Poli</label>
                    <input type="text" class="form-control" placeholder="masukan nama poli" name="poli" id="poli" value="{{$data->poli}}">
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="inputSuccess">Tanggal aktif</label>
                    <input type="date" class="form-control" id="tanggal_aktif" name="tanggal_aktif" id="tanggal_aktif"  value="{{$data->tanggal_aktif}}">
                </div>
                <div class="form-group">
                        <label>Status</label>
                        <select class="custom-select" name="status" id="status">
                            {!!KustomHelper::getItem('Status-aktif',$data->status)!!}
                        </select>
                      </div>
                <div class="form-group">
                    <label class="col-form-label" for="inputSuccess">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control">{{$data->deskripsi}}</textarea>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                    <button type="button" class="btn btn-warning" name="kembali"
                        onclick="window.location.href='/poli'">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
