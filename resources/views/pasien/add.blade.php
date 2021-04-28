@extends('layouts.main')
@section('content')
    <div class="col-lg-12">
        <form action="" method="POST" id="form-pasien">
            @csrf
            <div class="card card-default">
                <div class="card-header">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <button type="button" class="btn btn-danger" onclick="window.location.href='/pasien'">Kembali</button>
                </div>         
              </div>
        <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1">
              <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Data pasien</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">BPJS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Keluarga</a>
                </li>               
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-one-tabContent">
                <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">                
                    <div>                    
                        <div class="row">
                            <div class="col-md-3">                          
                                <div class="form-group">
                                    <label class="col-form-label" for="nik">N.I.K</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="No. KTP" id="nik" name="nik">
                                        <span class="input-group-append">
                                          <button type="button" class="btn btn-info btn-flat btn-sm" id="find-nik"><i class="fa fa-search"></i></button>
                                        </span>
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
                                    <label class="col-form-label" for="status_hubungan">Status hubungan</label>
                                    <select class="form-control form-control-sm" name="status_hubungan" id="status_hubungan">
                                        {!! KustomHelper::getItem('status-hubungan') !!}
                                    </select>
                                  
                                </div>                                                    
                            </div>                       
                            <div class="col-md-4">                          
                                <div class="form-group">
                                    <label class="col-form-label" for="nama_lengkap">Nama lengkap</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Nama lengkap" name="nama_lengkap" id="nama_lengkap" value="">
                                </div>                                                    
                            </div>                       
                        </div>
                        <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-form-label" for="nik">No. BPJS</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" placeholder="No. BPJS" id="no_bpjs" name="no_bpjs">
                                    <span class="input-group-append">
                                      <button type="button" class="btn btn-info btn-flat btn-sm" id="find-bpjs" ><i class="fa fa-search"></i></button>
                                    </span>
                                  </div>
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
                                    <input type="text" class="form-control form-control-sm" placeholder="tempat lahir" name="tempat_lahir" id="tempat_lahir" value="">
                                </div>                                                    
                            </div>                       
                            <div class="col-md-2">                          
                                <div class="form-group">
                                    <label class="col-form-label" for="tanggal_lahir">Tanggal lahir</label>
                                    <input type="date" class="form-control form-control-sm"  name="tanggal_lahir" id="tanggal_lahir" value="">
                                </div>                                                    
                            </div>                       
                            <div class="col-md-2">                          
                                <div class="form-group">
                                    <label class="col-form-label" for="agama">Agama</label>
                                    <select class="form-control form-control-sm" name="agama" id="agama">
                                        {!! KustomHelper::getItem('agama') !!}
                                    </select>
                                </div>                                                    
                            </div>                       
                        </div>
                        <div class="row">
                            <div class="col-md-2">                          
                                <div class="form-group">
                                    <label class="col-form-label" for="jenis_kelamin">Jenis kelamin</label>
                                    <select class="form-control form-control-sm" name="jenis_kelamin" id="jenis_kelamin">
                                        {!! KustomHelper::getItem('jenis-kelamin') !!}
                                    </select>                              
                                </div>                                                    
                            </div>
                            <div class="col-md-2">                          
                                <div class="form-group">
                                    <label class="col-form-label" for="gol_darah">Gol. darah</label>
                                    <select class="form-control form-control-sm" name="gol_darah" id="gol_darah">
                                        {!! KustomHelper::getItem('golongan-darah') !!}
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
                                                 
                            <div class="col-md-6">                          
                                <div class="form-group">
                                    <label class="col-form-label" for="cari_wilayah">Pencarian wilayah</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm" placeholder="ketik nama kelurahan untuk mencari dan mengisi wilayah otomatis" id="cari_wilayah" name="cari_wilayah">
                                      </div>
                                </div>         
                            </div>                                                                     
                            <div class="col-md-3">                          
                                <div class="form-group">
                                    <label class="col-form-label" for="kelurahan">Kelurahan</label>
                                    <input type="text" class="form-control form-control-sm" name="kelurahan" id="kelurahan">
                                </div>                                                    
                            </div>
                            <div class="col-md-3">                          
                                <div class="form-group">
                                    <label class="col-form-label" for="kecamatan">Kecamatan</label>
                                    <input type="text" class="form-control form-control-sm" name="kecamatan" id="kecamatan">
                                </div>                                                    
                            </div>
                        </div>
                        <div class="row">                                                                                         
                                                   
                            <div class="col-md-3">                          
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
                            <div class="col-md-3">                          
                                <div class="form-group">
                                    <label class="col-form-label" for="pos">POS</label>
                                    <input type="text" class="form-control form-control-sm"  name="pos" id="pos" >
                                </div>                                                    
                            </div>                       
                            <div class="col-md-3">                          
                                <div class="form-group">
                                    <label class="col-form-label" for="wilayah_kerja">Wil. kerja</label>
                                    <select class="form-control form-control-sm" name="wilayah_kerja" id="wilayah_kerja">
                                        {!! KustomHelper::getItem('wil-kerja') !!}
                                    </select>
                                </div>                                                    
                            </div>                       
                        </div>
    
                        <div class="row">                                          
                            <div class="col-md-3">                          
                                <div class="form-group">
                                    <label class="col-form-label" for="status_marital">Status pernikahan</label>
                                    <select class="form-control form-control-sm" name="status_marital" id="status_marital">
                                        {!! KustomHelper::getItem('marital-status') !!}
                                    </select>
                                </div>                                                    
                            </div>                       
                            <div class="col-md-3">                          
                                <div class="form-group">
                                    <label class="col-form-label" for="pendidikan_terakhir">Pendidikan terakhir</label>
                                    <select class="form-control form-control-sm" name="pendidikan_terakhir" id="pendidikan_terakhir">
                                        {!! KustomHelper::getItem('pendidikan-terakhir') !!}
                                    </select>
                                </div>                                                    
                            </div>
                            <div class="col-md-3">                          
                                <div class="form-group">
                                    <label class="col-form-label" for="suku">Suku/ras</label>
                                    <select class="form-control form-control-sm" name="suku" id="suku">
                                        {!! KustomHelper::getItem('suku') !!}
                                    </select>
                                </div>                                                    
                            </div>
                            <div class="col-md-3">                          
                                <div class="form-group">
                                    <label class="col-form-label" for="pekerjaan">Pekerjaan</label>
                                    <select class="form-control form-control-sm" name="pekerjaan" id="pekerjaan">
                                        {!! KustomHelper::getItem('pekerjaan') !!}
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
                                    <select class="form-control form-control-sm" name="status_pasien" id="status_pasien">
                                        {!! KustomHelper::getItem('status-aktif') !!}
                                    </select>
                                </div>                                                    
                            </div>                       
                        </div>                       
                    </div>
                   
                </div>
                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    <div class="row">
                        <div class="col-md-6">                          
                            <div class="form-group">
                                <label class="col-form-label" for="tglMulaiAktif">Tanggal mulai aktif</label>
                                <input type="text" class="form-control form-control-sm" name="tglMulaiAktif" id="tglMulaiAktif" >
                            </div>         
                        </div>                     
                        <div class="col-md-6">                          
                            <div class="form-group">
                                <label class="col-form-label" for="tglAkhirBerlaku">Tanggal akhir berlaku</label>
                                <input type="text" class="form-control form-control-sm" name="tglAkhirBerlaku" id="tglAkhirBerlaku" >
                            </div>                                                    
                        </div>                                                                      
                    </div>
                    <div class="row">
                        <div class="col-md-6">                          
                            <div class="form-group">
                                <label class="col-form-label" for="kdProvider">Kode Provider</label>
                                <input type="text" class="form-control form-control-sm" name="kdProvider" id="kdProvider" value="">                                
                            </div>                                                    
                        </div>                       
                        <div class="col-md-6">                          
                            <div class="form-group">
                                <label class="col-form-label" for="nmProvider">Nama provider</label>
                                <input type="text" class="form-control form-control-sm" name="nmProvider" id="nmProvider" value="">
                            </div>                                                    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">                          
                            <div class="form-group">
                                <label class="col-form-label" for="kdProviderGigi">Kode Provider gigi</label>
                                <input type="text" class="form-control form-control-sm" name="kdProviderGigi" id="kdProviderGigi" value="">                                                              
                            </div>                                                    
                        </div>                       
                        <div class="col-md-6">                          
                            <div class="form-group">
                                <label class="col-form-label" for="nmProviderGigi">Nama provider gigi</label>
                                <input type="text" class="form-control form-control-sm" name="nmProviderGigi" id="nmProviderGigi" value="">
                            </div>                                                    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">                          
                            <div class="form-group">
                                <label class="col-form-label" for="kdKelas">Kode kelas</label>
                                <input type="text" class="form-control form-control-sm" name="kdKelas" id="kdKelas" value="">                                
                            </div>                                                    
                        </div>                       
                        <div class="col-md-6">                          
                            <div class="form-group">
                                <label class="col-form-label" for="namaKelas">Nama kelas</label>
                                <input type="text" class="form-control form-control-sm" name="namaKelas" id="namaKelas" value="">
                            </div>                                                    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">                          
                            <div class="form-group">
                                <label class="col-form-label" for="kodeJenisPeserta">Kode jenis peserta</label>
                                <input type="text" class="form-control form-control-sm" name="kodeJenisPeserta" id="kodeJenisPeserta" value="">                                
                            </div>                                                    
                        </div>                       
                        <div class="col-md-6">                          
                            <div class="form-group">
                                <label class="col-form-label" for="namaJenisPeserta">Nama jenis peserta</label>
                                <input type="text" class="form-control form-control-sm" name="namaJenisPeserta" id="namaJenisPeserta" value="">
                            </div>                                                    
                        </div>
                    </div>
                    <div class="row">                                              
                        <div class="col-md-6">                          
                            <div class="form-group">
                                <label class="col-form-label" for="kodeAsuransiPeserta">Kode asuransi peserta</label>
                                <input type="text" class="form-control form-control-sm" name="kodeAsuransiPeserta" id="kodeAsuransiPeserta" value="">
                            </div>                                                    
                        </div>
                        <div class="col-md-6">                          
                            <div class="form-group">
                                <label class="col-form-label" for="namaAsuransiPeserta">Nama asuransi peserta</label>
                                <input type="text" class="form-control form-control-sm" name="namaAsuransiPeserta" id="namaAsuransiPeserta" value="">
                            </div>                                                    
                        </div>                                       
                    </div>
                    <div class="row">
                        <div class="col-md-6">                          
                            <div class="form-group">
                                <label class="col-form-label" for="nomorAsuransiPeserta">Nomor asuransi peserta</label>
                                <input type="text" class="form-control form-control-sm" name="nomorAsuransiPeserta" id="nomorAsuransiPeserta" value="">
                            </div>                                                    
                        </div>
                        <div class="col-md-6">                          
                            <div class="form-group">
                                <label class="col-form-label" for="tunggakan_bpjs">Tunggakan BPJS</label>
                                <input type="text" class="form-control form-control-sm" name="tunggakan_bpjs" id="tunggakan_bpjs" value="">
                            </div>                                                    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">                          
                            <div class="form-group">
                                <label class="col-form-label" for="ketAktif">Aktif</label>
                                <input type="text" class="form-control form-control-sm" name="ketAktif" id="ketAktif" value="">
                                <input type="hidden" name="aktif" id="aktif" value="">
                            </div>                                                    
                        </div>
                        <div class="col-md-6">                          
                            <div class="form-group">
                                <label class="col-form-label" for="pstprol">Peserta Prolanis</label>
                                <input type="text" class="form-control form-control-sm" name="pstprol" id="pstprol" value="">
                            </div>                                                    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">                          
                            <div class="form-group">
                                <label class="col-form-label" for="pesprb">Peserta prb</label>
                                <input type="text" class="form-control form-control-sm" name="pesprb" id="pesprb" value="">
                                <input type="hidden" name="aktif" id="aktif" value="">
                            </div>                                                    
                        </div>
                        <div class="col-md-6">                          
                            <div class="form-group">
                                {{-- <label class="col-form-label" for="pstprol">Peserta Prolanis</label> --}}
                                {{-- <input type="text" class="form-control form-control-sm" name="pstprol" id="pstprol" value=""> --}}
                            </div>                                                    
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                   data keluarga
                </div>                
              </div>
            </div>         
          </div>
    
        {{-- <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ $aksi ?? '' }}</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="" method="POST" id="form-pasien">
                    @csrf
                    
                    
                    
                    
                </form>
            </div>
        </div> --}}
    </form>
    </div>

@endsection
