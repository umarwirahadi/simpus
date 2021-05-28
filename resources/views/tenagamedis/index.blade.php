@extends('layouts.main')
@section('content')
<div class="col-lg-12">

    <div class="card card-outline card-danger" >
        <div class="card-header">
            <h3 class="card-title">
                <a href="/" class="btn btn-app bg-primary" ><i class="fas fa-home"></i> Home</a>
                <a href="{{route('tenagamedis.create')}}" class="btn btn-app bg-success"><i class="fas fa-save"></i> Tambah</a>
                <button class="btn btn-app bg-warning" id="get-tenaga-medis"><i class="fas fa-check"></i> Update Pcare</button>
                <a href="{{route('tenagamedis.create')}}" class="btn btn-app bg-red"><i class="fas fa-file-excel"></i> Export</a>
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
                        <table id="data-tenagamedis" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>NAMA LENGKAP</th>
                                    <th>JENIS</th>
                                    <th>NO. HP</th>
                                    <th>KD. PCARE</th>
                                    <th>PELAYANAN</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>      
                            @php
                                $i=1;
                            @endphp
                                @foreach ($dataItem as $item)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$item->nip}}</td>
                                    <td>{{$item->nama_lengkap}}</td>
                                    <td>{{$item->jenistenagamedis}}</td>
                                    <td>{{$item->hp}}</td>
                                    <td>{{$item->kdDokter_pcare}}</td>
                                    <td>{{$item->bidang_pelayanan}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{route('tenagamedis.edit',$item)}}" class="btn btn-success btn-sm"><i class="fas fa-pen"
                                                title="edit poli"></i></a>  
                                            <a href="{{route('tenagamedis.show',$item->id)}}" class="btn btn-primary btn-sm detail" id="{{$item->id}}">
                                                <i class="fas fa-search"
                                                title="show data"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-danger btn-sm delete-data" data-id="{{$item->id}}">
                                                <i class="fas fa-trash-alt"
                                                title="Hapus"></i></a>
                                          </div>
                                    </td>
                                </tr>
                                @php
                                    $i++;                                    
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
        <!-- /.card-footer-->
    </div>
</div>

@endsection
