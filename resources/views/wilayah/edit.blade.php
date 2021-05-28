@extends('layouts.main')
@section('content')
<div class="col-lg-12">
<form action="{{route('wilayah.update',$data->id)}}" method="POST">
@csrf
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{$aksi??''}}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
                <input type="hidden" value="PUT" name="_method">
                <input type="hidden" name="id_wilayah" id="id_wilayah" value="{{$data->id}}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="kel">Kelurahan</label>
                            <input type="text" class="form-control" name="kel" id="kel" value="{{$data->kel}}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="kec">Kecamatan</label>
                            <input type="text" class="form-control" name="kec" id="kec" value="{{$data->kec}}" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-form-label">Status</label>
                            <select class="form-control" name="jenis" id="jenis">
                                {!!KustomHelper::getItem('jenis-kota-kab',$data->jenis)!!}
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="col-form-label" for="kotakab">Kota/Kab</label>
                            <input type="text" class="form-control" name="kotakab" id="kotakab" value="{{$data->kotakab}}" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="col-form-label" for="prov">Provinsi</label>
                            <input type="text" class="form-control" name="prov" id="prov" value="{{$data->prov}}" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-form-label" for="pos">Kode POS</label>
                            <input type="text" class="form-control" name="pos" id="pos" value="{{$data->pos}}" />
                        </div>
                    </div>
                </div>
                <div>
                <button type="submit" class="btn btn-success" name="update" id="update">Update</button>
                    <button type="button" class="btn btn-warning" name="kembali"
                        onclick="window.location.href='/wilayah'">Kembali</button>
                </div>
        </div>
    </div>
</form>
</div>

@endsection
