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
                <form action="{{route('pasien.update',[$data->id])}}" method="POST" id="form-update-pasien" data-url="{{route('pasien.update',[$data->id])}}">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">                    
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="row">
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="nik">N.I.K</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="No. KTP" id="nik" name="nik" value="{{$data->nik}}">
                                    <span class="input-group-append">
                                      <button type="button" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                                    </span>
                                  </div>
                            </div>         
                        </div>                     
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="no_kk">No. KK</label>
                                <input type="text" class="form-control" placeholder="No. KK" name="no_kk" id="no_kk" value="{{$data->nik}}">
                            </div>                                                    
                        </div>                       
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="status_hubungan">Status hubungan</label>
                                <select class="custom-select" name="status_hubungan" id="status_hubungan">
                                    {!! KustomHelper::getItem('status-hubungan',$data->status_hubungan) !!}
                                </select>
                              
                            </div>                                                    
                        </div>                       
                        <div class="col-md-4">                          
                            <div class="form-group">
                                <label class="col-form-label" for="nama_lengkap">Nama lengkap</label>
                                <input type="text" class="form-control" placeholder="Nama lengkap" name="nama_lengkap" id="nama_lengkap" value="{{$data->nama_lengkap}}">
                            </div>                                                    
                        </div>                       
                    </div>
                    <div class="row">
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="no_bpjs">No. BPJS</label>
                                <input type="text" class="form-control" placeholder="No BPJS" name="no_bpjs" id="no_bpjs" value="{{$data->no_bpjs}}">
                            </div>                                                    
                        </div>                                                
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="no_rm_lama">No. RM lama</label>
                                <input type="text" class="form-control" placeholder="No RM lama" name="no_rm_lama" id="no_rm_lama" value="{{$data->no_rm_lama}}">
                            </div>                                                    
                        </div>                                                
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="tempat_lahir">Tempat lahir</label>
                                <input type="text" class="form-control" placeholder="tempat lahir" name="tempat_lahir" id="tempat_lahir" value="{{$data->tempat_lahir}}">
                            </div>                                                    
                        </div>                       
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="tanggal_lahir">Tanggal lahir</label>
                                <input type="date" class="form-control"  name="tanggal_lahir" id="tanggal_lahir" value="{{$data->tanggal_lahir}}">
                            </div>                                                    
                        </div>                       
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="agama">Agama</label>
                                <select class="custom-select" name="agama" id="agama">
                                    {!! KustomHelper::getItem('agama',$data->agama) !!}
                                </select>
                            </div>                                                    
                        </div>                       
                    </div>
                    <div class="row">
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="jenis_kelamin">Jenis kelamin</label>
                                <select class="custom-select" name="jenis_kelamin" id="jenis_kelamin">
                                    {!! KustomHelper::getItem('jenis-kelamin',$data->jenis_kelamin) !!}
                                </select>                              
                            </div>                                                    
                        </div>
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="gol_darah">Gol. darah</label>
                                <select class="custom-select" name="gol_darah" id="gol_darah">
                                    {!! KustomHelper::getItem('golongan-darah',$data->gol_darah) !!}
                                </select>
                                
                            </div>                                                    
                        </div>                       
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="hp">No. Handphone</label>
                                <input type="text" class="form-control" placeholder="exp: 0812xxx" name="hp" id="hp" value="{{$data->hp}}">
                            </div>                                                    
                        </div>                       
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="telp">No. Telp</label>
                                <input type="text" class="form-control"  name="telp" id="telp"  placeholder="022-70xxxxx" value="{{$data->telp}}">
                            </div>                                                    
                        </div>                       
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="email">email</label>
                                <input type="email" class="form-control"  name="email" id="email"  placeholder="contoh: u.wirahadi10@gmail.com" value="{{$data->email}}">
                            </div>                                                    
                        </div>                       
                    </div>
                    <div class="row">
                        {{-- <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="warganegara">Kewarganegaraan</label>
                                <input type="text" class="form-control" placeholder="contoh: indonesia" name="warganegara" id="warganegara" value="indonesia">                                  
                            </div>                                                    
                        </div>                        --}}
                        <div class="col-md-10">                          
                            <div class="form-group">
                                <label class="col-form-label" for="alamat">Alamat/Jalan</label>
                                <input type="text" class="form-control" placeholder="contoh : Jl. Melong asih Gg Nusa indah 7 no 35 (RT/RW/Kel/Kec/Kota/Prov) input terpisah" name="alamat" id="alamat"  value="{{$data->alamat}}">
                            </div>                                                    
                        </div>  
                        <div class="col-md-1">                          
                            <div class="form-group">
                                <label class="col-form-label" for="rt">RT</label>
                                <input type="text" class="form-control" name="rt" id="rt" value="{{$data->rt}}">
                            </div>
                        </div>                       
                        <div class="col-md-1">                          
                            <div class="form-group">
                                <label class="col-form-label" for="rw">RW</label>
                                <input type="text" class="form-control" name="rw" id="rw" value="{{$data->rw}}">
                            </div>
                        </div>     
                    </div>
                    <div class="row">                                             
                        <div class="col-md-9">                          
                            <div class="form-group">
                                <label class="col-form-label" for="cari_wilayah">Pencarian wilayah</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="ketik nama kelurahan untuk mencari dan mengisi wilayah otomatis" id="cari_wilayah" name="cari_wilayah">
                                  </div>
                            </div>         
                        </div>                                                                     
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="kelurahan">Kelurahan</label>
                                <input type="text" class="form-control" name="kelurahan" id="kelurahan" value="{{$data->kelurahan}}">
                            </div>                                                    
                        </div>
                    </div>
                    <div class="row">                                                                                         
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="kecamatan">Kecamatan</label>
                                <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="{{$data->kecamatan}}">
                            </div>                                                    
                        </div>                       
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="kab_kota">Kota</label>
                                <input type="text" class="form-control"  name="kab_kota" id="kab_kota" value="{{$data->kab_kota}}">
                            </div>                                                    
                        </div>                       
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="provinsi">Provinsi</label>
                                <input type="text" class="form-control"  name="provinsi" id="provinsi" value="{{$data->provinsi}}">
                            </div>                                                    
                        </div>                       
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="pos">POS</label>
                                <input type="text" class="form-control"  name="pos" id="pos" value="{{$data->pos}}">
                            </div>                                                    
                        </div>                       
                    </div>

                    <div class="row">                                          
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="status_marital">Status pernikahan</label>
                                <select class="custom-select" name="status_marital" id="status_marital">
                                    {!! KustomHelper::getItem('marital-status',$data->status_marital) !!}
                                </select>
                            </div>                                                    
                        </div>                       
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="pendidikan_terakhir">Pendidikan terakhir</label>
                                <select class="custom-select" name="pendidikan_terakhir" id="pendidikan_terakhir">
                                    {!! KustomHelper::getItem('pendidikan-terakhir',$data->pendidikan_terakhir) !!}
                                </select>
                            </div>                                                    
                        </div>
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="suku">Suku/ras</label>
                                <select class="custom-select" name="suku" id="suku">
                                    {!! KustomHelper::getItem('suku',$data->suku) !!}
                                </select>
                            </div>                                                    
                        </div>
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="pekerjaan">Pekerjaan</label>
                                <select class="custom-select" name="pekerjaan" id="pekerjaan">
                                    {!! KustomHelper::getItem('pekerjaan',$data->pekerjaan) !!}
                                </select>
                            </div>                                                    
                        </div>                                                                                  
                    </div>
                    <div class="row">                                                                                    
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="nama_ayah">Nama ayah</label>
                                <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" value="{{$data->nama_ayah}}">
                            </div>                                                    
                        </div>                       
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="nama_ibu">Nama ibu</label>
                                <input type="text" class="form-control"  name="nama_ibu" id="nama_ibu" value="{{$data->nama_ibu}}">
                            </div>                                                    
                        </div> 
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="penanggung_jawab">Penanggung jawab</label>
                                <input type="text" class="form-control" name="penanggung_jawab" id="penanggung_jawab" value="{{$data->penanggung_jawab}}">
                            </div>                                                    
                        </div>                       
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="hubungan_dengan_penanggung_jawab">Hubungan</label>
                                <input type="text" class="form-control"  name="hubungan_dengan_penanggung_jawab" id="hubungan_dengan_penanggung_jawab" value="{{$data->hubungan_dengan_penanggung_jawab}}">
                            </div>                                                    
                        </div>                       
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="no_contact_darurat">Contact/hp</label>
                                <input type="text" class="form-control"  name="no_contact_darurat" id="no_contact_darurat" value="{{$data->no_contact_darurat}}">
                            </div>                                                    
                        </div>                       
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="status_pasien">Status</label>
                                <select class="custom-select" name="status_pasien" id="status_pasien">
                                    {!! KustomHelper::getItem('status-aktif',$data->status_pasien) !!}
                                </select>
                            </div>                                                    
                        </div>                       
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="submit">Update</button>
                        <button type="button" class="btn btn-warning" name="kembali"
                            onclick="window.location.href='/pasien'">Kembali</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
