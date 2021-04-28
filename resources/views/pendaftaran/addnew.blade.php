<div class="modal fade" id="addnewpasien">
    <form action="" method="POST" id="form-pasien-baru-modal">
        @csrf
    
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header bg-green">
          <h4 class="modal-title">Input pasien baru</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 p-1">
                        <div class="form-group">
                            <label class="col-form-label" for="nik">N.I.K</label>
                            <input type="text" class="form-control form-control-sm" placeholder="No. KTP" id="nik" name="nik" value="" />
                            <input type="hidden" name="id_pasien" id="id_pasien" value="" >
                        </div>         
                    </div>                     
                    <div class="col-md-2 p-1">                          
                        <div class="form-group">
                            <label class="col-form-label" for="no_kk">No. KK</label>
                            <input type="text" class="form-control form-control-sm" placeholder="No. KK" name="no_kk" id="no_kk" value="" />
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2 p-1">                          
                        <div class="form-group">
                            <label class="col-form-label" for="status_hubungan">hubungan</label>
                            <select class="form-control form-control-sm" name="status_hubungan" id="status_hubungan">
                                {!! KustomHelper::getItem('status-hubungan') !!}
                            </select>                          
                        </div>                                                    
                    </div>                       
                    <div class="col-md-4 p-1">                          
                        <div class="form-group">
                            <label class="col-form-label" for="nama_lengkap">Nama lengkap</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Nama lengkap" name="nama_lengkap" id="nama_lengkap" value="" />
                        </div>                                                    
                    </div>                       
                </div>
                <div class="row">
                    <div class="col-md-3 p-1">                          
                        <div class="form-group">
                            <label class="col-form-label" for="nik">No. BPJS</label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" placeholder="No. BPJS" id="no_bpjs" name="no_bpjs">
                                <span class="input-group-append">
                                  <button type="button" class="btn btn-sm btn-info btn-flat" id="find-bpjs2" ><i class="fa fa-search"></i></button>
                                </span>
                              </div>
                        </div> 
                        {{-- <div class="form-group">
                            <label class="col-form-label" for="no_bpjs">No. BPJS</label>
                            <input type="text" class="form-control form-control-sm" placeholder="No BPJS" name="no_bpjs" id="no_bpjs" value="" />
                        </div>                                                     --}}
                    </div>                                                
                    <div class="col-md-2 p-1">                          
                        <div class="form-group">
                            <label class="col-form-label" for="no_rm_lama">No. RM lama</label>
                            <input type="text" class="form-control form-control-sm" placeholder="No RM lama" name="no_rm_lama" id="no_rm_lama" value="" />
                        </div>                                                    
                    </div>                                                
                    <div class="col-md-3 p-1">                          
                        <div class="form-group">
                            <label class="col-form-label" for="tempat_lahir">Tempat lahir</label>
                            <input type="text" class="form-control form-control-sm" placeholder="tempat lahir" name="tempat_lahir" id="tempat_lahir" value="" />
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2 p-1">                          
                        <div class="form-group">
                            <label class="col-form-label" for="tanggal_lahir">Tanggal lahir</label>
                            <input type="date" class="form-control form-control-sm"  name="tanggal_lahir" id="tanggal_lahir" value="" />
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2 p-1">                          
                        <div class="form-group">
                            <label class="col-form-label" for="agama">Agama</label>
                            <select class="form-control form-control-sm" name="agama" id="agama">
                                {!! KustomHelper::getItem('agama') !!}
                            </select>
                        </div>                                                    
                    </div>                       
                </div>
                <div class="row">
                    <div class="col-md-2 p-1">                          
                        <div class="form-group">
                            <label class="col-form-label" for="jenis_kelamin">Jenis kelamin</label>
                            <select class="form-control form-control-sm" name="jenis_kelamin" id="jenis_kelamin">
                                {!! KustomHelper::getItem('jenis-kelamin') !!}
                            </select>                              
                        </div>                                                    
                    </div>                 
                    <div class="col-md-2 p-1">                          
                        <div class="form-group">
                            <label class="col-form-label" for="gol_darah">Gol. darah</label>
                            <select class="form-control form-control-sm" name="gol_darah" id="gol_darah">
                                {!! KustomHelper::getItem('golongan-darah') !!}
                            </select>
                        </div>                                                    
                    </div>                       
                    <div class="col-md-3 p-1">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="hp">No. Handphone</label>
                            <input type="text" class="form-control form-control-sm" placeholder="exp: 0812xxx" name="hp" id="hp" value="" />
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2 p-1">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="telp">No. Telp</label>
                            <input type="text" class="form-control form-control-sm"  name="telp" id="telp"  placeholder="022-70xxxxx" value="" />
                        </div>                                                    
                    </div>                       
                    <div class="col-md-3 p-1">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="email">email</label>
                            <input type="email" class="form-control form-control-sm"  name="email" id="email"  placeholder="contoh: u.wirahadi10@gmail.com" value="" />                                
                        </div>                                                    
                    </div>                       
                </div>
                <div class="row">
                    <div class="col-md-5 p-1">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="cari_wilayah">Pencarian wilayah</label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" placeholder="ketik nama kelurahan " id="cari_wilayah" name="cari_wilayah" value="" />
                              </div>
                        </div>         
                    </div>
                    <div class="col-md-6 p-1">
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="alamat">Alamat/Jalan</label>                            
                            <input type="text" class="form-control form-control-sm" placeholder="contoh : Jl. Melong asih Gg Nusa indah 7 no 35 " name="alamat" id="alamat" value="" />
                        </div>                                                    
                    </div>  
                    <div class="col-md-1 p-1">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="rt">RT/RW</label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" name="rt" id="rt" placeholder="rt" value="" />
                                <input type="text" class="form-control form-control-sm" name="rw" id="rw" placeholder="rw" value="" />
                            </div>
                        </div>
                    </div>                                                                   
                </div>
                <div class="row">                                                                                                                                  
                    <div class="col-md-2 p-1">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="kelurahan">Kelurahan</label>
                            <input type="text" class="form-control form-control-sm" name="kelurahan" id="kelurahan" value="" />
                        </div>                                                    
                    </div>
                    <div class="col-md-2 p-1">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="kecamatan">Kecamatan</label>
                            <input type="text" class="form-control form-control-sm" name="kecamatan" id="kecamatan" value="" />
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2 p-1">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="kab_kota">Kota</label>
                            <input type="text" class="form-control form-control-sm"  name="kab_kota" id="kab_kota" value="" />
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2 p-1">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="provinsi">Provinsi</label>
                            <input type="text" class="form-control form-control-sm"  name="provinsi" id="provinsi" value="" />
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2 p-1">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="pos">POS</label>
                            <input type="text" class="form-control form-control-sm"  name="pos" id="pos" value="" />
                        </div>                                                    
                    </div>  
                    <div class="col-md-2 p-1">                          
                        <div class="form-group">
                            <label class="col-form-label" for="status_marital">Pernikahan</label>
                            <select class="form-control form-control-sm" name="status_marital" id="status_marital">
                                {!! KustomHelper::getItem('marital-status') !!}
                            </select>
                        </div>                                                    
                    </div> 
                </div>
                <div class="row">                                                                                                                                                   
                    <div class="col-md-3 p-1">                          
                        <div class="form-group">
                            <label class="col-form-label" for="pendidikan_terakhir">Pendidikan terakhir</label>
                            <select class="form-control form-control-sm" name="pendidikan_terakhir" id="pendidikan_terakhir">
                                {!! KustomHelper::getItem('pendidikan-terakhir') !!}
                            </select>
                        </div>                                                    
                    </div> 
                    <div class="col-md-3 p-1">                          
                        <div class="form-group">
                            <label class="col-form-label" for="suku">Suku/ras</label>
                            <select class="form-control form-control-sm" name="suku" id="suku">
                                {!! KustomHelper::getItem('suku') !!}
                            </select>
                        </div>                                                    
                    </div>
                    <div class="col-md-2 p-1">                          
                        <div class="form-group">
                            <label class="col-form-label" for="pekerjaan">Pekerjaan</label>
                            <select class="form-control form-control-sm" name="pekerjaan" id="pekerjaan">
                                {!! KustomHelper::getItem('pekerjaan') !!}
                            </select>
                        </div>                                                    
                    </div>
                    <div class="col-md-2 p-1">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="nama_ayah">Nama ayah</label>
                            <input type="text" class="form-control form-control-sm" name="nama_ayah" id="nama_ayah" value="" />
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2 p-1">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="nama_ibu">Nama ibu</label>
                            <input type="text" class="form-control form-control-sm"  name="nama_ibu" id="nama_ibu"  value="" />
                        </div>                                                    
                    </div> 
                </div>       
                <div class="row">                                                                                                   
                    <div class="col-md-2 p-1">
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="penanggung_jawab">Penanggung jawab</label>
                            <input type="text" class="form-control form-control-sm" name="penanggung_jawab" id="penanggung_jawab" value="" />
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2 p-1">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="hubungan_dengan_penanggung_jawab">Hubungan</label>
                            <input type="text" class="form-control form-control-sm" name="hubungan_dengan_penanggung_jawab" id="hubungan_dengan_penanggung_jawab" value="" />
                        </div>                                                    
                    </div>                       
                    <div class="col-md-2 p-1">                          
                        <div class="form-group input-group-sm">
                            <label class="col-form-label" for="no_contact_darurat">Contact/hp</label>
                            <input type="text" class="form-control form-control-sm"  name="no_contact_darurat" id="no_contact_darurat" value="" />
                        </div>                                                    
                    </div>                       
                    {{-- <div class="col-md-2 p-1">                          
                        <div class="form-group">
                            <label class="col-form-label" for="status_pasien">Status</label>
                            <select class="form-control form-control-sm" name="status_pasien" id="status_pasien">
                                {!! KustomHelper::getItem('status-aktif') !!}
                            </select>
                        </div>                                                    
                    </div>                        --}}
                </div>                            
        </div>
        <div class="modal-footer justify-content-right">            
          <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Close</button>
          <button type="reset" class="btn btn-sm btn-danger">Reset</button>
          <button type="submit" class="btn btn-sm btn-primary">Simpan pasien</button>
        </div>
      </div>
    </div>
</form>
  </div>