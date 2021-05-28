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
                    <div class="tab-pane fade active show" id="custom-tabs-one-pasien" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">                        
                    
                        <table class="table table-striped">                     
                              <tr>
                                  <td style="width: 5px">1.</td>
                                  <td>NIK</td>
                                  <td style="width: 2px">:</td>
                                  <td>{{$pasien->nik}}</td>
                                  <td>No. KK</td>
                                  <td style="width: 2px">:</td>
                                  <td>{{$pasien->no_kk}}</td>
                              </tr> 
                              <tr>
                                  <td>1.</td>
                                  <td>Status hubungan</td>
                                  <td>:</td>
                                  <td>{{$pasien->status_hubungan}}</td>
                                  <td>Nama lengkap</td>
                                  <td>:</td>
                                  <td>{{$pasien->nama_lengkap}}</td>
                              </tr> 
                              <tr>
                                  <td>1.</td>
                                  <td>No. BPJS</td>
                                  <td>:</td>
                                  <td>{{$pasien->no_bpjs}}</td>
                                  <td>No. RM (lama)</td>
                                  <td>:</td>
                                  <td>{{$pasien->no_rm_lama}}</td>
                              </tr> 
                              <tr>
                                  <td>1.</td>
                                  <td>No. Rekam Medis</td>
                                  <td>:</td>
                                  <td>{{$pasien->no_rm}}</td>
                                  <td>Jenis kelamin</td>
                                  <td>:</td>
                                  <td>{{$pasien->jenis_kelamin}}</td>
                              </tr> 
                              <tr>
                                  <td>1.</td>
                                  <td>Tempat lahir</td>
                                  <td>:</td>
                                  <td>{{$pasien->tempat_lahir}}</td>
                                  <td>Tanggal lahir</td>
                                  <td>:</td>
                                  <td>{{$pasien->tanggal_lahir}}</td>
                              </tr> 
                              <tr>
                                  <td>1.</td>
                                  <td>Usia saat ini</td>
                                  <td>:</td>
                                  <td>{{$pasien->tahun}}</td>
                                  <td>Agama</td>
                                  <td>:</td>
                                  <td>{{$pasien->agama}}</td>
                              </tr> 
                              <tr>
                                  <td>1.</td>
                                  <td>Gol. darah</td>
                                  <td>:</td>
                                  <td>{{$pasien->gol_darah}}</td>
                                  <td>No. HP</td>
                                  <td>:</td>
                                  <td>{{$pasien->hp}}</td>
                              </tr> 
                              <tr>
                                  <td>1.</td>
                                  <td>No. Telp</td>
                                  <td>:</td>
                                  <td>{{$pasien->telp}}</td>
                                  <td>Email</td>
                                  <td>:</td>
                                  <td>{{$pasien->email}}</td>
                              </tr> 
                              <tr>
                                  <td>1.</td>
                                  <td>Warganegara</td>
                                  <td>:</td>
                                  <td>{{$pasien->warganegara}}</td>
                              </tr> 
                              <tr>
                                  <td>1.</td>
                                  <td>Alamat</td>
                                  <td>:</td>
                                  <td colspan="3">{{$pasien->alamat.' RT. '.$pasien->rt.' RW. '.$pasien->rw}}</td>
                              </tr> 
                              <tr>
                                  <td>1.</td>
                                  <td>Kelurahan</td>
                                  <td>:</td>
                                  <td>{{$pasien->kelurahan}}</td>
                                  <td>Kecamatan</td>
                                  <td>:</td>
                                  <td>{{$pasien->kecamatan}}</td>
                              </tr> 
                              <tr>
                                  <td>1.</td>
                                  <td>Kota kab.</td>
                                  <td>:</td>
                                  <td>{{$pasien->kab_kota}}</td>
                                  <td>Provinsi</td>
                                  <td>:</td>
                                  <td>{{$pasien->provinsi}}</td>
                              </tr> 
                              <tr>
                                  <td>1.</td>
                                  <td>Kode POS</td>
                                  <td>:</td>
                                  <td>{{$pasien->pos}}</td>
                                  <td>Status pernikahan</td>
                                  <td>:</td>
                                  <td>{{$pasien->status_marital}}</td>
                              </tr> 
                              <tr>
                                  <td>1.</td>
                                  <td>Pendidikan terakhir</td>
                                  <td>:</td>
                                  <td>{{$pasien->pendidikan_terakhir}}</td>
                                  <td>Suku</td>
                                  <td>:</td>
                                  <td>{{$pasien->suku}}</td>
                              </tr> 
                              {{-- <tr>
                                  <td>1.</td>                                  
                                  <td>Pekerjaan</td>
                                  <td>:</td>
                                  <td>{{$pasien->pekerjaan}}</td>
                              </tr>  --}}
                              <tr>
                                  <td>1.</td>
                                  <td>Nama ayah</td>
                                  <td>:</td>
                                  <td>{{$pasien->nama_ayah}}</td>
                                  <td>Nama ibu</td>
                                  <td>:</td>
                                  <td>{{$pasien->nama_ibu}}</td>
                              </tr> 
                              <tr>
                                  <td>1.</td>
                                  <td>Penanggung jawab</td>
                                  <td>:</td>
                                  <td>{{$pasien->penanggung_jawab}}</td>
                                  <td>hubungan Sebagai</td>
                                  <td>:</td>
                                  <td>{{$pasien->hubungan_dengan_penanggung_jawab}}</td>
                              </tr> 
                              <tr>
                                  <td>1.</td>
                                  <td>Nomor Contact</td>
                                  <td>:</td>
                                  <td>{{$pasien->no_contact_darurat}}</td>
                                  <td>Status pasien</td>
                                  <td>:</td>
                                  <td>{{$pasien->status_pasien==1?'Aktif':'Tidak aktif'}}</td>
                              </tr> 
                              <tr>
                                  <td>1.</td>
                                  <td>Wilayah kerja</td>
                                  <td>:</td>
                                  <td>{{$pasien->wilayah_kerja=='1'?'Ya':'Tidak'}}</td>
                                  <td>Tgl. mulai aktif BPJS</td>
                                  <td>:</td>
                                  <td>{{$pasien->tglmulaiaktif}}</td>
                              </tr> 
                              <tr>
                                  <td>1.</td>
                                  <td>Tanggal akhir berlaku BPJS</td>
                                  <td>:</td>
                                  <td>{{$pasien->tglakhirberlaku}}</td>                                  
                              </tr> 
                              <tr>
                                  <td>1.</td>
                                  <td>Kode Faskes BPJS</td>
                                  <td>:</td>
                                  <td>{{$pasien->kodeproviderpeserta_bpjs}}</td>
                                  <td>Nama Faskes Utama BPJS</td>
                                  <td>:</td>
                                  <td>{{$pasien->namaproviderpeserta_bpjs}}</td>                                  
                              </tr> 
                              <tr>
                                  <td>1.</td>
                                  <td>Kode faskes Gigi</td>
                                  <td>:</td>
                                  <td>{{$pasien->kodeprovidergigi_bpjs}}</td>                                  
                                  <td>Nama Faskes Gigi</td>
                                  <td>:</td>
                                  <td>{{$pasien->namaprovidergigi_bpjs}}</td>
                                  
                              </tr> 
                              <tr>
                                  <td>1.</td>
                                  <td>Kode Jenis kelas</td>
                                  <td>:</td>
                                  <td>{{$pasien->kodejeniskelas_bpjs}}</td>
                                  <td>Nama Jenis Kelas</td>
                                  <td>:</td>
                                  <td>{{$pasien->namajeniskelas_bpjs}}</td>
                              </tr> 
                              <tr>
                                  <td>1.</td>
                                  <td>Kode Jenis Peserta</td>
                                  <td>:</td>
                                  <td>{{$pasien->kodejenispeserta_bpjs}}</td>
                                  <td>Jenis peserta</td>
                                  <td>:</td>
                                  <td>{{$pasien->namajenispeserta_bpjs}}</td>
                              </tr> 
                          </table>
                          
                    
                            <div class="card-footer">
                                <a href="{{route('pasien.edit',[$pasien->id])}}" class="btn btn-sm btn-success">Edit</a>                            
                                <button type="button" class="btn btn-sm btn-warning" name="kembali" onclick="window.location.href='/pasien'">Kembali</button>
                            </div>
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
