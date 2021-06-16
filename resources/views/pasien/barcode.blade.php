{{-- @extends('layouts.main')
@section('content')

<div class="col-lg-12">
  <div class="card card-outline card-danger" >
    <h1 class="text-primary" style="text-align: center;margin-bottom: 20px;">Umar Wirahad - 01000001</h1>
	<div style="text-align: center;">
		<img src="data:image/png;base64,{{DNS1D::getBarcodePNG('01000001', 'C39+',3,100,array(1,1,1), true)}}" alt="barcode" /><br><br>
		{{-- <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('01000001', 'C39+',1,33,array(0,255,0), true)}}" alt="barcode" /><br><br>
		<img src="data:image/png;base64,{{DNS1D::getBarcodePNG('01000001', 'C39+',3,33,array(255,0,0))}}" alt="barcode" /><br><br>
		<img src="data:image/png;base64,{{DNS1D::getBarcodePNG('01000001', 'C39+')}}" alt="barcode" /><br><br>
		<img src="data:image/png;base64,{{DNS1D::getBarcodePNG('01000001', 'POSTNET')}}" alt="barcode" /><br/><br/> --}}
	{{-- </div>
  </div>
  <button onclick="window.print()" class="btn btn-primary">Print</button>
  <a href="{{route('pasien.index')}}" class="btn btn-warning">Back</a>
</div>
@endsection --}}



<div class="modal fade" id="form-show-barcode">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-green">
          <h4 class="modal-title">Barcode pasien</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <input type="hidden" name="label_id_pasien" id="label_id_pasien" value="">
            <div class="row" id="printareaID">
                <div class="col-md-4">
                    <div id="barcode-id" >
                    </div>
                </div>
                <div class="col-md-8">
                    <table>
                        <tr>
                            <td style="width: 30%">No. RM</td>
                            <td style="width: 4%">:</td>
                            <td style="width: 50%" id="label_no_rm"></td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Nama lengkap</td>
                            <td style="width: 4%">:</td>
                            <td style="width: 50%" id="label_nama_lengkap"></td>
                        </tr>
                        <tr>
                            <td style="width: 30%">NIK/KK</td>
                            <td style="width: 4%">:</td>
                            <td style="width: 50%" id="label_nik"></td>
                        </tr>
                        <tr>
                            <td style="width: 30%">No. BPJS</td>
                            <td style="width: 4%">:</td>
                            <td style="width: 50%" id="label_bpjs"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-right">
          <button type="button" class="btn btn-primary" id="print-label-data">Cetak</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
