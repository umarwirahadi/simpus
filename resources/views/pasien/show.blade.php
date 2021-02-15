{{-- <div class="modal fade" id="modal-view">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Data pasien</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form action="" method="POST" id="form-pasien">
                @csrf
                <div class="row">
                    <div class="col-md-3">                          
                        <div class="form-group">
                            <label class="col-form-label" for="nik">N.I.K</label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" placeholder="No. KTP" id="nik" name="nik">                                    
                              </div>
                        </div>         
                    </div>                     
                    <div class="col-md-3">                          
                        <div class="form-group">
                            <label class="col-form-label" for="no_kk">No. KK</label>
                            <input type="text" class="form-control form-control-sm" placeholder="No. KK" name="no_kk" id="no_kk" >
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2">                          
                        <div class="form-group">
                            <label class="col-form-label" for="status_hubungan">Status Hubungan</label>
                            <input type="text" class="form-control form-control-sm" placeholder="No. KK" name="status_hubungan" id="status_hubungan" >
                        </div>                                                     
                    </div>                       
                    <div class="col-md-4">                          
                        <div class="form-group">
                            <label class="col-form-label" for="nama_lengkap">Nama lengkap</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Nama lengkap" name="nama_lengkap" id="nama_lengkap" >
                        </div>                                                    
                    </div>                       
                </div>
                <div class="row">
                    <div class="col-md-3">                          
                        <div class="form-group">
                            <label class="col-form-label" for="no_bpjs">No. BPJS</label>
                            <input type="text" class="form-control form-control-sm" placeholder="No BPJS" name="no_bpjs" id="no_bpjs" >
                        </div>                                                    
                    </div>                                                
                    <div class="col-md-2">                          
                        <div class="form-group">
                            <label class="col-form-label" for="no_rm_lama">No. RM lama</label>
                            <input type="text" class="form-control form-control-sm" placeholder="No RM lama" name="no_rm_lama" id="no_rm_lama" >
                        </div>                                                    
                    </div>                                                
                    <div class="col-md-3">                          
                        <div class="form-group">
                            <label class="col-form-label" for="tempat_lahir">Tempat lahir</label>
                            <input type="text" class="form-control form-control-sm" placeholder="tempat lahir" name="tempat_lahir" id="tempat_lahir" >
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2">                          
                        <div class="form-group">
                            <label class="col-form-label" for="tanggal_lahir">Tanggal lahir</label>
                            <input type="date" class="form-control form-control-sm"  name="tanggal_lahir" id="tanggal_lahir" >
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2">                          
                        <div class="form-group">
                            <label class="col-form-label" for="agama1">Agama</label>
                            <input type="text" class="form-control form-control-sm"  name="agama1" id="agama1" >
                        </div>                                                    
                    </div>                       
                </div>
                <div class="row">
                    <div class="col-md-2">                          
                        <div class="form-group">
                            <label class="col-form-label" for="jenis_kelamin">Jenis kelamin</label>
                            <select class="custom-select" name="jenis_kelamin" id="jenis_kelamin">
                                {!!  KustomHelper::getItem('jenis-kelamin') !!}
                            </select>                              
                        </div>                                                    
                    </div>
                    <div class="col-md-2">                          
                        <div class="form-group">
                            <label class="col-form-label" for="gol_darah">Gol. darah</label>
                            <select class="custom-select" name="gol_darah" id="gol_darah">
                                {!!  KustomHelper::getItem('golongan-darah') !!}
                            </select>
                            
                        </div>                                                    
                    </div>                       
                    <div class="col-md-3">                          
                        <div class="form-group">
                            <label class="col-form-label" for="hp">No. Handphone</label>
                            <input type="text" class="form-control form-control-sm" placeholder="exp: 0812xxx" name="hp" id="hp" >
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2">                          
                        <div class="form-group">
                            <label class="col-form-label" for="telp">No. Telp</label>
                            <input type="text" class="form-control form-control-sm"  name="telp" id="telp"  placeholder="022-70xxxxx">
                        </div>                                                    
                    </div>                       
                    <div class="col-md-3">                          
                        <div class="form-group">
                            <label class="col-form-label" for="email">email</label>
                            <input type="email" class="form-control form-control-sm"  name="email" id="email"  placeholder="contoh: u.wirahadi10@gmail.com">                                
                        </div>                                                    
                    </div>                       
                </div>
                <div class="row">                
                    <div class="col-md-10">                          
                        <div class="form-group">
                            <label class="col-form-label" for="alamat">Alamat/Jalan</label>
                            <input type="text" class="form-control form-control-sm" placeholder="contoh : Jl. Melong asih Gg Nusa indah 7 no 35 (RT/RW/Kel/Kec/Kota/Prov) input terpisah" name="alamat" id="alamat" >
                        </div>                                                    
                    </div>  
                    <div class="col-md-1">                          
                        <div class="form-group">
                            <label class="col-form-label" for="rt">RT</label>
                            <input type="text" class="form-control form-control-sm" name="rt" id="rt" >                                
                        </div>
                    </div>                       
                    <div class="col-md-1">                          
                        <div class="form-group">
                            <label class="col-form-label" for="rw">RW</label>
                            <input type="text" class="form-control form-control-sm" name="rw" id="rw" >                                
                        </div>
                    </div>     
                </div>
                <div class="row">                                                                                                                                
                    <div class="col-md-3">                          
                        <div class="form-group">
                            <label class="col-form-label" for="kelurahan">Kelurahan</label>
                            <input type="text" class="form-control form-control-sm" name="kelurahan" id="kelurahan">
                        </div>                                                    
                    </div>
                    <div class="col-md-2">                          
                        <div class="form-group">
                            <label class="col-form-label" for="kecamatan">Kecamatan</label>
                            <input type="text" class="form-control form-control-sm" name="kecamatan" id="kecamatan">
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2">                          
                        <div class="form-group">
                            <label class="col-form-label" for="kab_kota">Kota</label>
                            <input type="text" class="form-control form-control-sm"  name="kab_kota" id="kab_kota" >
                        </div>                                                    
                    </div>                           
                    <div class="col-md-3">                          
                        <div class="form-group">
                            <label class="col-form-label" for="provinsi">Provinsi</label>
                            <input type="text" class="form-control form-control-sm"  name="provinsi" id="provinsi" >
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2">                          
                        <div class="form-group">
                            <label class="col-form-label" for="pos">POS</label>
                            <input type="text" class="form-control form-control-sm"  name="pos" id="pos" >
                        </div>                                                    
                    </div>                       
                </div>

                <div class="row">                                          
                    <div class="col-md-3">                          
                        <div class="form-group">
                            <label class="col-form-label" for="status_marital">Status pernikahan</label>
                            <select class="custom-select" name="status_marital" id="status_marital">
                                {!!  KustomHelper::getItem('marital-status') !!}
                            </select>
                        </div>                                                    
                    </div>                       
                    <div class="col-md-3">                          
                        <div class="form-group">
                            <label class="col-form-label" for="pendidikan_terakhir">Pendidikan terakhir</label>
                            <select class="custom-select" name="pendidikan_terakhir" id="pendidikan_terakhir">
                                {!!  KustomHelper::getItem('pendidikan-terakhir') !!}
                            </select>
                        </div>                                                    
                    </div>
                    <div class="col-md-3">                          
                        <div class="form-group">
                            <label class="col-form-label" for="suku1">Suku/ras</label>
                            <input type="text" class="form-control form-control-sm" name="suku1" id="suku1">
                        </div>                                                    
                    </div>
                    <div class="col-md-3">                          
                        <div class="form-group">
                            <label class="col-form-label" for="pekerjaan">Pekerjaan</label>
                            <select class="custom-select" name="pekerjaan" id="pekerjaan">
                                {!!  KustomHelper::getItem('pekerjaan') !!}
                            </select>
                        </div>                                                    
                    </div>                                                                                  
                </div>
                <div class="row">                                                                                    
                    <div class="col-md-2">                          
                        <div class="form-group">
                            <label class="col-form-label" for="nama_ayah">Nama ayah</label>
                            <input type="text" class="form-control form-control-sm" name="nama_ayah" id="nama_ayah">
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2">                          
                        <div class="form-group">
                            <label class="col-form-label" for="nama_ibu">Nama ibu</label>
                            <input type="text" class="form-control form-control-sm"  name="nama_ibu" id="nama_ibu" >
                        </div>                                                    
                    </div> 
                    <div class="col-md-2">                          
                        <div class="form-group">
                            <label class="col-form-label" for="penanggung_jawab">Penanggung jawab</label>
                            <input type="text" class="form-control form-control-sm" name="penanggung_jawab" id="penanggung_jawab">
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2">                          
                        <div class="form-group">
                            <label class="col-form-label" for="hubungan_dengan_penanggung_jawab">Hubungan</label>
                            <input type="text" class="form-control form-control-sm"  name="hubungan_dengan_penanggung_jawab" id="hubungan_dengan_penanggung_jawab" >
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2">                          
                        <div class="form-group">
                            <label class="col-form-label" for="no_contact_darurat">Contact/hp</label>
                            <input type="text" class="form-control form-control-sm"  name="no_contact_darurat" id="no_contact_darurat" >
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2">                          
                        <div class="form-group">
                            <label class="col-form-label" for="status_pasien">Status</label>
                            <select class="custom-select" name="status_pasien" id="status_pasien">
                                {!!  KustomHelper::getItem('status-aktif') !!}
                            </select>
                        </div>                                                    
                    </div>                       
                </div>             
            </form>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div> --}}

@extends('layouts.main')
@section('content')

    <div class="col-12 col-sm-12">
        <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-pasien-tab" data-toggle="pill"
                            href="#custom-tabs-one-pasien" role="tab" aria-controls="custom-tabs-one-home"
                            aria-selected="true"><i class="fa fa-hospital-user"></i> Pasien utama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-riwayat-tab" data-toggle="pill"
                            href="#custom-tabs-one-riwayat" role="tab" aria-controls="custom-tabs-one-profile"
                            aria-selected="false"><i class="fa fa-file-medical-alt"></i> Riwayat pemeriksaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-family-tab" data-toggle="pill"
                            href="#custom-tabs-one-family" role="tab" aria-controls="custom-tabs-one-messages"
                            aria-selected="false"><i class="fa fa-users"></i> Family folder</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-lainnya-tab" data-toggle="pill"
                            href="#custom-tabs-one-lainnya" role="tab" aria-controls="custom-tabs-one-settings"
                            aria-selected="false"><i class="fa fa-th"></i> Lainnya</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade active show" id="custom-tabs-one-pasien" role="tabpanel"
                        aria-labelledby="custom-tabs-one-home-tab">
                        <form action="{{ route('pasien.update', [$data->id]) }}" method="POST" id="form-update-pasien"
                            data-url="{{ route('pasien.update', [$data->id]) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label" for="nik">N.I.K</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="nik" name="nik" value="{{ $data->nik }}" disabled/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label" for="no_kk">No. KK</label>
                                        <input type="text" class="form-control" name="no_kk" id="no_kk" disabled
                                            value="{{ $data->nik }}" />
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="col-form-label" for="status_hubungan">Status hubungan</label>
                                        <input type="text" class="form-control" id="nik" name="nik" value="{{ $data->status_hubungan }}" disabled />                                      
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label" for="nama_lengkap">Nama lengkap</label>
                                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="{{ $data->nama_lengkap }}" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label" for="no_bpjs">No. BPJS</label>
                                        <input type="text" class="form-control" name="no_bpjs" id="no_bpjs" value="{{ $data->no_bpjs }}" disabled />
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="col-form-label" for="no_rm_lama">No. RM lama</label>
                                        <input type="text" class="form-control" name="no_rm_lama" id="no_rm_lama" value="{{ $data->no_rm_lama }}" disabled />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label" for="tempat_lahir">Tempat lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="{{ $data->tempat_lahir }}" disabled/>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="col-form-label" for="tanggal_lahir">Tanggal lahir</label>
                                        <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{ $data->tanggal_lahir }}" disabled />
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="col-form-label" for="agama">Agama</label>
                                        <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{ $data->agama }}" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="col-form-label" for="jenis_kelamin">Jenis kelamin</label>
                                        <input type="text" class="form-control" name="jenis_kelamin" value="{{ $data->jenis_kelamin }}" disabled />
                                        
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="col-form-label" for="gol_darah">Gol. darah</label>
                                        <input type="text" class="form-control" name="gol_darah" value="{{ $data->gol_darah }}" disabled />                                        
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label" for="hp">No. Handphone</label>
                                        <input type="text" class="form-control" name="hp" value="{{ $data->hp }}" disabled />
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="col-form-label" for="telp">No. Telp</label>
                                        <input type="text" class="form-control" name="telp" id="telp" value="{{ $data->telp }}" disabled />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label" for="email">email</label>
                                        <input type="text" class="form-control" name="email" value="{{ $data->email }}" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="col-form-label" for="alamat">Alamat/Jalan</label>
                                        <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $data->alamat }}" disabled />
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label class="col-form-label" for="rt">RT</label>
                                        <input type="text" class="form-control" name="rt" id="rt" value="{{ $data->rt }}" disabled />
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label class="col-form-label" for="rw">RW</label>
                                        <input type="text" class="form-control" name="rw" id="rw" value="{{ $data->rw }}" disabled />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label" for="kelurahan">Kelurahan</label>
                                        <input type="text" class="form-control" name="kelurahan" id="kelurahan" value="{{ $data->kelurahan }}" disabled />
                                    </div>
                                </div>
                            </div>                           
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label" for="kecamatan">Kecamatan</label>
                                        <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="{{ $data->kecamatan }}" disabled />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label" for="kab_kota">Kota</label>
                                        <input type="text" class="form-control" name="kab_kota" id="kab_kota" value="{{ $data->kab_kota }}" disabled />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label" for="provinsi">Provinsi</label>
                                        <input type="text" class="form-control" name="provinsi" id="provinsi" value="{{ $data->provinsi }}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label" for="pos">POS</label>
                                        <input type="text" class="form-control" name="pos" id="pos" value="{{ $data->pos }}" disabled />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label" for="status_marital">Status pernikahan</label>
                                        <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{ $data->status_marital }}" disabled />
                                        
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label" for="pendidikan_terakhir">Pendidikan terakhir</label>
                                        <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" disabled
                                            value="{{ $data->pendidikan_terakhir }}" />                                        
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label" for="suku">Suku/ras</label>
                                        <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" disabled
                                            value="{{ $data->suku }}" />                                        
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label" for="pekerjaan">Pekerjaan</label>
                                        <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" disabled
                                            value="{{ $data->pekerjaan }}" />                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="col-form-label" for="nama_ayah">Nama ayah</label>
                                        <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" disabled
                                            value="{{ $data->nama_ayah }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="col-form-label" for="nama_ibu">Nama ibu</label>
                                        <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" disabled
                                            value="{{ $data->nama_ibu }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="col-form-label" for="penanggung_jawab">Penanggung jawab</label>
                                        <input type="text" class="form-control" name="penanggung_jawab" disabled
                                            id="penanggung_jawab" value="{{ $data->penanggung_jawab }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="col-form-label"
                                            for="hubungan_dengan_penanggung_jawab">Hubungan</label>
                                        <input type="text" class="form-control" name="hubungan_dengan_penanggung_jawab" disabled
                                            id="hubungan_dengan_penanggung_jawab"
                                            value="{{ $data->hubungan_dengan_penanggung_jawab }}" />
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="col-form-label" for="no_contact_darurat">Contact/hp</label>
                                        <input type="text" class="form-control" name="no_contact_darurat"
                                            id="no_contact_darurat" value="{{ $data->no_contact_darurat }}" disabled />
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="col-form-label" for="status_pasien">Status</label>
                                        <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" disabled
                                            value="{{ $data->status_pasien }}" />
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-warning" name="kembali" onclick="window.location.href='/pasien'">Kembali</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-riwayat" role="tabpanel"
                        aria-labelledby="custom-tabs-one-profile-tab">
                        <div class="table-responsive">
                            <table class="table table-striped" id="riwayat-kunjungan">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Usia</th>
                                    <th>Poli</th>
                                    <th>keluhan</th>
                                    <th>aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>1.</td>
                                    <td>12 jan 2020</td>
                                    <td>34 tahun 2 Bulan</td>
                                    <td>Umum</td>
                                    <td>batuk</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">lihat</button>
                                            <button type="button" class="btn btn-info">Middle</button>
                                            <button type="button" class="btn btn-info">Right</button>
                                          </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>1.</td>
                                    <td>12 jan 2020</td>
                                    <td>34 tahun 2 Bulan</td>
                                    <td>Umum</td>
                                    <td>batuk</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info">Left</button>
                                            <button type="button" class="btn btn-info">Middle</button>
                                            <button type="button" class="btn btn-info">Right</button>
                                          </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>1.</td>
                                    <td>12 jan 2020</td>
                                    <td>34 tahun 2 Bulan</td>
                                    <td>Umum</td>
                                    <td>batuk</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info">Left</button>
                                            <button type="button" class="btn btn-info">Middle</button>
                                            <button type="button" class="btn btn-info">Right</button>
                                          </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>1.</td>
                                    <td>12 jan 2020</td>
                                    <td>34 tahun 2 Bulan</td>
                                    <td>Umum</td>
                                    <td>batuk</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info">Left</button>
                                            <button type="button" class="btn btn-info">Middle</button>
                                            <button type="button" class="btn btn-info">Right</button>
                                          </div>
                                    </td>
                                  </tr>
                                
                                </tbody>
                              </table>
                        </div>
                        
                        <button type="button" class="btn btn-warning" name="kembali" onclick="window.location.href='/pasien'">Kembali</button>
                        
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-family" role="tabpanel"
                        aria-labelledby="custom-tabs-one-messages-tab">
                        <div class="table-responsive">
                            <table class="table table-striped" id="family-folder">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama lengkap </th>
                                    <th>Tanggal lahir</th>
                                    <th>Status Hubungan</th>
                                    <th>pernah berkunjung</th>
                                    <th>aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>1.</td>
                                    <td>3208124512004004</td>
                                    <td>Iin Inyah</td>
                                    <td>12/08/1982</td>
                                    <td>Istri</td>
                                    <td>ya</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" title="lihat data"><i class="fa fa-search"></i></button>                                        
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                        <button type="button" class="btn btn-warning" name="kembali" onclick="window.location.href='/pasien'">Kembali</button>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-lainnya" role="tabpanel"
                        aria-labelledby="custom-tabs-one-lainnya-tab">
                        tab lainnya
                        <button type="button" class="btn btn-warning" name="kembali" onclick="window.location.href='/pasien'">Kembali</button>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>





@endsection
