@extends('layouts.main')
@section('content')
<div class="col-lg-12">
    <div class="card card-outline card-danger" >
        <div class="card-header">
            <h3 class="card-title">
                Pelayanan Farmasi
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
                <b>Data Pasien</b>
                <div class="row invoice-info">
                  <div class="col-sm-6 invoice-col">
                    <address>
                      No. RM : {{$dataItem->no_rm}} /No. BPJS : {{$dataItem->nokartu_bpjs??'-'}}<br>
                      <b> {{$dataItem->nama_lengkap??'-'}}</b><br>
                      Pemeriksaan : {{$dataItem->tanggal}} <br>
                      Alamat : {{$dataItem->alamat.' (RT.'.$dataItem->rt.' RW.'.$dataItem->rw.')'}}<br>
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6 invoice-col">
                    <address>
                        Keluhan : {{$dataItem->diagnosa}}<br>
                        Keluhan : {{$dataItem->keluhan_utama}}<br>
                    </address>
                  </div>
                </div>
                <!-- /.row -->
                <div class="row">
                        <input class="form-control form-control-sm" type="text" placeholder="Pencarian obat">
                </div>
                <!-- Table row -->
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table class="table table-striped" id="detail-farmasi">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Obat</th>
                        <th>Jumlah</th>
                        <th>Deskripsi</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>1</td>
                        <td>Paracetamol</td>
                        <td>10</td>
                        <td>2x1 (habiskan)</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Asammefenamat</td>
                        <td>5</td>
                        <td>3x1 </td>
                      </tr>
                      </tbody>
                    </table>
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
