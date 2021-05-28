@extends('layouts.main')
@section('content')
<div class="col-lg-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{$aksi??''}}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('tenagamedis.store')}}" method="POST" id="post-tenagamedis">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="nip">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip"  placeholder="NIP jika kosong ketik -" />
                        </div>                                    
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="control-label" for="nama_lengkap">Nama lengkap</label>
                            <input type="text" class="form-control" placeholder="masukan nama lengkap" name="nama_lengkap" id="nama_lengkap" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="jenistenagamedis">Jenis ketenagaan</label>
                            <select class="custom-select" name="jenistenagamedis" id="jenistenagamedis">
                                {!!KustomHelper::getItem('jenis-tenagamedis')!!}
                            </select>                    
                        </div>                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="bidang_pelayanan">Bidang Pelayanan</label>
                            <select class="custom-select" name="bidang_pelayanan" id="bidang_pelayanan">
                                {!!KustomHelper::getItem('bidang-pelayanan-kesehatan')!!}
                            </select>                    
                        </div>                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="hp">No. HP</label>
                            <input type="text" class="form-control" id="hp" name="hp"  placeholder="No. Handphone" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="tgl_lahir">Tanggal lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"  />
                        </div>                        
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="tgl_gabung">Tanggal bergabung</label>
                            <input type="date" class="form-control" id="tgl_gabung" name="tgl_gabung"  />
                        </div>                        
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label" for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"  placeholder="Alamat" />
                        </div>                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="no_ijin">No. Ijin</label>
                            <input type="text" class="form-control" id="no_ijin" name="no_ijin"  />
                        </div>                    
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" id="status">
                                {!!KustomHelper::getItem('Status-aktif')!!}
                            </select>
                          </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label" for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                    <button type="button" class="btn btn-warning" name="kembali"
                        onclick="window.location.href='/tenagamedis'">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
