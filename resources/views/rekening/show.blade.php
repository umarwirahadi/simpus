{{-- @extends('layouts.main')
@section('content')
<div class="col-lg-12">
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">{{$aksi??''}}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="" method="POST" id="form-rekening">
                @csrf
                <input type="hidden" name="_method" value="POST">
                <div class="form-group">
                    <label class="col-form-label" for="kode_rekening">Kode rekening</label>
                    <input type="text" class="form-control" name="kode_rekening" id="kode_rekening" placeholder="masukan kode rekening" required>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="nama_rekening">Nama rekening</label>
                    <input type="text" class="form-control" placeholder="masukan nama rekening" name="nama_rekening" id="nama_rekening" required>
                </div>
                <div class="form-group">
                    <label>Jenis rekening</label>
                    <select class="custom-select" name="jenis" id="jenis">
                        {!!KustomHelper::getItem('jenis-rekening')!!}
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="biaya">biaya</label>
                    <input type="text" class="form-control" placeholder="biaya" name="biaya" id="biaya" required value="0">
                </div>              
                <div class="form-group">
                        <label class="col-form-label" for="status">Status</label>
                        <select class="custom-select" name="status" id="status">
                            {!!KustomHelper::getItem('Status-aktif')!!}
                        </select>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                    <button type="button" class="btn btn-warning" name="kembali"
                        onclick="window.location.href='/rekening'">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection --}}


<div class="modal fade" id="modal-rekening">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table">
                <tr>
                    <td style="width: 30%">Kode</td>
                    <td style="width: 3%">:</td>
                    <td id="a1">-</td>
                </tr>
                <tr>
                    <td>Nama Rekening</td>
                    <td>:</td>
                    <td id="a2">-</td>                    
                </tr>
                <tr>
                    <td>Biaya</td>
                    <td>:</td>
                    <td id="a3">-</td>                    
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td id="a4">-</td>                    
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td>:</td>
                    <td id="a5">-</td>                    
                </tr>
            </table>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>