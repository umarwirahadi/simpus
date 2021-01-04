@extends('layouts.main')
@section('content')
<div class="table table-responsive">
     <div class="box">
            <div class="box-header">
                <button class="btn btn-sm btn-primary" id="tambahPoli"><span class="fa fa-plus"></span> Tambah</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID</th>
                  <th>Item</th>
                  <th>Kategori</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($dataItem as $item)
                    <tr>
                        <td>1</td>
                        <td>{{$item->id}}</td>
                        <td>{{$item->item}}</td>
                        <td>{{$item->kategori}}</td>
                        <td>{{$item->status}}</td>
                        <td>
                            <a href="/item/{{$item->id}}" class="btn btn-sm btn-primary" title="edit"><span class="fa fa-check-square-o"></span></a>
                            <a href="" class="btn btn-sm btn-danger" title="hapus"><span class="fa fa-trash-o"></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Poli</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

</div>
@endsection

@include('item.add')
