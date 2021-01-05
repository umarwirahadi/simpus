@extends('layouts.main')
@section('content')
<div class="col-lg-12">
    <div class="card card-outline card-danger" >
        <div class="card-header">
            <h3 class="card-title">
                Pembayaran
                {{-- <a href="{{route('poli.create')}}" class="btn btn-block btn-info btn-xs"><i class="far fa-save"></i>Tambah</a> --}}
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="invoice p-3 mb-3">
                <!-- title row -->
           
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-4 invoice-col">
                    Petugas
                    <address>
                      <strong>Intan Putri.</strong><br>
                      Phone: 0812314214xx<br>
                      Email: intan.putri@pkm-cimteng.go.id
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    Pasien
                    <address>
                      <strong>Diki Purnama</strong><br>
                      RM-10-0000001 <br>
                      Jl. Jend. Sudirman no. 14 Cimahi<br>
                      0817421225<br>
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    <b>Invoice #007612</b><br>
                    <br>
                    <b>Order ID:</b> 4F3S8J<br>
                    <b>Payment Due:</b> 2/22/2014<br>
                    <b>Account:</b> 968-34567
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
  
                <!-- Table row -->
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table class="table table-striped">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Item</th>
                        <th>Biaya</th>
                        <th>Qty</th>
                        <th>Total</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>1</td>
                        <td>Biaya tindakan (suntik)</td>
                        <td>Rp.50.000,-</td>
                        <td>1</td>
                        <td>Rp. 50.000,-</td>
                      </tr>                    
                      <tr>
                        <td>2</td>
                        <td>Biaya retribusi pemeriksaan</td>
                        <td>Rp.50.000,-</td>
                        <td>1</td>
                        <td>Rp. 50.000,-</td>
                      </tr>                    
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
  
                <div class="row">
                  <!-- accepted payments column -->
                  <div class="col-6">
                    <p class="lead">Payment Methods:</p>
                    <img src="{{asset('assets/dist/img/credit/visa.png')}}" alt="Visa">
                    <img src="{{asset('assets/dist/img/credit/mastercard.png')}}" alt="Mastercard">
                    <img src="{{asset('assets/dist/img/credit/american-express.png')}}" alt="American Express">
                    <img src="{{asset('assets/dist/img/credit/paypal2.png')}}" alt="Paypal">
  
                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                      plugg
                      dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                    </p>
                  </div>
                  <!-- /.col -->
                  <div class="col-6">                    
                    <div class="table-responsive">
                      <table class="table">
                        <tbody><tr>
                          <th style="width:50%">Subtotal:</th>
                          <td><input type="text" name="subtotal" id="subtotal" value="" class="form-control" placeholder="Rp.0,-"/></td>
                        </tr>
                        <tr>
                          <th>Bayar</th>
                          <td>
                              <input type="text" name="bayar" id="bayar" value="" class="form-control" placeholder="Rp.0,-"/>
                          </td>
                        </tr>
                        <tr>
                          <th>Kembali</th>
                          <td><input type="text" name="kembali" id="kembali" value="" class="form-control" placeholder="Rp.0,-"/></td>
                        </tr>
                      </tbody></table>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
  
                <!-- this row will not appear when printing -->
                <div class="row no-print">
                  <div class="col-12">
                    <button type="button" class="btn btn-sm btn-warning float-right m-1"><i class="fas fa-sync"></i> Reset </button>
                    <button type="button" class="btn btn-sm btn-success float-right m-1"><i class="fas fa-print"></i> Cetak</button>
                    <button type="button" class="btn btn-sm btn-primary float-right m-1" style="margin-right: 5px;"><i class="fas far fa-save"></i> Simpan</button>
                  </div>
                </div>
              </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Data Poli
        </div>
        <!-- /.card-footer-->
    </div>
</div>

@endsection
