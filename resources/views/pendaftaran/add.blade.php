@extends('layouts.main')
@section('content')
<div class="col-lg-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{$aksi??''}}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('poli.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label class="col-form-label" for="tanggal">Hari, tanggal</label>
                        <input type="text" class="form-control" id="tanggal" name="tanggal"  value="{{ Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y')}}" readonly>
                    </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-form-label" for="poli">Poli</label>
                            <select class="custom-select form-control" name="poli" id="poli">                          
                              {!!KustomHelper::getPoli()!!}
                            </select>
                        </div> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="inputSuccess">Data pasien</label>
                    <div class="input-group">
                        <input type="search" class="form-control" placeholder="cari data pasien" name="poli" id="poli">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-search"></i> Cari
                            </button>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- DIRECT CHAT SUCCESS -->
                        <div class="card card-success card-outline direct-chat direct-chat-success shadow-sm">
                          <div class="card-header">
                            <h3 class="card-title">Detail pencarian data Pasien</h3>        
                            <div class="card-tools">
                              <span class="badge bg-success">0</span>
                              <button type="button" class="btn btn-xs" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                              </button>
                              <button type="button" class="btn btn-xs" data-card-widget="remove">
                                <i class="fa fa-times"></i>
                              </button>
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body m-2" style="display: block;">
                            <div class="table-responsive">
                                <table id="data-pasien" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No. RM</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis Kel</th>
                                        <th>Alamat</th>
                                        <th>No. HP</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>                                    
                                  </table>                               
                            </div>

                                                   
                            
                          
                          </div>
                          <!-- /.card-body -->
                       
                          <!-- /.card-footer-->
                        </div>
                        <!--/.direct-chat -->
                      </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="inputSuccess">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                    <button type="button" class="btn btn-warning" name="kembali"
                        onclick="window.location.href='/pendaftaran'">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
