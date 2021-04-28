@extends('layouts.main')
@section('content')

<div class="col-lg-12">

  <div class="card card-outline card-danger" >
      <div class="card-header">
        <h3 class="card-title">
            <a href="{{route('pasien.create')}}" class="btn btn-app bg-blue"><i class="fas fa-save"></i> Tambah</a>
            <a href="{{route('pasien.create')}}" class="btn btn-app bg-green"><i class="fas fa-file-excel"></i> Export</a>
        </h3>
        
          {{-- <h3 class="card-title">
              <a href="{{route('pasien.create')}}" class="btn btn-block btn-info btn-xs"><i class="far fa-save"></i> Tambah</a>
              
          </h3> --}}
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
                      <table id="data-pasien" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>NIK</th>
                          <th>No. RM</th>
                          <th>Nama Pasien</th>
                          <th>Alamat</th>
                          <th>HP</th>
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>                                                 
                        </tbody>              
                      </table>
          </div>
      </div>
      <div class="card-footer">
          Data pasien
      </div>
  </div>
</div>

{{-- load modal --}}

@endsection



