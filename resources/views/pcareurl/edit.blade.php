@extends('layouts.main')
@section('content')
    <div class="col-lg-12">
        <form action="{{route('listpcare.update',$dataurl->id)}}" method="POST" id="edit-form-endpoint" >                            
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ $aksi ?? '' }}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">                    
                    <input type="hidden" name="id" id="idurl" value="{{$dataurl->id}}">
                    <div class="row">
                        <div class="col-md-4">                          
                            <div class="form-group">
                                <label class="col-form-label" for="endpoint">End Point</label>
                                <select class="custom-select" name="endpoint" id="endpoint">
                                    <option value="GET" {{$dataurl->endpoint=='GET'?'selected':null}}>GET</option>
                                    <option value="POST" {{$dataurl->endpoint=='POST'?'selected':null}}>POST</option>
                                    <option value="PUT" {{$dataurl->endpoint=='PUT'?'selected':null}}>PUT</option>
                                    <option value="DELETE" {{$dataurl->endpoint=='DELETE'?'selected':null}}>DELETE</option>
                                </select>
                            </div>         
                        </div>                     
                        <div class="col-md-8">                          
                            <div class="form-group">
                                <label class="col-form-label" for="domain">domain</label>
                                <input type="text" class="form-control" placeholder="ex: https://api.bpjs-kesehatan.go.id" name="domain" id="domain" value="{{$dataurl->domain}}" />
                            </div>                                                    
                        </div>                                                                
                    </div>
                    <div class="row">
                        <div class="col-md-12">                          
                            <div class="form-group">
                                <label class="col-form-label" for="method">Method</label>
                                <input type="text" class="form-control" placeholder="ex: peserta" name="method" id="method" value="{{$dataurl->method}}">                                
                            </div>         
                        </div>                                                                                                             
                    </div>               
                    <div class="row">
                        <div class="col-md-12">                          
                            <div class="form-group">
                                <label class="col-form-label" for="description">Keterangan</label>
                                <textarea name="description" class="form-control" id="description" cols="30" rows="5">{{$dataurl->description}}</textarea>
                            </div>                                                    
                        </div>                      
                    </div>
                    <div class="row">                                                                                    
                        <div class="col-md-12">                          
                            <div class="form-group">
                                <label class="col-form-label" for="status">Status</label>
                                <select class="custom-select" name="status" id="status">
                                    {!! KustomHelper::getItem('status-aktif',$dataurl->status) !!}
                                </select>
                            </div>                                                    
                        </div>            
                    </div>                       
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="submit">Update</button>
                <button type="button" class="btn btn-warning" name="kembali"
                    onclick="window.location.href='/listpcare'">Kembali</button>
            </div>                             
        </div>
    </form>
    </div>

@endsection
