@extends('layouts.main')
@section('content')
<div class="modal-body">

  <table class="table table-hover">
  <tr>
    <td>Kode Obat</td>
    <td>:</td>
    <td>{{$obat->kode}}</td>
  </tr>
  <tr>
    <td>Nama Obat</td>
    <td>:</td>
    <td>{{$obat->nama_obat}}</td>
  </tr>
  <tr>
    <td>Jenis</td>
    <td>:</td>
    <td>{{$obat->jenis}}</td>
  </tr>
  <tr>
    <td>Jenis</td>
    <td>:</td>
    <td>{{$obat->jenis}}</td>
  </tr>
  <tr>
    <td>Satuan</td>
    <td>:</td>
    <td>{{$obat->satuan}}</td>
  </tr>
  <tr>
    <td>Harga</td>
    <td>:</td>
    <td>{{$obat->harga}}</td>
  </tr>
  <tr>
    <td>Stok awal</td>
    <td>:</td>
    <td>{{$obat->stok_awal}}</td>
  </tr>
  <tr>
    <td>Sisa stok</td>
    <td>:</td>
    <td>{{$obat->sisa_stok}}</td>
  </tr>
  <tr>
    <td>Status</td>
    <td>:</td>
    <td>{{$obat->status==1?'Aktif':'Tidak aktif'}}</td>
  </tr>
  <tr>
    <td>Keterangan</td>
    <td>:</td>
    <td>{{$obat->keterangan}}</td>
  </tr>
  </table>   
</div>
<div class="modal-footer justify-content-right">
  <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
</div>

@endsection
