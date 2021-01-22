@extends('layouts.main')
@section('content')


<div class="col-lg-12">
    <div class="callout callout-info">
        <button class="btn btn-primary btn-xs" onclick="window.location.href='pendaftaran/create'"><i class="fa fa-plus-circle"></i> Tambah (F2)</button>
        {{-- <h6><i class="fas fa-info"></i> Note: klik tambah untuk pendaftaran kunjungan</h6> --}}
      </div>
    <div class="card card-outline card-primary">
        <div class="card-header">
          <h3 class="card-title">Pendaftaran pasien</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
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
        <!-- /.card-body -->
      </div>


</div>



  @endsection

@yield('modal-add')