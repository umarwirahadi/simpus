@extends('layouts.main')
@section('content')
    <div class="col-lg-12">
        <div class="card card-primary">
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
                <form action="{{ route('pasien.store') }}" method="POST" id="form-pasien">
                    @csrf

                    <div class="row">
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="nik">N.I.K</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="No. KTP" id="nik" name="nik">
                                    <span class="input-group-append">
                                      <button type="button" class="btn btn-info btn-flat">Cek</button>
                                    </span>
                                  </div>
                            </div>         
                        </div>                     
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="no_kk">No. KK</label>
                                <input type="text" class="form-control" placeholder="No. KK" name="no_kk" id="no_kk" >
                            </div>                                                    
                        </div>                       
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="status_hubungan">Status hubungan</label>
                                <select class="custom-select" name="status_hubungan" id="status_hubungan">
                                    {!! KustomHelper::getItem('status-hubungan') !!}
                                </select>
                              
                            </div>                                                    
                        </div>                       
                        <div class="col-md-4">                          
                            <div class="form-group">
                                <label class="col-form-label" for="nama_lengkap">Nama lengkap</label>
                                <input type="text" class="form-control" placeholder="Nama lengkap" name="nama_lengkap" id="nama_lengkap" >
                            </div>                                                    
                        </div>                       
                    </div>
                    <div class="row">
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="jenis_kelamin">Jenis kelamin</label>
                                <select class="custom-select" name="jenis_kelamin" id="jenis_kelamin">
                                    {!! KustomHelper::getItem('jenis-kelamin') !!}
                                </select>
                              
                            </div>                                                    
                        </div>                       
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="tempat_lahir">Tempat lahir</label>
                                <input type="text" class="form-control" placeholder="tempat lahir" name="tempat_lahir" id="tempat_lahir" >
                            </div>                                                    
                        </div>                       
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="tanggal_lahir">Tanggal lahir</label>
                                <input type="date" class="form-control"  name="tanggal_lahir" id="tanggal_lahir" >
                            </div>                                                    
                        </div>                       
                        <div class="col-md-4">                          
                            <div class="form-group">
                                <label class="col-form-label" for="telp">Agama</label>
                                <select class="custom-select" name="telp" id="telp">
                                    {!! KustomHelper::getItem('agama') !!}
                                </select>
                            </div>                                                    
                        </div>                       
                    </div>
                    <div class="row">
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="gol_darah">Golongan darah</label>
                                <select class="custom-select" name="gol_darah" id="gol_darah">
                                    {!! KustomHelper::getItem('golongan-darah') !!}
                                </select>
                                
                            </div>                                                    
                        </div>                       
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="hp">No. Handphone</label>
                                <input type="text" class="form-control" placeholder="exp: 0812xxx" name="hp" id="hp" >
                            </div>                                                    
                        </div>                       
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="telp">No. Telp</label>
                                <input type="text" class="form-control"  name="telp" id="telp"  placeholder="022-70xxxxx">
                            </div>                                                    
                        </div>                       
                        <div class="col-md-4">                          
                            <div class="form-group">
                                <label class="col-form-label" for="email">email</label>
                                <input type="email" class="form-control"  name="email" id="email"  placeholder="contoh: u.wirahadi10@gmail.com">                                
                            </div>                                                    
                        </div>                       
                    </div>
                    <div class="row">
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="warganegara">Kewarganegaraan</label>
                                <input type="text" class="form-control" placeholder="contoh: indonesia" name="warganegara" id="warganegara" value="indonesia">                                  
                            </div>                                                    
                        </div>                       
                        <div class="col-md-9">                          
                            <div class="form-group">
                                <label class="col-form-label" for="alamat">Alamat/Jalan</label>
                                <input type="text" class="form-control" placeholder="contoh : Jl. Melong asih Gg Nusa indah 7 no 35 (RT/RW/Kel/Kec/Kota/Prov) input terpisah" name="alamat" id="alamat" >                                  
                            </div>                                                    
                        </div>      
                    </div>
                    <div class="row">
                        <div class="col-md-1">                          
                            <div class="form-group">
                                <label class="col-form-label" for="rt">RT</label>
                                <input type="text" class="form-control" name="rt" id="rt" >                                
                            </div>
                        </div>                       
                        <div class="col-md-1">                          
                            <div class="form-group">
                                <label class="col-form-label" for="rw">RW</label>
                                <input type="text" class="form-control" name="rw" id="rw" >                                
                            </div>
                        </div>                       
                        <div class="col-md-10">                          
                            <div class="form-group">
                                <label class="col-form-label" for="cari_wilayah">Pencarian wilayah</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="ketik nama kelurahan untuk mencari dan mengisi wilayah otomatis" id="cari_wilayah" name="cari_wilayah">
                                    <span class="input-group-append">
                                      <button type="button" class="btn btn-info btn-flat"><i class="fa fa-search"></i> Cari</button>
                                    </span>
                                  </div>
                            </div>         
                        </div>                                                                     
                    </div>
                    <div class="row">                                          
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="kelurahan">Kelurahan</label>
                                <input type="text" class="form-control" name="kelurahan" id="kelurahan">
                            </div>                                                    
                        </div>                       
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="kecamatan">Kecamatan</label>
                                <input type="text" class="form-control" name="kecamatan" id="kecamatan">
                            </div>                                                    
                        </div>                       
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="kota">Kota</label>
                                <input type="text" class="form-control"  name="kota" id="kota" >
                            </div>                                                    
                        </div>                       
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="provinsi">Provinsi</label>
                                <input type="text" class="form-control"  name="provinsi" id="provinsi" >
                            </div>                                                    
                        </div>                       
                        <div class="col-md-1">                          
                            <div class="form-group">
                                <label class="col-form-label" for="pos">POS</label>
                                <input type="text" class="form-control"  name="pos" id="pos" >
                            </div>                                                    
                        </div>                       
                    </div>

                    <div class="row">                                          
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="kelurahan">Status pernikahan</label>
                                <select class="custom-select" name="gol_darah" id="gol_darah">
                                    {!! KustomHelper::getItem('marital-status') !!}
                                </select>
                            </div>                                                    
                        </div>                       
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="pendidikan_terakhir">Pendidikan terakhir</label>
                                <select class="custom-select" name="pendidikan_terakhir" id="pendidikan_terakhir">
                                    {!! KustomHelper::getItem('pendidikan-terakhir') !!}
                                </select>
                            </div>                                                    
                        </div>
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="suku">Suku/ras</label>
                                <select class="custom-select" name="suku" id="suku">
                                    {!! KustomHelper::getItem('suku') !!}
                                </select>
                            </div>                                                    
                        </div>
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="pekerjaan">Pekerjaan</label>
                                <select class="custom-select" name="pekerjaan" id="pekerjaan">
                                    {!! KustomHelper::getItem('pekerjaan') !!}
                                </select>
                            </div>                                                    
                        </div>                                                                                  
                    </div>
                    <div class="row">                                                                                    
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="nama_ayah">Nama ayah</label>
                                <input type="text" class="form-control" name="nama_ayah" id="nama_ayah">
                            </div>                                                    
                        </div>                       
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="nama_ibu">Nama ibu</label>
                                <input type="text" class="form-control"  name="nama_ibu" id="nama_ibu" >
                            </div>                                                    
                        </div> 
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="penanggung_jawab">Penanggung jawab</label>
                                <input type="text" class="form-control" name="penanggung_jawab" id="penanggung_jawab">
                            </div>                                                    
                        </div>                       
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="provinsi">Hubungan</label>
                                <input type="text" class="form-control"  name="provinsi" id="provinsi" >
                            </div>                                                    
                        </div>                       
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="pos">Contact/hp</label>
                                <input type="text" class="form-control"  name="pos" id="pos" >
                            </div>                                                    
                        </div>                       
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="pos">Status</label>
                                <select class="custom-select" name="suku" id="suku">
                                    {!! KustomHelper::getItem('status-aktif') !!}
                                </select>
                            </div>                                                    
                        </div>                       
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                        <button type="button" class="btn btn-warning" name="kembali"
                            onclick="window.location.href='/pasien'">Kembali</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
