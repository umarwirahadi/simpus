@extends('layouts.main')
@section('content')
<div class="col-lg-12">

    <div class="card card-outline card-danger" >
        <div class="card-header">
            <h3 class="card-title">
                <form action="{{route('faskes.store')}}" method="POST" id="form-provider">
                @csrf
                <button type="submit"  class="btn btn-app bg-default"><i class="fas fa-cloud-download-alt"></i> get Faskes Pcare</button>                
                <a class="btn btn-app">
                    <i class="fas fa-file-excel"></i> Export to fa-file-excel
                  </a>
            </form>
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
                    <table id="data-faskes" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Faskes</th>
                                <th>Nama Faskes</th>                                    
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $i=1 @endphp
                             @foreach ($datafaskes as $rek)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$rek->kdProvider}}</td>
                                <td>{{$rek->nmProvider}}</td>
                                <td>                                    
                                    <button class="btn btn-danger btn-sm delete-data" id="{{$rek->id}}">
                                        <i class="fas fa-trash-alt"
                                        title="Hapus"></i></button>                                        
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
