<div class="modal fade" id="addnewpasien">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Input pasien baru</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST" id="form-pasien-baru">
                @csrf
                <div class="row">
                    <div class="col-md-3">                          
                        <div class="form-group">
                            <label class="col-form-label" for="nik">N.I.K</label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control form-control-sm" placeholder="No. KTP" id="nik" name="nik">
                                <span class="input-group-append">
                                  <button type="button" class="btn btn-info btn-flat btn-sm"><i class="fa fa-search"></i></button>
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
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="status_hubungan">Status hubungan</label>
                            <select class="custom-select" name="status_hubungan" id="status_hubungan">
                                {!! KustomHelper::getItem('status-hubungan') !!}
                            </select>
                          
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
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="agama">Agama</label>
                            <select class="custom-select" name="agama" id="agama">
                                {!! KustomHelper::getItem('agama') !!}
                            </select>
                        </div>                                                    
                    </div>                       
                </div>
                <div class="row">
                    <div class="col-md-2">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="jenis_kelamin">Jenis kelamin</label>
                            <select class="custom-select" name="jenis_kelamin" id="jenis_kelamin">
                                {!! KustomHelper::getItem('jenis-kelamin') !!}
                            </select>                              
                        </div>                                                    
                    </div>
                    <div class="col-md-2">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="gol_darah">Gol. darah</label>
                            <select class="custom-select" name="gol_darah" id="gol_darah">
                                {!! KustomHelper::getItem('golongan-darah') !!}
                            </select>
                            
                        </div>                                                    
                    </div>                       
                    <div class="col-md-3">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="hp">No. Handphone</label>
                            <input type="text" class="form-control form-control-sm" placeholder="exp: 0812xxx" name="hp" id="hp" >
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="telp">No. Telp</label>
                            <input type="text" class="form-control form-control-sm"  name="telp" id="telp"  placeholder="022-70xxxxx">
                        </div>                                                    
                    </div>                       
                    <div class="col-md-3">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="email">email</label>
                            <input type="email" class="form-control form-control-sm"  name="email" id="email"  placeholder="contoh: u.wirahadi10@gmail.com">                                
                        </div>                                                    
                    </div>                       
                </div>
                <div class="row">
                    {{-- <div class="col-md-3">                          
                        <div class="form-group">
                            <label class="col-form-label" for="warganegara">Kewarganegaraan</label>
                            <input type="text" class="form-control form-control-sm" placeholder="contoh: indonesia" name="warganegara" id="warganegara" value="indonesia">                                  
                        </div>                                                    
                    </div>                        --}}
                    <div class="col-md-5">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="alamat">Alamat/Jalan</label>
                            <input type="text" class="form-control form-control-sm" placeholder="contoh : Jl. Melong asih Gg Nusa indah 7 no 35 input terpisah" name="alamat" id="alamat" >
                        </div>                                                    
                    </div>  
                    <div class="col-md-1">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="rt">RT</label>
                            <input type="text" class="form-control form-control-sm" name="rt" id="rt" >                                
                        </div>
                    </div>                       
                    <div class="col-md-1">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="rw">RW</label>
                            <input type="text" class="form-control form-control-sm" name="rw" id="rw" >                                
                        </div>
                    </div>     
                </div>
                <div class="row">
                                         
                    <div class="col-md-4">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="cari_wilayah">Pencarian wilayah</label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" placeholder="ketik nama kelurahan untuk mencari dan mengisi wilayah otomatis" id="cari_wilayah" name="cari_wilayah">
                              </div>
                        </div>         
                    </div>                                                                     
                    <div class="col-md-2">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="kelurahan">Kelurahan</label>
                            <input type="text" class="form-control form-control-sm" name="kelurahan" id="kelurahan">
                        </div>                                                    
                    </div>
                </div>
                <div class="row">                                                                                         
                    <div class="col-md-2">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="kecamatan">Kecamatan</label>
                            <input type="text" class="form-control form-control-sm" name="kecamatan" id="kecamatan">
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="kab_kota">Kota</label>
                            <input type="text" class="form-control form-control-sm"  name="kab_kota" id="kab_kota" >
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="provinsi">Provinsi</label>
                            <input type="text" class="form-control form-control-sm"  name="provinsi" id="provinsi" >
                        </div>                                                    
                    </div>                       
                    <div class="col-md-1">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="pos">POS</label>
                            <input type="text" class="form-control form-control-sm"  name="pos" id="pos" >
                        </div>                                                    
                    </div>    
                    <div class="col-md-2">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="status_marital">Status pernikahan</label>
                            <select class="custom-select" name="status_marital" id="status_marital">
                                {!! KustomHelper::getItem('marital-status') !!}
                            </select>
                        </div>                                                    
                    </div>                    
                    <div class="col-md-2">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="pendidikan_terakhir">Pendidikan terakhir</label>
                            <select class="custom-select" name="pendidikan_terakhir" id="pendidikan_terakhir">
                                {!! KustomHelper::getItem('pendidikan-terakhir') !!}
                            </select>
                        </div>                                                    
                    </div>
                </div>

                <div class="row">                                          
                                        
                 
                    <div class="col-md-3">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="suku">Suku/ras</label>
                            <select class="custom-select" name="suku" id="suku">
                                {!! KustomHelper::getItem('suku') !!}
                            </select>
                        </div>                                                    
                    </div>
                    <div class="col-md-3">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="pekerjaan">Pekerjaan</label>
                            <select class="custom-select" name="pekerjaan" id="pekerjaan">
                                {!! KustomHelper::getItem('pekerjaan') !!}
                            </select>
                        </div>                                                    
                    </div>                                                                                  
                </div>
                <div class="row">                                                                                    
                    <div class="col-md-2">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="nama_ayah">Nama ayah</label>
                            <input type="text" class="form-control form-control-sm" name="nama_ayah" id="nama_ayah">
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="nama_ibu">Nama ibu</label>
                            <input type="text" class="form-control form-control-sm"  name="nama_ibu" id="nama_ibu" >
                        </div>                                                    
                    </div> 
                    <div class="col-md-2">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="penanggung_jawab">Penanggung jawab</label>
                            <input type="text" class="form-control form-control-sm" name="penanggung_jawab" id="penanggung_jawab">
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="hubungan_dengan_penanggung_jawab">Hubungan</label>
                            <input type="text" class="form-control form-control-sm"  name="hubungan_dengan_penanggung_jawab" id="hubungan_dengan_penanggung_jawab" >
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="no_contact_darurat">Contact/hp</label>
                            <input type="text" class="form-control form-control-sm"  name="no_contact_darurat" id="no_contact_darurat" >
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="status_pasien">Status</label>
                            <select class="custom-select" name="status_pasien" id="status_pasien">
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
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>