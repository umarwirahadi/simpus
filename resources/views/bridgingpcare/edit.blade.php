{{-- @extends('layouts.main')
@section('content')
<div class="col-lg-12">
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">{{$aksi??''}}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('poli.update',[$data->id])}}" method="POST" id="form-poli-update" data-url="{{route('poli.update',[$data->id])}}">
                @csrf
                <input type="hidden" value="PUT" name="_method">
                <div class="form-group">
                    <label class="col-form-label" for="kode">Kode</label>
                    <input type="text" class="form-control" name="kode" id="kode" value="{{$data->kode}}">
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="poli">Nama Poli</label>
                    <input type="text" class="form-control" placeholder="masukan nama poli" name="poli" id="poli" value="{{$data->poli}}">
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="tanggal_aktif">Tanggal aktif</label>
                    <input type="date" class="form-control" name="tanggal_aktif" id="tanggal_aktif"  value="{{$data->tanggal_aktif}}">
                </div>
                <div class="form-group">
                        <label for="status">Status</label>
                        <select class="custom-select" name="status" id="status">
                            {!!KustomHelper::getItem('Status-aktif',$data->status)!!}
                        </select>
                      </div>
                <div class="form-group">
                    <label class="col-form-label" for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control">{{$data->deskripsi}}</textarea>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                    <button type="button" class="btn btn-warning" name="kembali"
                        onclick="window.location.href='/item'">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection --}}


@extends('layouts.main')
@section('content')
<div class="col-lg-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{$aksi??''}}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('item.update',[$data->id])}}" method="POST" id="form-item-update" data-url="{{route('item.update',[$data->id])}}">
                @csrf
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="custom-select" name="kategori" id="kategori" required>
                      {!!KustomHelper::getAllCategories($data->kategori)!!}
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="kode">Kode</label>
                    <input type="text" class="form-control" placeholder="masukan kode item" name="kode" id="kode" required value="{{$data->kode}}">
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="item">Nama item</label>
                    <input type="text" class="form-control" placeholder="masukan nama item" name="item" id="item" required value="{{$data->item}}">
                </div>          
                <div class="form-group">
                        <label>Status</label>
                        <select class="custom-select" name="status" id="status">
                            {!!KustomHelper::getItem('Status-aktif',$data->status)!!}
                        </select>
                </div>
            
                <div class="card-footer">
                    <button type="submit" class="btn btn-success" name="submit">Update</button>
                    <button type="button" class="btn btn-warning" name="kembali"
                        onclick="window.location.href='/item'">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
