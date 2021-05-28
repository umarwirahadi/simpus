@extends('layouts.main')
@section('content')


<div class="col-lg-12">
  <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Pendaftaran</span>
          <span class="info-box-number">101</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Pasien diperiksa</span>
          <span class="info-box-number">7</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>

  <div class="card card-outline card-danger" >
    <div class="card-header bg-gradient-primary">
      <div class="row">
        <div class="col-md-6">
          <h3 class="card-title">
              {{-- <a href="{{route('pemeriksaan.proses')}}" class="btn btn-app bg-info"><i class="fas fa-phone-square-alt"></i> Panggil</a> --}}
              <a href="" class="btn btn-app bg-red"><i class="fas fa-microphone"></i> Antrian</a>
              <a href="#" class="btn btn-app bg-green"><i class="fas fa-file-excel"></i> Export</a>
          </h3>
        </div>        
        <div class="col-sm-12 col-md-6">
          
        </div>
      </div>       
    </div>
    <div class="card-body">
      <div class="table table-responsive">
        <table id="pendaftaran" class="table table-hover table-bordered">
          <thead>
          <tr>
            <th>No. Antri</th>
            <th>No. RM</th>
            <th>Nama Pasien</th>
            <th>Alamat</th>
            <th>Status Periksa</th>
            <th>Poli</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            
          </tbody>        
        </table>     
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        form pemeriksaan pasien
    </div>
    <!-- /.card-footer-->
</div>
 
</div>



@include('pendaftaran.show')
  @endsection