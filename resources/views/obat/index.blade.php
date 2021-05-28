@extends('layouts.main')
@section('content')
<div class="col-lg-12">

    <div class="card card-outline card-danger" >
        <div class="card-header">
            <h3 class="card-title">
                <a href="/" class="btn btn-app bg-primary" ><i class="fas fa-home"></i> Home</a>
                <button type="button" class="btn btn-app bg-success" data-toggle="modal" data-target="#form-data-obat">
                    <i class="fas fa-save"></i> Tambah
                  </button>  
                <a href="#" class="btn btn-app btn-sm bg-warning" >
                    <i class="fa fa-file-excel"></i> Export
                  </a>  
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
                        <table id="data-obat" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama obat</th>
                                    <th>Jenis</th>
                                    <th>Satuan</th>
                                    <th>sisa stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>                                                     
                         
                            </tbody>
                        </table>
            </div>
        </div>
        <!-- /.card-footer-->
    </div>
</div>


<div class="modal fade" id="modalMd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalMdTitle">
                </h4>                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="modalError"></div>
                <div id="modalMdContent"></div>
            </div>
        </div>
    </div>
</div>

@include('obat.add')
@include('obat.edit')

@endsection
