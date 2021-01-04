@extends('layouts.main')
@section('content')
<div class="col-lg-12">

    <div class="card card-outline card-danger" >
        <div class="card-header">
            <h3 class="card-title">Title</h3>
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
                                @foreach ($datapoli as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->kode}}</td>
                                    <td>{{$item->poli}}</td>
                                    <td>{{$item->status==1?'Aktif':'Tidak aktif'}}</td>
                                    <td>
                                        <a href="" class="btn btn-xs btn-primary"><i class="far fa-eye"
                                                title="Detail poli"></i></a>
                                        <a href="" class="btn btn-xs btn-danger"><i class="fa fa-trash"
                                                title="Hapus"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
</div>

@endsection
