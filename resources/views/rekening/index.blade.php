@extends('layouts.main')
@section('content')
<div class="col-lg-12">

    <div class="card card-outline card-danger" >
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{route('rekening.create')}}" class="btn btn-app bg-blue"><i class="fas fa-save"></i> Tambah</a>
                <a href="#" class="btn btn-app bg-red"><i class="fas fa-cloud-download-alt"></i> Download</a>
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
                        <table id="data-rekening" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode rekening</th>
                                    <th>Nama Rekening</th>
                                    <th>Jenis</th>
                                    <th>Biaya</th>
                                    <th>Status</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $i=1 @endphp
                                @foreach ($dataRekening as $rek)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$rek->kode_rekening}}</td>
                                    <td>{{$rek->nama_rekening}}</td>
                                    <td>{{$rek->jenis}}</td>
                                    <td>@rupiah($rek->biaya)</td>
                                    <td>{{$rek->status==1?'Aktif':'Tidak aktif'}}</td>
                                    <td>                                    
                                        <div class="btn-group">
                                            <a href="javascript:void(0)" data-id="{{$rek->id}}" class="btn btn-primary btn-sm choose-data"><i class="fas fa-search"
                                                title="edit rek"></i></a>
                                            <a href="{{route('rekening.edit',[$rek->id])}}" class="btn btn-success btn-sm"><i class="fas fa-pen"
                                                title="edit rek"></i></a>  
                                            <button class="btn btn-danger btn-sm delete-data" id="{{$rek->id}}">
                                                <i class="fas fa-trash-alt"
                                                title="Hapus"></i></button>
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

@include('rekening.show')
@endsection
