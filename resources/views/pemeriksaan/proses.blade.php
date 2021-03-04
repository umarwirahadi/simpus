@extends('layouts.main')
@section('content')
    <div class="col-12 col-sm-8">
        <div class="card card-primary card-outline card-outline-tabs card-info shadow">
          <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Pemeriksaan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Riwayat</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Pendataan</a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
              <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                <div class="card-bodys">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="sistol">Sistol & diastol</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" id="sistol" name="sistol" placeholder="sistol" />
                                    <input type="text" class="form-control form-control-sm" id="diastol" name="diastol" placeholder="diastol" />
                                  </div>
                            </div>         
                        </div>                     
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="tekanan_nadi">Tekanan nadi</label>
                                <input type="text" class="form-control form-control-sm" placeholder="tekanan nadi" name="tekanan_nadi" id="tekanan_nadi" />
                            </div>                                                    
                        </div>                       
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="respirasi">Respirasi</label>
                                <input type="text" class="form-control form-control-sm" placeholder="respirasi" name="respirasi" id="respirasi" />
                            </div>                                                    
                        </div>                       
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="suhu">Suhu</label>
                                <input type="text" class="form-control form-control-sm" placeholder="respirasi" name="suhu" id="suhu" />
                            </div>                                                    
                        </div>                       
                        <div class="col-md-1">                          
                          <div class="form-group">
                              <label class="col-form-label" for="berat_badan">BB</label>
                              <div class="input-group">
                                  <input type="text" class="form-control form-control-sm" id="berat_badan" name="berat_badan" placeholder="kg" />
                                </div>
                          </div>         
                      </div> 
                      <div class="col-md-1">                          
                        <div class="form-group">
                            <label class="col-form-label" for="tinggi_badan">TB</label>
                            <input type="text" class="form-control form-control-sm" placeholder="cm" name="tinggi_badan" id="tinggi_badan" />
                        </div>                                                    
                    </div> 
                    </div>               
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="keluhan_utama">Keluhan utama</label>
                                <div class="input-group">
                                  <textarea  class="form-control form-control-sm" name="keluhan_utama" id="keluhan_utama" cols="30" rows="2" placeholder="silahkan isi keluhan utama"></textarea>
                                  </div>
                            </div>         
                        </div>
                        <div class="col-md-6">                          
                          <div class="form-group">
                              <label class="col-form-label" for="pemeriksaan_fisik">Pemeriksaan fisik</label>
                              <div class="input-group">
                                <textarea  class="form-control form-control-sm" name="pemeriksaan_fisik" id="pemeriksaan_fisik" cols="30" rows="2" placeholder="silahkan isi pemeriksaan fisik"></textarea>
                                </div>
                          </div>         
                      </div>
                    </div>                  
                    <div class="row">
                        <div class="col-md-6">                          
                            <div class="form-group">
                                <label class="col-form-label" for="anamnesa">Anamnesa</label>
                                <div class="input-group">
                                  <textarea  class="form-control form-control-sm" name="anamnesa" id="anamnesa" cols="30" rows="2" placeholder="silahkan masukan anamnesa pasien"></textarea>
                                  </div>
                            </div>         
                        </div>                                             
                        <div class="col-md-6">                          
                            <div class="form-group">
                                <label class="col-form-label" for="terapi">Terapi</label>
                                <div class="input-group">
                                  <textarea  class="form-control form-control-sm" name="terapi" id="terapi" cols="30" rows="2"></textarea>
                                  </div>
                            </div>         
                        </div>                                             
                    </div>
                    <div class="row">
                        <div class="col-md-4">                          
                            <div class="form-group">
                                <label class="col-form-label" for="diagnosa">diagnosa</label>
                                <div class="input-group">
                                  <textarea  class="form-control form-control-sm" name="diagnosa" id="diagnosa" cols="30" rows="2" placeholder="silahkan masukan diganosa pasien"></textarea>
                                  </div>
                            </div>         
                        </div>                                             
                        <div class="col-md-8">                          
                            <div class="form-group">
                                <label class="col-form-label" for="terapi">keterangan</label>
                                <div class="input-group">
                                  <textarea  class="form-control form-control-sm" name="terapi" id="terapi" cols="30" rows="2"></textarea>
                                  </div>
                            </div>         
                        </div>                                             
                    </div>          
                    <div class="row">
                      <button class="btn btn-sm btn-primary">simpan</button>                                                                                   
                    </div>             
                
            </div>
              </div>
              <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                <div class="table responsive">
                  <table id="data-riwayat" class="table table-hover table-bordered">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Usia</th>
                      <th>Diagnosa</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>        
                  </table> 
                </div>                 
              </div>
              <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                <div class="table responsive">
                  <table id="data-pendataan" class="table table-hover table-bordered">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Pendataan</th>
                      <th>Status</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>                      
                    </tbody>        
                  </table> 
                </div>             
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
    <div class="col-md-4">
        <!-- Widget: user widget style 2 -->
        <div class="card card-widget widget-user-2 shadow-sm">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-info">
            <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{ asset('uploads/images/User-Coat-Green-icon.png') }}"
                    alt="Puskesmas Cimahi tengah">
            </div>
            <!-- /.widget-user-image -->
            <h3 class="widget-user-username">Umar Wirahadi Kusumah</h3>
            <h5 class="widget-user-desc">NIK. 3208102311880001</h5>
            <h5 class="widget-user-desc">No RM.  01000001</h5>
          </div>
          <div class="card-footer p-0">
            <ul class="nav flex-column">             
              <li class="nav-item">
                <p class="text m-2 text-primary">
                  Usia <span class="float-right">32 tahun 4 bulan 28 Hari</span>
                </p>
              </li>
              <li class="nav-item">
                <p class="text m-2 text-primary">
                  Jenis Kelamin <span class="float-right">laki-laki</span>
                </p>
              </li>
              <li class="nav-item">
                <p class="text text-primary m-2">
                  Gol. darah <span class="float-right">AB</span>
                </p>
              </li>
              <li class="nav-item">
                <p class="text text-primary m-2">
                  No. HP <span class="float-right">087822766000</span>
                </p>
              </li>
              <li class="nav-item">
                <p class="text text-primary m-2">
                  Jl. Cijerah II Gg. Nusa Indah 7 no. 35 Melong Blok 14. RT.1/20 Kel.Melong Cimahi Selatan Kota Cimahi Jawa Barat 40534</p>
              </li>
            </ul>
          </div>
        </div>
        <!-- /.widget-user -->
      </div>
    {{-- <div class="col-md-4">
        <div class="card card-widget widget-user shadow">
            <div class="widget-user-header bg-info">
                <h3 class="widget-user-username">Identitas Pasien</h3>
            </div>
            <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{ asset('uploads/images/User-Coat-Green-icon.png') }}"
                    alt="Puskesmas Cimahi tengah">
            </div>
            <div class="card-footer">
                <div class="row">
                <table>
                    <tr>
                        <td>NIK:</td>
                    </tr>
                    <tr>
                        <td>3208102311880001</td>
                    </tr>
                </table>
                </div>
                <div class="row" id="actions">
                    <div class="col-md-12">
                              
                            
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div> --}}
@endsection
