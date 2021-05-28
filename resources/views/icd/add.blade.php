<div class="modal fade" id="form-data-obat">
    <form id="form-add-obat" method="POST">
        @csrf                
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-green">
          <h4 class="modal-title">Tambah obat</h4>
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
                      <input type="text" class="form-control form-control-sm text-uppercase" name="kode" id="kode" value="" required />
                    </div>
                  </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                          <label>Nama obat </label>
                          <input type="text" class="form-control form-control-sm" name="nama_obat" id="nama_obat" value="" required/>
                        </div>
                      </div>                                                  
                  </div>
                <div class="row">                                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jenis</label>
                            <select class="form-control form-control-sm" name="jenis" id="jenis" required>
                              {!!KustomHelper::getItem('jenis-obat')!!}
                            </select>
                        </div>
                      </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Satuan</label>
                            <select class="form-control form-control-sm" name="satuan" id="satuan" required>
                              {!!KustomHelper::getItem('satuan-obat')!!}
                            </select>
                        </div>
                      </div>                                     
                  </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                          <label>Harga</label>
                          <input type="text" class="form-control form-control-sm" name="harga" id="harga" value="" />
                        </div>
                      </div>                                             
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>Stok awal</label>
                          <input type="text" class="form-control form-control-sm" name="stok_awal" id="stok_awal" value="0" readonly />
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>Sisa stok</label>
                          <input type="text" class="form-control form-control-sm" name="sisa_stok" id="sisa_stok" value="0" readonly />
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