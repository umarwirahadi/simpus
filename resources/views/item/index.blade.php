@extends('layouts.main')
@section('content')

<div class="col-lg-12">

  <div class="card card-outline card-danger" >
      <div class="card-header">
          <h3 class="card-title">
              {{-- <a href="{{route('item.create')}}" class="btn btn-block btn-info btn-xs"><i class="far fa-save"></i> Tambah</a> --}}
              <a href="{{route('item.create')}}" class="btn btn-app bg-blue"><i class="fas fa-save"></i> Tambah</a>
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
                      <table id="data-item" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Kode</th>
                          <th>Nama Item</th>
                          <th>Kategori</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                          @php $i=1 @endphp
                            @foreach ($dataItem as $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$item->kode}}</td>
                                <td>{{$item->item}}</td>
                                <td>{{$item->kategori}}</td>
                                <td>{{$item->status==1?'Aktif':'Tidak aktif'}}</td>
                                <td>                                    
                                    <div class="btn-group">
                                        <a href="{{route('item.edit',[$item->id])}}" class="btn btn-success btn-sm"><i class="fas fa-pen"
                                            title="edit item"></i></a>  
                                        <a href="{{route('item.show',[$item->id])}}" class="btn btn-primary btn-sm detail" id="{{$item->id}}">
                                            <i class="fas fa-search"
                                            title="detail data"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-sm delete-data" id="{{$item->id}}">
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
      <!-- /.card-body -->
      <div class="card-footer">
          Data item
      </div>
      <!-- /.card-footer-->
  </div>
</div>
@endsection


