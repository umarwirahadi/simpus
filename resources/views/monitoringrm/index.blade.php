@extends('layouts.main')
@section('content')

<div class="col-lg-12">

  <div class="card card-outline card-danger" >
      <div class="card-header">
        <h3 class="card-title">
            <a href="/" class="btn btn-app bg-blue"><i class="fas fa-home"></i> Home</a>
            <a href="{{route('pasien.create')}}" class="btn btn-app bg-blue"><i class="fas fa-save"></i> Tambah</a>
            <a href="{{route('pasien.create')}}" class="btn btn-app bg-green"><i class="fas fa-file-excel"></i> Export</a>
            <a href="javascript:void(0)" class="btn btn-app bg-green" id="cetak-kib-rm"><i class="fas fa-file-excel"></i> cetak KIB</a>
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
          <div class="table-responsive">
                      <table id="monitoring-berkas-rm" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>No. RM</th>
                          <th>Nama Pasien</th>
                          <th>No. RM (lama)</th>
                          <th>Antrian</th>
                          <th>NIK</th>
                          <th>No. BPJS</th>
                          <th>Poli</th>
                          <th>Status</th>
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



