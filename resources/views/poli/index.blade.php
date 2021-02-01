@extends('layouts.main')
@section('content')
<div class="col-lg-12">

    <div class="card card-outline card-danger" >
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{route('poli.create')}}" class="btn btn-app bg-blue"><i class="fas fa-save"></i> Tambah</a>
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
                        <table id="data-poli" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Poli</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datapoli as $poli)
                                <tr>
                                    <td>{{$poli->id}}</td>
                                    <td>{{$poli->kode}}</td>
                                    <td>{{$poli->poli}}</td>
                                    <td>{{$poli->status==1?'Aktif':'Tidak aktif'}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{route('poli.edit',[$poli->id])}}" class="btn btn-success btn-sm"><i class="fas fa-pen"
                                                title="edit poli"></i></a>  
                                            <a href="{{route('poli.show',[$poli->id])}}" class="btn btn-primary btn-sm detail" id="{{$poli->id}}">
                                                <i class="fas fa-search"
                                                title="detail data"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-danger btn-sm delete-data" id="{{$poli->id}}">
                                                <i class="fas fa-trash-alt"
                                                title="Hapus"></i></a>
                                          </div>
                                        
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
        <!-- /.card-footer-->
    </div>
</div>

@endsection
