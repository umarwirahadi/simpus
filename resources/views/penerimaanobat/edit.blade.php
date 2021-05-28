<div class="modal fade" id="form-edit-penerimaan-obat">
  <form id="form-edit-penerimaan" method="POST">
      @csrf                
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-green">
        <h4 class="modal-title">Edit Penerimaan obat</h4>
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
                    <input type="hidden" name="edit_id_obat" id="edit_id_obat" value="">
                    <input type="hidden" name="edit_id_penerimaan" id="edit_id_penerimaan" value="">
                      <input type="text" class="form-control form-control-sm" name="edit_kode" id="edit_kode" value="{{$dataObat->kode}}" readonly/>
                  </div>
                </div>
                  <div class="col-sm-8">
                      <div class="form-group">
                        <label>Nama obat </label>
                        <input type="text" class="form-control form-control-sm" name="edit_nama_obat" id="edit_nama_obat" value="{{$dataObat->nama_obat}}" readonly/>
                      </div>
                    </div>                                                  
                </div>
              <div class="row">                                    
                  <div class="col-sm-4">
                      <div class="form-group">
                        <label>Satuan</label>
                        <select class="form-control form-control-sm" name="edit_satuan" id="edit_satuan" required>
                          {!!KustomHelper::getItem('satuan-obat')!!}
                        </select>
                    </div>
                    </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label>Jumlah</label>
                      <input type="number" class="form-control form-control-sm" name="edit_jumlah_penermaan" id="edit_jumlah_penermaan" value="" />
                    </div>
                    </div>                                     
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Tanggal diterima</label>
                      <input type="date" class="form-control form-control-sm" name="edit_tanggal_penermaan" id="edit_tanggal_penermaan"/>
                    </div>
                    </div>                                     
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label>Waktu diterima</label>
                      <input type="text" class="form-control form-control-sm" name="edit_waktu_penermaan" id="edit_waktu_penermaan" value="" />
                    </div>
                    </div>                                     
                </div>
              <div class="row">
                  <div class="col-sm-3">
                      <div class="form-group">
                        <label>Tanggal Kadaluarsa</label>
                        <input type="date" class="form-control form-control-sm" name="edit_tanggal_kadaluarsa" id="edit_tanggal_kadaluarsa" value="" />
                      </div>
                    </div>                                             
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>No. Batch</label>
                        <input type="text" class="form-control form-control-sm" name="edit_no_batch" id="edit_no_batch" value="0"  />
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Nama Pengirim</label>
                        <input type="text" class="form-control form-control-sm" name="edit_petugas_pengirim" id="edit_petugas_pengirim" value="" />
                      </div>
                    </div> 
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>status</label>
                        <select class="form-control form-control-sm" name="edit_status" id="edit_status" required>
                          {!!KustomHelper::getItem('Status-aktif')!!}
                        </select>
                      </div>
                    </div>                  
                </div>
              <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="edit_keterangan" id="edit_keterangan" class="form-control form-control-sm" cols="30" rows="2"></textarea>
                      </div>
                    </div>                                                           
                </div>                
              </div>
      </div>
      <div class="modal-footer justify-content-right">
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</form>
</div>