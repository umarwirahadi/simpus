@extends('layouts.main')
@section('content')
<div class="col-lg-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{$aksi??''}}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
                <input type="hidden" value="PUT" name="_method">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="kel">Kelurahan</label>
                            <input type="text" class="form-control" name="kel" id="kel" value="{{$data->kel}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="kec">Kecamatan</label>
                            <input type="text" class="form-control" name="kec" id="kec" value="{{$data->kec}}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-form-label" for="jenis">Jenis</label>
                            <input type="text" class="form-control" name="jenis" id="jenis" value="{{$data->jenis}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="col-form-label" for="kotakab">Kota/Kab</label>
                            <input type="text" class="form-control" name="kotakab" id="kotakab" value="{{$data->kotakab}}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="col-form-label" for="kode">Provinsi</label>
                            <input type="text" class="form-control" name="kode" id="kode" value="{{$data->prov}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-form-label" for="kodepos">Kode POS</label>
                            <input type="text" class="form-control" name="kodepos" id="kodepos" value="{{$data->pos}}" disabled>
                        </div>
                    </div>
                </div>
                <div >
                    <button type="button" class="btn btn-warning" name="kembali"
                        onclick="window.location.href='/wilayah'">Kembali</button>
                </div>
        </div>
    </div>
</div>

@endsection
