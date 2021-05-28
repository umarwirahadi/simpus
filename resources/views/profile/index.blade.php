@extends('layouts.main')
@section('content')
    <div class="col-md-8">
        <div class="card card-outline card-info shadow">
            <form method="POST" id="form-profile">
            <div class="card-header">
                <h3 class="card-title">
                    Profile PUSKESMAS
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-form-label" for="kode_puskesmas">Kode</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Kode Puskesmas" id="kode_puskesmas" name="kode_puskesmas" value="{{$dataItem->kode_puskesmas??''}}" />
                                  </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-form-label" for="id_puskesmas">ID</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Kode Puskesmas" id="id_puskesmas" name="id_puskesmas" value="{{$dataItem->id_puskesmas??''}}" />
                                  </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="nama_puskesmas">Nama Puskesmas</label>
                                <input type="text" class="form-control" placeholder="nama Puskesmas" name="nama_puskesmas" id="nama_puskesmas" value="{{$dataItem->nama_puskesmas??''}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="col-form-label" for="alamat">Alamat</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Alamat" id="alamat" name="alamat" value="{{$dataItem->alamat??''}}">
                                  </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="col-form-label" for="rt">RT/RW</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="rt" id="rt" value="{{$dataItem->rt??''}}" >
                                    <input type="text" class="form-control" name="rw" id="rw" value="{{$dataItem->rw??''}}" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="kelurahan">Kelurahan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="kelurahan" id="kelurahan" name="kelurahan" value="{{$dataItem->kelurahan??''}}" />
                                  </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="kecamatan">Kecamatan</label>
                                <input type="text" class="form-control" placeholder="kecamatan" name="kecamatan" id="kecamatan" value="{{$dataItem->kecamatan??''}}" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="kota_kab">Kota/Kab.</label>
                                <input type="text" class="form-control" placeholder="kota/kabupaten" name="kota_kab" id="kota_kab" value="{{$dataItem->kota_kab??''}}" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="col-form-label" for="provinsi">Provinsi</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="provinsi" id="provinsi" name="provinsi" value="{{$dataItem->provinsi??''}}" />
                                  </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-form-label" for="pos">Kode POS</label>
                                <input type="text" class="form-control" placeholder="Kode POS" name="pos" id="pos" value="{{$dataItem->pos??''}}" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="telp">No. Telp</label>
                                <input type="text" class="form-control" placeholder="022-xxx" name="telp" id="telp" value="{{$dataItem->telp??''}}" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="email">Email</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{$dataItem->email??''}}" />
                                  </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="no_ijin">Ijin Nomor</label>
                                <input type="text" class="form-control"  name="no_ijin" id="no_ijin" value="{{$dataItem->no_ijin??''}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" placeholder="022-xxx" name="tanggal" id="tanggal" value="{{$dataItem->tanggal??''}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="no_register">No. Register</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Nomor register PKM" id="no_register" name="no_register" value="{{$dataItem->no_register??''}}" />
                                  </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="nip_kapus">NIP. KAPUS</label>
                                <input type="text" class="form-control"  name="nip_kapus" id="nip_kapus" placeholder="Kepala puskesmas" value="{{$dataItem->nip_kapus??''}}" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="nip_katu">NIP. KATU</label>
                                <input type="text" class="form-control" placeholder="Kepala Tata usaha" name="nip_katu" id="nip_katu" value="{{$dataItem->nip_katu??''}}" />
                            </div>
                        </div>
                    </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                <button type="button" class="btn btn-warning" name="kembali" onclick="window.location.href='/poli'">Kembali</button>
            </div>
        </form>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-widget widget-user shadow">
            <div class="widget-user-header bg-green">
                <h3 class="widget-user-username"><b class="text text-uppercase">{{$dataItem->nama_puskesmas??''}}</b></h3>
            </div>
            <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{ asset('uploads/images/Kota-Cimahi.png') }}"
                    alt="Puskesmas Cimahi tengah">
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">3,200</h5>
                            <span class="description-text">Pasien</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">5</h5>
                            <span class="description-text">Poli</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                        <div class="description-block">
                            <h5 class="description-header">10</h5>
                            <span class="description-text">Wilayah Kerja</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row" id="actions">
                    <div class="col-md-12">


                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
@endsection
