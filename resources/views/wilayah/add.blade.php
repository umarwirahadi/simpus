@extends('layouts.main')
@section('content')
<div class="col-lg-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{$aksi??''}}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('item.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="custom-select" name="kategori" id="kategori">
                      {!!KustomHelper::getAllCategories()!!}
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="kode">Kode</label>
                    <input type="text" class="form-control" placeholder="masukan kode item" name="kode" id="kode" required>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="item">Nama item</label>
                    <input type="text" class="form-control" placeholder="masukan nama item" name="item" id="item" required>
                </div>          
                <div class="form-group">
                        <label>Status</label>
                        <select class="custom-select" name="status" id="status">
                            {!!KustomHelper::getItem('Status-aktif')!!}
                        </select>
                </div>
            
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                    <button type="button" class="btn btn-warning" name="kembali"
                        onclick="window.location.href='/item'">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
