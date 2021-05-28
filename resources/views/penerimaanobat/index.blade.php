@extends('layouts.main')
@section('content')
<div class="col-lg-12">
    <div class="card card-outline card-danger" >
        <div class="card-header">
        <input type="hidden" name="data_id_obat" id="data_id_obat" value="{{$dataObat->id}}">
        <input type="hidden" name="data_kode_obat" id="data_kode_obat" value="{{$dataObat->kode}}">
        <input type="hidden" name="data_nama_obat" id="data_nama_obat" value="{{$dataObat->nama_obat}}">
        <div class="table-responsive">
            <table id="penerimaan-obat" class="table table-striped">
                <thead>
                    <tr>
                        <th>kode</th>
                        <th>Nama Obat</th>
                        <th>Jenis</th>
                        <th>Satuan</th>
                        <th>Stok awal</th>
                        <th>Sisa Stok</th>
                    </tr>
                </thead>
                <tbody>                                                     
                    <tr>
                        <td>{{$dataObat->kode}}</td>
                        <td>{{$dataObat->nama_obat}}</td>
                        <td>{{$dataObat->jenis}}</td>
                        <td>{{$dataObat->satuan}}</td>                    
                        <td>{{$dataObat->stok_awal}}</td>                    
                        <td>{{$dataObat->sisa_stok}}</td>
                    </tr>
                </tbody>
            </table>           
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-sm bg-blue" id="btn-input-penerimaan" data-id="{{$dataObat->id}}" data-toggle="modal" data-target="#form-add-penerimaan-obat">
                    <i class="fas fa-people-carry"></i> Penerimaan
                  </button>  
                <a href="#" class="btn btn-sm bg-green" data-toggle="modal" data-target="#form-data-obat">
                    <i class="fas fa-excel"></i> Export
                  </a>
                <a href="#" class="btn btn-sm bg-yellow" id="printAllPenerimaanObat" data-id="{{$dataObat->id}}">
                    <i class="fas fa-print"></i> Print all
                  </a>
                <a href="{{route('obat.index')}}" class="btn btn-sm bg-red" >
                    <i class="fas fa-undo-alt"></i> Kembali
                  </a>                
            </div>            
        </div>          
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
            <p class="text text-primary mb-1">history penerimaan obat</p>
            <div class="table table-responsive">
            <input type="hidden" name="id_obat" id="id_obat" value="{{$dataObat->id}}"/>
                        <table id="history-penerimaan-obat" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal terima</th>
                                    <th>Jumlah terima</th>
                                    <th>Kadaluarsa</th>
                                    <th>No. Batch</th>
                                    <th>Petugas</th>
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

@include('penerimaanobat.add')
@include('penerimaanobat.edit')

@endsection
