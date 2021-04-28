@extends('layouts.main')
@section('content')
    <div class="col-12 col-sm-8">
        <div class="card card-primary card-outline card-outline-tabs card-info shadow">
           <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">[ PEMERIKSAAN ]</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">[ RIWAYAT ]</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">[ PENDATAAN ]</a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
              <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                <div class="card-bodys">
                  <form action="" id="frmpemeriksaan" method="POST">
                    @csrf
                    <input type="hidden" name="idpemeriksaan" value="{{$pemeriksaan->id??''}}">
                    <input type="hidden" value="{{$dataItem->idpasien}}" name="idpasien" id="idpasien">
                    <input type="hidden" value="{{$dataItem->noantrian2}}" name="noantrian2" id="noantrian2">
                    <input type="hidden" value="{{$dataItem->id}}" name="id_pendaftaran" id="id_pendaftaran">
                    <input type="hidden" value="{{$dataItem->no_rm}}" name="no_rm" id="no_rm">
                    <input type="hidden" value="{{$dataItem->no_rm_lama}}" name="no_rm_lama" id="no_rm_lama">
                    <div class="row">
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="sistol">Sistol & diastol</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" id="sistol" name="sistol" placeholder="sistol"  value="{{$pemeriksaan->sistol??''}}" />
                                    <input type="text" class="form-control form-control-sm" id="diastol" name="diastol" placeholder="diastol" value="{{$pemeriksaan->sistol??''}}" />
                                </div>
                            </div>         
                        </div>                     
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="tekanan_nadi">Tekanan nadi</label>
                                <input type="text" class="form-control form-control-sm" placeholder="tekanan nadi" name="tekanan_nadi" id="tekanan_nadi" value="{{$pemeriksaan->sistol??''}}" />
                            </div>                                                    
                        </div>                       
                        <div class="col-md-3">                          
                            <div class="form-group">
                                <label class="col-form-label" for="respirasi">Respirasi</label>
                                <input type="text" class="form-control form-control-sm" placeholder="respirasi" name="respirasi" id="respirasi" value="{{$pemeriksaan->sistol??''}}" />
                            </div>                                                    
                        </div>                       
                        <div class="col-md-2">                          
                            <div class="form-group">
                                <label class="col-form-label" for="suhu">Suhu</label>
                                <input type="text" class="form-control form-control-sm" placeholder="respirasi" name="suhu" id="suhu" value="{{$pemeriksaan->sistol??''}}" />
                            </div>                                                    
                        </div>                       
                        <div class="col-md-1">                          
                          <div class="form-group">
                              <label class="col-form-label" for="berat_badan">BB</label>
                              <div class="input-group">
                                  <input type="text" class="form-control form-control-sm" id="berat_badan" name="berat_badan" placeholder="kg" value="{{$pemeriksaan->sistol??''}}" />
                                </div>
                          </div>         
                      </div> 
                      <div class="col-md-1">                          
                        <div class="form-group">
                            <label class="col-form-label" for="tinggi_badan">TB</label>
                            <input type="text" class="form-control form-control-sm" placeholder="cm" name="tinggi_badan" id="tinggi_badan" value="{{$pemeriksaan->sistol??''}}" />
                        </div>                                                    
                    </div> 
                    </div>               
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="keluhan_utama">Keluhan utama</label>
                                <div class="input-group">
                                  <textarea  class="form-control form-control-sm" name="keluhan_utama" id="keluhan_utama" cols="30" rows="2" placeholder="silahkan isi keluhan utama">{{$pemeriksaan->keluhan_utama??''}}</textarea>
                                  </div>
                            </div>         
                        </div>
                        <div class="col-md-6">                          
                          <div class="form-group">
                              <label class="col-form-label" for="pemeriksaan_fisik">Pemeriksaan fisik</label>
                              <div class="input-group">
                                <textarea  class="form-control form-control-sm" name="pemeriksaan_fisik" id="pemeriksaan_fisik" cols="30" rows="2" placeholder="silahkan isi pemeriksaan fisik">{{$pemeriksaan->pemeriksaan_fisik??''}}</textarea>
                                </div>
                          </div>         
                      </div>
                    </div>                  
                    <div class="row">
                        <div class="col-md-6">                          
                            <div class="form-group">
                                <label class="col-form-label" for="anamnesa">Anamnesa</label>
                                <div class="input-group">
                                  <textarea  class="form-control form-control-sm" name="anamnesa" id="anamnesa" cols="30" rows="2" placeholder="silahkan masukan anamnesa pasien">{{$pemeriksaan->anamnesa??''}}</textarea>
                                  </div>
                            </div>         
                        </div>                                             
                        <div class="col-md-6">                          
                            <div class="form-group">
                                <label class="col-form-label" for="terapi">Terapi</label>
                                <div class="input-group">
                                  <textarea  class="form-control form-control-sm" name="terapi" id="terapi" cols="30" rows="2">{{$pemeriksaan->terapi??''}}</textarea>
                                </div>
                            </div>         
                        </div>                                             
                    </div>
                    <div class="row">
                        <div class="col-md-4">                          
                            <div class="form-group">
                                <label class="col-form-label" for="diagnosa">diagnosa</label>
                                <div class="input-group">
                                  <textarea  class="form-control form-control-sm" name="diagnosa" id="diagnosa" cols="30" rows="2" placeholder="silahkan masukan diganosa pasien">{{$pemeriksaan->diagnosa??''}}</textarea>
                                  </div>
                            </div>         
                        </div>                                             
                        <div class="col-md-8">                          
                            <div class="form-group">
                                <label class="col-form-label" for="keterangan">Resep dokter</label>
                                <div class="input-group">
                                  <textarea  class="form-control form-control-sm" name="keterangan" id="keterangan" cols="30" rows="2" placeholder="input resep dokter">{{$pemeriksaan->keterangan??''}}</textarea>
                                </div>
                            </div>         
                        </div>                                             
                    </div>          
                    <button type="submit" class="btn btn-app bg-success"><i class="fas fa-save"></i> Simpan</button>                    
                    <button type="reset" class="btn btn-app bg-orange"><i class="fas fa-undo"></i> Reset</button>                    
                    <button type="button" class="btn btn-app bg-danger" onclick="window.location.href='{{'/pemeriksaan'}}'"><i class="fas fa-arrow-left"></i> Kembali</button>                    
                  </form>
            </div>
              </div>
              <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                {{-- {{$dataRiwayatPeriksa}} --}}
                <div class="table responsive">
                  <table id="data-riwayat" class="table table-hover table-bordered">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>usia</th>
                      <th>Diagnosa</th>
                    </tr>
                    </thead>
                    <tbody>
                      @php
                          $no=1                          
                      @endphp
                      @foreach ($dataRiwayatPeriksa as $riwayat)
                          <tr>
                            <td>{{$no++}}</td>
                            <td>{{$riwayat->tanggal}}</td>
                            <td>{{$riwayat->usia_tahun.', '.$riwayat->usia_bulan.', '.$riwayat->usia_hari}}</td>
                            <td>{{$riwayat->diagnosa}}</td>
                          </tr>
                      @endforeach
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
          <div class="widget-user-header bg-dark">
            <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{ asset('uploads/images/fever.png') }}"
                    alt="Puskesmas Cimahi tengah">
            </div>
            <!-- /.widget-user-image -->
            <h3 class="widget-user-username text-yellow">{{$dataItem->nama_lengkap}}</h3>
            <h5 class="widget-user-desc">No. KTP. {{$dataItem->nik}}</h5>
            <h5 class="widget-user-desc">No. RM. {{$dataItem->no_rm}}</h5>
          </div>
          <div class="card-footer p-0">
            <ul class="nav flex-column">             
              <li class="nav-item">
                <p class="text m-2 text-primary">
                  Usia <span class="float-right">{{$dataItem->usia_tahun}} tahun {{$dataItem->usia_bulan}} bulan {{$dataItem->usia_hari}} Hari</span>
                </p>
              </li>
              <li class="nav-item">
                <p class="text m-2 text-primary">
                  Jenis Kelamin <span class="float-right">{{$dataItem->jenis_kelamin=='L'?'Laki-laki':'Perempuan'}}</span>
                </p>
              </li>
              <li class="nav-item">
                <p class="text text-primary m-2">
                  Gol. darah <span class="float-right">{{$dataItem->gol_darah}}</span>
                </p>
              </li>
              <li class="nav-item">
                <p class="text text-primary m-2">
                  No. HP <span class="float-right">{{$dataItem->hp}}</span>
                </p>
              </li>
              <li class="nav-item">
                <p class="text text-primary m-2">
                  {{$dataItem->alamat.' RT. '.$dataItem->rt.' RW. '.$dataItem->rw}}</p>
                <p class="text text-primary m-2">
                  {{' Kel. '.$dataItem->kelurahan}}</p>
              </li>
            </ul>
          </div>
          {{-- {{$dataItem}} --}}
        </div>
        <!-- /.widget-user -->
      </div>   
@endsection
