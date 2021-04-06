<div class="modal fade" id="form-kajianawal">
    <form id="form-kajian-awal-pasien">
        @csrf                
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-green">
          <h4 class="modal-title">Form kajian awal pasien</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">       
            <div class="form-horizontal">
                <input type="hidden" value="" name="kajian_idpasien" id="kajian_idpasien">                
                <input type="hidden" name="kajian_id_pendaftaran" id="kajian_id_pendaftaran" value="" />

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                          <label>No. Rekam medis</label>
                          <input type="text" class="form-control form-control-sm" name="kajian_no_rm" id="kajian_no_rm" value="" readonly>
                        </div>
                      </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>No. KTP</label>
                        <input type="text" class="form-control form-control-sm" name="kajian_nik" id="kajian_nik" placeholder="no ktp" value="" readonly>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>No. antrian</label>
                        <input type="text" class="form-control form-control-sm" name="kajian_noantrian2" id="kajian_noantrian2" placeholder="No. antrian" value="" readonly>
                      </div>
                    </div>
                  </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Nama lengkap</label>
                          <input type="text" class="form-control form-control-sm" name="kajian_nama_lengkap" id="kajian_nama_lengkap" value="" readonly>
                        </div>
                      </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Tanggal lahir</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Tanggal lahir" name="kajian_tanggal_lahir" id="kajian_tanggal_lahir" value="" readonly>
                      </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                          <label>Usia</label>
                          <input type="text" class="form-control form-control-sm" name="kajian_usia" id="kajian_usia" value="" readonly>
                        </div>
                      </div>
                  </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                          <label>Sistole</label>
                          <input type="text" class="form-control form-control-sm" name="kajian_sistol" id="kajian_sistol" value="" placeholder="nilai sistole">
                        </div>
                      </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>diastole</label>
                        <input type="text" class="form-control form-control-sm" placeholder="nilai diastole" name="kajian_diastol" id="kajian_diastol" value="">
                      </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                          <label>Berat badan</label>
                          <input type="text" class="form-control form-control-sm" name="kajian_berat_badan" id="kajian_berat_badan" value="" placeholder="nilai berat badan (kg)" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                          <label>Tinggi badan</label>
                          <input type="text" class="form-control form-control-sm" name="kajian_tinggi_badan" id="kajian_tinggi_badan" value="" placeholder="nilai tinggi badan (cm)">
                        </div>
                      </div>
                  
                  </div>                  
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                          <label>Suhu tubuh</label>
                          <input type="text" class="form-control form-control-sm" placeholder="nilai suhu" name="kajian_suhu" id="kajian_suhu" value="">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Tekanan nadi</label>
                          <input type="text" class="form-control form-control-sm" placeholder="nilai tekanan nadi" name="kajian_tekanan_nadi" id="kajian_tekanan_nadi" value="">
                        </div>
                      </div>    
                
                    <div class="col-sm-4">
                        <div class="form-group">
                          <label>Respirasi</label>
                          <input type="text" class="form-control form-control-sm" name="kajian_respirasi" id="kajian_respirasi" value="" placeholder="nilai respirasi" >
                        </div>
                      </div>
                  </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                          <label>Anamnesa</label>
                          <textarea name="kajian_anamnesa" id="kajian_anamnesa" class="form-control form-control-sm" cols="30" rows="3"></textarea>                          
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