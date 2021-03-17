@extends('layouts.main')
@section('content')


<div class="col-lg-12">
  <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Pasien menunggu Antrian</span>
          <span class="info-box-number">
            {{$jumlahTunggu}} dari {{$jumlah}}
          </span>
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
          <span class="info-box-number">{{$jumlahDiperiksa}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-person-booth"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">{!! KustomHelper::setLabelPoli(Cookie::get('id_poli')) !!} </span>
          <span class="info-box-number">dr. Indah Citra Handayani</span>
        </div>
        <a class="btn btn-app bg-info" href="javascript:void(0)" data-toggle="modal" data-target="#form-setpoli"><i class="fas fa-dice-d6"></i> Ubah Poli</a>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
  </div>

  <div class="card card-outline card-danger" >
    <div class="card-header bg-gradient-primary">
      <div class="row">
        <div class="col-md-6">
          <h3 class="card-title">
              <a href="" class="btn btn-app bg-info"><i class="fas fa-phone-square-alt"></i> Panggil</a>
              <a href="" class="btn btn-app bg-red"><i class="fas fa-microphone"></i> Antrian</a>
          </h3>
        </div>        
        <div class="col-sm-12 col-md-6">
          
        </div>
      </div>       
    </div>
    <div class="card-body">
      <div class="table table-responsive">
        <table id="data-pemeriksaan" class="table table-hover table-bordered">
          <thead>
          <tr>
            <th>No. Antri</th>
            <th>No. RM</th>
            <th>Nama Pasien</th>
            <th>Alamat</th>
            <th>Status Pemeriksaan</th>
            <th>Poli</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($dataItem as $a)
                <tr>
                  <td>{{$a->noantrian}}</td>
                  <td>{{$a->no_rm}}</td>
                  <td>{{$a->nama_lengkap}}</td>
                  <td>{{$a->alamat}}</td>
                  <td>{!!$a->status=='1'?'<span class="text text-danger">menunggu</span>':'<span class="text text-primary">diperiksa</span>'!!}</td>
                  <td>{{$a->nama_poli}}</td>
                  <td>
                    <div class="btn-group">
                      <form action="{{route('pemeriksaan.proses')}}" method="POST">
                        @csrf
                        <input type="hidden" name="idpemeriksaan" value="{{$a->id}}">
                        <input type="hidden" name="idpasien" value="{{$a->idpasien}}">
                      <button type="submit"  class="btn btn-success btn-sm" title="periksa">
                        <i class="fas fa-check-double"></i>
                      </button>
                    </form>
                      <a href=""  class="btn btn-primary btn-sm" title="edit">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href=""  class="btn btn-danger btn-sm" title="hapus">
                        <i class="fas fa-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
            @endforeach            
          </tbody>        
        </table>     
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        form pemeriksaan pasien {{Cookie::get('id_poli')}}
        {{-- {{$dataItem}} --}}
    </div>
    <!-- /.card-footer-->
</div>
 
</div>



@include('pendaftaran.show')
@include('pemeriksaan.setpoli')
  @endsection