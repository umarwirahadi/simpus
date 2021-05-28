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
            {{-- @if ($pemeriksaan) --}}


            <div class="tab-content" id="custom-tabs-four-tabContent">
              <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                <div class="card-bodys">
                  <form action="" id="frmpemeriksaan" method="POST">
                    @csrf
                    <input type="hidden" name="idpemeriksaan" value="{{$pemeriksaan->id??''}}">
                    <input type="hidden" value="{{$dataItem->idpasien??''}}" name="idpasien" id="idpasien">
                    <input type="hidden" value="{{$dataItem->noantrian2??''}}" name=" noantrian2" id="noantrian2">
                    <input type="hidden" value="{{$dataItem->id??''}}" name="id_pendaftaran" id="id_pendaftaran">
                    <input type="hidden" value="{{$dataItem->no_rm??''}}" name="no_rm" id="no_rm">
                    <input type="hidden" value="{{$dataItem->no_rm_lama??''}}" name="no_rm_lama" id="no_rm_lama">
                    <input type="hidden" value="{{Cookie::get('id_dokter')}}" name="id_dokter" id="id_dokter">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-form-label" for="sistol">sistole / diastole</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" id="sistole" name="sistole" placeholder="sistole"  value="{{$pemeriksaan->sistole??''}}" />
                                    <input type="text" class="form-control form-control-sm" id="diastole" name="diastole" placeholder="diastole" value="{{$pemeriksaan->diastole??''}}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="col-form-label" for="tekanan_nadi">Tekanan nadi</label>
                                <input type="text" class="form-control form-control-sm" placeholder="tekanan nadi" name="tekanan_nadi" id="tekanan_nadi" value="{{$pemeriksaan->tekanan_nadi??''}}" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-form-label" for="respirasi">Respirasi</label>
                                <input type="text" class="form-control form-control-sm" placeholder="respirasi" name="respirasi" id="respirasi" value="{{$pemeriksaan->respirasi??''}}" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="col-form-label" for="suhu">Suhu</label>
                                <input type="text" class="form-control form-control-sm" placeholder="respirasi" name="suhu" id="suhu" value="{{$pemeriksaan->suhu??''}}" />
                            </div>
                        </div>
                        <div class="col-md-1">
                          <div class="form-group">
                              <label class="col-form-label" for="berat_badan">BB</label>
                              <div class="input-group">
                                  <input type="text" class="form-control form-control-sm" id="berat_badan" name="berat_badan" placeholder="kg" value="{{$pemeriksaan->berat_badan??''}}" />
                                </div>
                          </div>
                      </div>
                      <div class="col-md-1">
                        <div class="form-group">
                            <label class="col-form-label" for="tinggi_badan">TB</label>
                            <input type="text" class="form-control form-control-sm" placeholder="cm" name="tinggi_badan" id="tinggi_badan" value="{{$pemeriksaan->tinggi_badan??''}}" />
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="keluhan_utama">Keluhan pasien</label>
                                <div class="input-group">
                                  <textarea  class="form-control form-control-sm" name="keluhan_utama" id="keluhan_utama" cols="30" rows="2" placeholder="silahkan isi keluhan utama">{{$dataItem->keluhan??$pemeriksaan->keluhan_utama}}</textarea>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="diagnosa">diagnosa</label>
                                <div class="input-group">
                                  <textarea  class="form-control form-control-sm" name="diagnosa" id="diagnosa" cols="30" rows="2" placeholder="silahkan masukan diganosa pasien">{{$pemeriksaan->diagnosa??''}}</textarea>
                                  </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="resep_obat">Resep dokter</label>
                                <div class="input-group">
                                  <textarea  class="form-control form-control-sm" name="resep_obat" id="resep_obat" cols="30" rows="2" placeholder="input resep dokter">{{$pemeriksaan->resep_obat??''}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="pcare_kd_status_pulang">Status pulang</label>
                                <div class="input-group">
                                  <select class="form-control form-control-sm" name="pcare_kd_status_pulang" id="pcare_kd_status_pulang">
                                    {!! KustomHelper::getItem('status-pulang') !!}
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="pcare_kdsadar">Kesadaran</label>
                                <div class="input-group">
                                    <select class="form-control form-control-sm" name="pcare_kdsadar" id="pcare_kdsadar">
                                    {!! KustomHelper::getItem('kesadaran') !!}
                                  </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-app bg-success"><i class="fas fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-app bg-danger" onclick="window.location.href='{{'/pemeriksaan'}}'"><i class="fas fa-arrow-left"></i> Kembali</button>
                  </form>
            </div>
              </div>
              <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                <div class="table responsive">
                  <table id="data-riwayat" class="table table-hover table-bordered">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Waktu</th>
                      <th>Usia</th>
                      <th>Diagnosa</th>
                    </tr>
                    </thead>
                    <tbody>
                      @php
                        $tgl=\Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");
                          $no=1
                      @endphp
                      @foreach ($dataRiwayatPeriksa as $riwayat)

                          <tr>
                            <td>{{$no++}}</td>
                            <td>{{\Carbon\Carbon::parse($riwayat->tanggal)->diffForHumans()}}</td>
                            <td>{{$riwayat->usia_tahun.' tahun'}}</td>
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
          <div class="widget-user-header bg-dark">
            <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{ asset('uploads/images/patiens.png') }}"
                    alt="simpus Dinas kesehatan kota Cimahi">
            </div>
            <h3 class="widget-user-username text-yellow">{{$dataItem->nama_lengkap??''}}</h3>
            <h5 class="widget-user-desc">No. KTP. {{$dataItem->nik??''}}</h5>
            <h5 class="widget-user-desc">No. RM. {{$dataItem->no_rm??''}}</h5>
            <h5 class="widget-user-desc">No. BPJS. {{$dataItem->no_kartu_bpjs??'-'}}</h5>
          </div>
          <div class="card-footer p-0">
            <ul class="nav flex-column">
              <li class="nav-item">
                <p class="text m-2 text-primary">
                  Usia <span class="float-right">{{$dataItem->usia_tahun??''}} tahun {{$dataItem->usia_bulan??''}} bulan {{$dataItem->usia_hari??''}} Hari</span>
                </p>
              </li>
              <li class="nav-item">
                <p class="text m-2 text-primary">
                  Jenis Kelamin <span class="float-right">{{$dataItem->jenis_kelamin??''=='L'?'Laki-laki':'Perempuan'}}</span>
                </p>
              </li>
              <li class="nav-item">
                <p class="text text-primary m-2">
                  Gol. darah <span class="float-right">{{$dataItem->gol_darah??''}}</span>
                </p>
              </li>
              <li class="nav-item">
                <p class="text text-primary m-2">
                  No. HP <span class="float-right">{{$dataItem->hp??''}}</span>
                </p>
              </li>
              <li class="nav-item">
                <p class="text text-primary m-2">
                  {{$dataItem->alamat??''.' RT. '.$dataItem->rt??''.' RW. '.$dataItem->rw??''}}</p>
                <p class="text text-primary m-2">
                   {{' Kel. '.$dataItem->kelurahan??''}}</p>
              </li>
            </ul>
          </div>
          {{-- {{$dataItem}} --}}
        </div>
        <!-- /.widget-user -->
      </div>
@endsection
