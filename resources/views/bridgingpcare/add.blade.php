@extends('layouts.main')
@section('content')
<div class="col-lg-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{$aksi??''}}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('settingpcare.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username_pcare">Username P-care</label>
                            <input type="text" class="form-control" placeholder="username Pcare" name="username_pcare" id="username_pcare" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password_pcare">Password P-care</label>
                            <input type="password" class="form-control" placeholder="password Pcare" name="password_pcare" id="password_pcare" required autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="consumen_pcare">Consume ID</label>
                            <input type="text" class="form-control" placeholder="Consume ID dari BPJS" name="consumen_pcare" id="consumen_pcare" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="secretkey_pcare">Secret Key</label>
                            <input type="text" class="form-control" placeholder="secret key dari BPJS" name="secretkey_pcare" id="secretkey_pcare" required value="" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="timestamp_pcare">Timestamp</label>
                            <input type="text" class="form-control" name="timestamp_pcare" id="timestamp_pcare" required value="{{ Carbon\Carbon::now()->timestamp }}" readonly/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="signature_pcare">Signature</label>
                            <input type="text" class="form-control"  name="signature_pcare" id="signature_pcare" required value="" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="authorization_pcare">Authorization</label>
                            <input type="text" class="form-control" name="authorization_pcare" id="authorization_pcare" required value="" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="aplicationcode_pcare">Kode aplikasi</label>
                            <input type="text" class="form-control" placeholder="kode aplikasi brigding dari Pcare" name="aplicationcode_pcare" id="aplicationcode_pcare" required value="" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label  for="description">Deskripsi</label>
                                <textarea name="description" id="description" cols="30" rows="2" class="form-control"></textarea>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="data_status">Status</label>
                            <select class="custom-select" name="data_status" id="data_status">
                                {!!KustomHelper::getItem('Status-aktif')!!}
                            </select>
                    </div>
                    </div>
                </div>                
            
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                    <button type="button" class="btn btn-warning" name="kembali"
                        onclick="window.location.href='/settingpcare'">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
