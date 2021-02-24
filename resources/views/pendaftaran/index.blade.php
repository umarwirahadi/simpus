@extends('layouts.main')
@section('content')


<div class="col-lg-12">

  <div class="card card-outline card-danger" >
    <div class="card-header">
        <h3 class="card-title">
            <a href="{{route('pendaftaran.create')}}" class="btn btn-app bg-blue"><i class="fas fa-address-card"></i> Daftar</a>
            <a href="{{route('pendaftaran.create')}}" class="btn btn-app bg-red"><i class="fas fa-microphone"></i> Antrian</a>
            <a href="#" class="btn btn-app bg-green"><i class="fas fa-file-excel"></i> Export</a>
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
      <div class="table table-responsive">
        <table id="pendaftaran" class="table table-hover table-bordered">
          <thead>
          <tr>
            <th>No</th>
            <th>No. RM</th>
            <th>Nama Pasien</th>
            <th>No. Daftar</th>
            <th>No. Antri</th>
            <th>Alamat</th>
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
        form pendaftaran kunjungan pasien, jika data pasien baru silahkan klik tombol, pasien baru
    </div>
    <!-- /.card-footer-->
</div>
 
</div>
@include('pendaftaran.show')
  @endsection