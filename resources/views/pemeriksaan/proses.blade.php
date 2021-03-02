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
                <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Messages</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Settings</a>
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
                 Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
              </div>
              <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                 Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
              </div>
              <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                 Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
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
