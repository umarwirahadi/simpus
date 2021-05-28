@extends('layouts.main')
@section('content')
    <div class="col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ $aksi ?? '' }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">            
                <form action="{{ route('pendaftaran.update',$pendaftaran->id) }}" method="POST" id="form-edit-pendaftaran-pasien">
                    @csrf                                                                         
                    @method('PUT')
                    <input type="hidden" name="idpendaftaran" id="idpendaftaran" value="{{$pendaftaran->id}}">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- DIRECT CHAT SUCCESS -->
                            <div class="card card-success card-outline direct-chat direct-chat-success shadow-sm">                               
                                <div class="card-body m-2" style="display: block;">
                                    <div class="row">                        
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="col-form-label" for="kode_poli">Poli</label>
                                                <select class="form-control form-control-sm" name="kode_poli" id="kode_poli">
                                                    {!! KustomHelper::getPoli() !!}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="col-form-label" for="cara_bayar">Cara bayar</label>
                                                <select class="form-control form-control-sm" name="cara_bayar" id="cara_bayar">
                                                    {!! KustomHelper::getItem('cara-bayar') !!}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">                      
                                            <div class="form-group">
                                                <label class="col-form-label" for="kunjsakit">Jenis kunjungan</label>
                                                <select class="form-control form-control-sm" name="kunjsakit" id="kunjsakit">
                                                    {!! KustomHelper::getItem('jenis-kunjungan') !!}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="col-form-label" for="kdtkp">Perawatan</label>
                                                <select class="form-control form-control-sm" name="kdtkp" id="kdtkp">
                                                    {!! KustomHelper::getItem('perawatan-pasien') !!}
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="nik2">NIK</label>
                                                <input type="text"
                                                    class="form-control form-control-sm"
                                                    id="nik2" value="{{$pendaftaran->nik}}" name="nik2" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="no_rm">No. RM</label>
                                                <input type="hidden" name="id_pasien2" id="id_pasien2" value="{{$pendaftaran->idpasien}}">
                                                <input type="hidden" name="kdprovider" id="kdprovider" value="{{$pendaftaran->kdprovider}}">
                                                <input type="hidden" name="nmprovider" id="nmprovider" value="{{$pendaftaran->nmprovider}}">
                                                <input type="hidden" name="cara_daftar" id="cara_daftar" value="LANGSUNG">                                                
                                                <input type="text" class="form-control form-control-sm" name="no_rm" id="no_rm" value="{{$pendaftaran->no_rm}}"  readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nama_lengkap2">Nama pasien</label>
                                                <input type="text"
                                                    class="form-control form-control-sm text-uppercase"
                                                    id="nama_lengkap2" name="nama_lengkap2" value="{{$pendaftaran->nama_lengkap}}"  readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tgl. lahir</label>
                                                <input type="text"
                                                    class="form-control form-control-sm"
                                                    id="tanggal_lahir" name="tanggal_lahir" value="{{$pendaftaran->tanggal_lahir}}" readonly />
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="jk">Jenis Kel</label>
                                                <input type="text"
                                                    class="form-control form-control-sm"
                                                    id="jk" name="jk" value="{{$pendaftaran->jenis_kelamin='L'?'Laki-laki':'Perempuan'}}"  readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">                                   
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="usia">Usia sekarang</label>
                                                <input type="text"
                                                    class="form-control form-control-sm"
                                                    id="usia" name="usia" value="{{$pendaftaran->usia_tahun.' thn, '.$pendaftaran->usia_bulan.' bln, '.$pendaftaran->usia_hari.' hr'}}" readonly />
                                            </div>
                                        </div>                                      
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="hp2">No. HP</label>
                                                <input type="text"
                                                    class="form-control form-control-sm"
                                                    id="hp2"  name="hp2" value="{{$pendaftaran->hp}}"  readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="no_bpjs2">No. BPJS</label>
                                                <input type="text"
                                                    class="form-control form-control-sm"
                                                    name="no_bpjs2" id="no_bpjs2" value="{{$pendaftaran->no_kartu_bpjs}}" readonly />
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="faskes">Faskes</label>
                                                <input type="text"
                                                    class="form-control form-control-sm"
                                                    name="faskes" id="faskes" value="{{$pendaftaran->nmprovider}}"  readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="alamat2">Alamat</label>
                                                <input type="text"
                                                    class="form-control form-control-sm"
                                                    id="alamat2" name="alamat2" value="{{$pendaftaran->alamat}}" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">                                   
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label" for="keluhan">Keluhan</label>
                                                <textarea name="keluhan" id="keluhan" cols="30" rows="2"
                                                    class="form-control form-control-sm">{{$pendaftaran->keluhan}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label" for="deskripsi">Keterangan</label>
                                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="2"
                                                    class="form-control form-control-sm">{{$pendaftaran->deskripsi}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/.direct-chat -->
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-app bg-success"><i class="fa fa-user-nurse"></i> Update</button>
                        <button type="button" class="btn btn-app bg-danger" name="hapus" ><i class="fa fa-trash"></i> Hapus pendaftaran</button>
                        <button type="button" class="btn btn-app bg-warning" name="kembali" onclick="window.location.href='/pendaftaran'"><i class="fa fa-undo"></i> Kembali</button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                Catatan : form pendaftaran kunjungan pasien, jika data pasien baru silahkan klik tombol, pasien baru
            </div>

        </div>
    </div>


@include('pendaftaran.print')
@include('pendaftaran.addnew')
@endsection
