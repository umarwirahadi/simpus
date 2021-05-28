<!DOCTYPE html>
<html>
<head>
	<title>Print document</title>	
  <style>
	 .print-judul{
		border-collapse: collapse;
		width: 100%
	 }
	 .print-judul tr td{	 
		border:none;
	 }	
		.table {
		  border-collapse: collapse;
		  width: 100%
		}
		
		.table,td {
		  border: 1px solid #999;
		  padding: 0.5rem;
		  text-align: left;
		}
		.table,th {
		  border: 1px solid #999;
		  padding: 0.5rem;
		  text-align: left;
		}
		
  </style>
</head>
<body>

	<center>
		<h4>LAPORAN PENERIMAAN OBAT</h4>
		<h4>{{$puskesmas->nama_puskesmas}}</h4>		
	</center>
	
<table class="print-judul">
	<tr>
		<td style="width: 20%">Kode</td>
		<td style="width: 2%">:</td>
		<td style="width: 78%">{{$dataObat->kode}}</td>
	</tr>
	<tr>
		<td>Nama obat</td>
		<td>:</td>
		<td>{{$dataObat->nama_obat}}</td>
	</tr>
	<tr>
		<td>Jenis</td>
		<td>:</td>
		<td>{{$dataObat->jenis}}</td>
	</tr>
	<tr>
		<td>Stok obat</td>
		<td>:</td>
		<td>Stok awal :{{$dataObat->stok_awal}}/ Stok akhir : {{$dataObat->sisa_stok}}</td>
	</tr>
</table>
	<table class='table'>
		<thead>
			<tr>
				<th>NO</th>
				<th>TANGGAL</th>
				<th>JUMLAH</th>
				<th>SATUAN</th>
				<th>KADALUARSA</th>
				<th>NO. BATCH</th>
				<th>PENGIRIM</th>
				<th>KETERANGAN</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($penerimaan as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$p->tanggal_penermaan}}</td>
				<td>{{$p->jumlah_penermaan}}</td>
				<td>{{$p->satuan}}</td>
				<td>{{$p->tanggal_kadaluarsa}}</td>
				<td>{{$p->no_batch}}</td>
				<td>{{$p->petugas_pengirim}}</td>
				<td>{{$p->keterangan}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	
</body>
</html>