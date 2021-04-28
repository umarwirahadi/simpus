@extends('layouts.main')
@section('content')
    <div class="col-lg-12">
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
                <form action="{{route('listpcare.store')}}" method="POST" id="create-form-endpoint">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">                          
                            <div class="form-group">
                                <label class="col-form-label" for="endpoint">End Point</label>
                                <select class="custom-select" name="endpoint" id="endpoint">
                                    <option value="GET">GET</option>
                                    <option value="POST">POST</option>
                                    <option value="PUT">PUT</option>
                                    <option value="DELETE">DELETE</option>
                                </select>
                            </div>         
                        </div>                     
                        <div class="col-md-8">                          
                            <div class="form-group">
                                <label class="col-form-label" for="domain">domain</label>
                                <input type="text" class="form-control" placeholder="ex: https://api.bpjs-kesehatan.go.id" name="domain" id="domain" >
                            </div>                                                    
                        </div>                                                                
                    </div>
                    <div class="row">
                        <div class="col-md-12">                          
                            <div class="form-group">
                                <label class="col-form-label" for="method">Method</label>
                                <input type="text" class="form-control" placeholder="ex: peserta" name="method" id="method" >                                
                            </div>         
                        </div>                                                                                                             
                    </div>               
                    <div class="row">
                        <div class="col-md-12">                          
                            <div class="form-group">
                                <label class="col-form-label" for="description">Keterangan</label>
                                <textarea name="description" class="form-control" id="description" cols="30" rows="5"></textarea>
                            </div>                                                    
                        </div>                      
                    </div>
                    <div class="row">                                                                                    
                        <div class="col-md-12">                          
                            <div class="form-group">
                                <label class="col-form-label" for="status">Status</label>
                                <select class="custom-select" name="status" id="status">
                                    {!! KustomHelper::getItem('status-aktif') !!}
                                </select>
                            </div>                                                    
                        </div>            
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                        <button type="button" class="btn btn-warning" name="kembali"
                            onclick="window.location.href='/listpcare'">Kembali</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
