@extends('layouts.main')
@section('content')


<div class="col-lg-12">

  <div class="card card-outline card-danger" >
    <div class="card-header">
        <h3 class="card-title">
            <a href="{{route('pendaftaran.create')}}" class="btn btn-app bg-blue"><i class="fas fa-save"></i> Tambah</a>
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
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>No. RM</th>
            <th>Nama Pasien</th>
            <th>NIK</th>
            <th>Alamat</th>
            <th>Poli</th>
            <th>Opsi</th>
          </tr>
          </thead>
          <tbody>
              <tr>
                  <td>1</td>
                  <td>1-000001</td>
                  <td>Umar Wirahadi</td>
                  <td>3208102311880001</td>
                  <td>Jl. Cijerah II Gg Nusa Indah No. 35</td>
                  <td>Gigi</td>
                  <td>
                      <div class="btn-group">
                          <button type="button" class="btn btn-success btn-flat btn-xs" title="edit pendaftaran">
                            <i class="fa fa-pencil-alt"></i>
                          </button>
                          <button type="button" class="btn btn-primary btn-flat btn-xs" title="edit pendaftaran">
                            <i class="fas fa-align-right"></i>
                          </button>
                          <button type="button" class="btn btn-danger btn-flat btn-xs" title="hapus pendaftaran">
                              <i class="fa fa-trash-alt"></i>
                            </button>                              
                      </div>
                  </td>
              </tr>
          </tbody>
          <tfoot>
          <tr>
              <th>No</th>
              <th>No. RM</th>
              <th>Nama Pasien</th>
              <th>NIK</th>
              <th>Alamat</th>
              <th>Poli</th>
              <th>Opsi</th>
          </tr>
          </tfoot>
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



  @endsection

@yield('modal-add')