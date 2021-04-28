@extends('layouts.main')
@section('content')

<div class="col-lg-12">

  <div class="card card-outline card-danger" >
      <div class="card-header">
        <h3 class="card-title">
            <a href="{{route('listpcare.create')}}" class="btn btn-app bg-blue"><i class="fas fa-save"></i> Tambah</a>
            <a href="/settingpcare" class="btn btn-app bg-orange"><i class="fas fa-undo"></i> Kembali</a>
            <p class="text text-danger"><i>Catatan : form endpoint disediakan untuk link akses ke backend Pcare BPJS, jika ada perubahan silahkan ubah domain atau method pada form ini </i> </p>
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
                      <table id="data-endpoint" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>NO</th>
                          <th>ENDPOINT</th>
                          <th>DOMAIN</th>
                          <th>METHOD</th>
                          <th>STATUS</th>
                          <th>AKSI</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($dataItem as $item)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$item->endpoint}}</td>
                                    <td>{{$item->domain}}</td>
                                    <td>{{$item->method}}</td>
                                    <td>{{$item->status==1?'aktif':'tidak aktif'}}</td>
                                    <td>
                                        <a href="/listpcare/{{$item->id}}/edit" title="edit data" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                        <a href="javascript:void(0)" data-id="{{$item->id}}" title="hapus data" class="btn btn-xs btn-danger delete-record"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            @php
                                $no++;
                            @endphp
                        </tbody>
              
                      </table>
          </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
          Data pasien
      </div>
      <!-- /.card-footer-->
  </div>
</div>

{{-- load modal --}}

@endsection



