<div class="modal fade" id="form-pendaftaran">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-green">
          <h4 class="modal-title">Data pendaftaran pasien</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table">
                <tr>
                    <td style="width: 20%">No. Pendaftaran</td>
                    <td style="width: 3%">:</td>
                    <td id="a1">5</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td id="a2">{{ Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</td>
                </tr>
                <tr>
                    <td>No. Antrian</td>
                    <td>:</td>
                    <td id="a3">A12</td>                    
                </tr>
                <tr>
                    <td>No. Rekam Medis</td>
                    <td>:</td>
                    <td id="a4"></td>                    
                </tr>
                <tr>
                    <td>Nama pasien</td>
                    <td>:</td>
                    <td id="a5"></td>                    
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td id="a5a"></td>                    
                </tr>
                <tr>
                    <td>Status Pembayaran</td>
                    <td>:</td>
                    <td id="a6">sudah bayar</td>                    
                </tr>
                <tr>
                    <td>Poli</td>
                    <td>:</td>
                    <td id="a7"></td>                    
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td id="a8">-</td>                    
                </tr>
            </table>
        </div>
        <div class="modal-footer justify-content-right">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>