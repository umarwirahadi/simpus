<div class="modal fade" id="form-add-penerimaan-obat">
    <form id="form-add-penerimaan" method="POST">
        @csrf                
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-green">
          <h4 class="modal-title">Input Penerimaan obat</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">       
            <div class="form-horizontal">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Kode</label>
                      <input type="hidden" name="id_obat" id="id_obat" value="{{$dataObat->id}}">
                        <input type="text" class="form-control form-control-sm" name="kode" id="kode" value="{{$dataObat->kode}}" readonly />
                    </div>
                  </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                          <label>Nama obat </label>
                          <input type="text" class="form-control form-control-sm" name="nama_obat" id="nama_obat" value="{{$dataObat->nama_obat}}" readonly/>
                        </div>
                      </div>                                                  
                  </div>
                <div class="row">                                    
                    <div class="col-sm-4">
                        <div class="form-group">
                          <label>Satuan</label>
                          <select class="form-control form-control-sm" name="satuan" id="satuan" required>
                            {!!KustomHelper::getItem('satuan-obat')!!}
                          </select>
                      </div>
                      </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" class="form-control form-control-sm" name="jumlah_penermaan" id="jumlah_penermaan" value="" />
                      </div>
                      </div>                                     
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Tanggal diterima</label>
                        <input type="date" class="form-control form-control-sm" name="tanggal_penermaan" id="tanggal_penermaan"/>
                      </div>
                      </div>                                     
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>Waktu diterima</label>
                        <input type="text" class="form-control form-control-sm" name="waktu_penermaan" id="waktu_penermaan" value="" />
                      </div>
                      </div>                                     
                  </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                          <label>Tanggal Kadaluarsa</label>
                          <input type="date" class="form-control form-control-sm" name="tanggal_kadaluarsa" id="tanggal_kadaluarsa" value="" />
                        </div>
                      </div>                                             
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>No. Batch</label>
                          <input type="text" class="form-control form-control-sm" name="no_batch" id="no_batch" value="0"  />
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>Nama Pengirim</label>
                          <input type="text" class="form-control form-control-sm" name="petugas_pengirim" id="petugas_pengirim" value="" />
                        </div>
                      </div> 
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>status</label>
                          <select class="form-control form-control-sm" name="status" id="status" required>
                            {!!KustomHelper::getItem('Status-aktif')!!}
                          </select>
                        </div>
                      </div>                  
                  </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                          <label>Keterangan</label>
                          <textarea name="keterangan" id="keterangan" class="form-control form-control-sm" cols="30" rows="2"></textarea>
                        </div>
                      </div>                                                           
                  </div>                
                </div>
        </div>
        <div class="modal-footer justify-content-right">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</form>
  </div>