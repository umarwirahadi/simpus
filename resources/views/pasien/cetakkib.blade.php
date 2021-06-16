<!DOCTYPE html>
<html>
<head>
	<title>Print KIB</title>
  <style>
    @page { margin: 0px; }
    body { margin: 0px;height: 300px; }

	 .print-judul{
		border-collapse: collapse;
		width: 100%;
		margin-left: 3em;
	 }
	 .print-judul tr td{
		border:none;
	 }
	 div.relative {
              position: relative;
              width: 100%;
              /* height: 400px; */
              /* border: 1px solid black; */
            }
	 div.norm {
          position: absolute;
          top: 2px;
          right: 0;
          width: 200px;
          height: 100px;
          /* border: 3px solid #73AD21; */
        }
    div.barcode {
          position: absolute;
          top: 250px;
          right: 2em;
          width: 200px;

        }
    div.footer {
          position: absolute;
          /* top: 280px; */
          right: 0;
          left: 0;
          padding: 4px;
          width: 100%;
          height: 30px;
          bottom: 0;
          color: white;
          background-color: blueviolet;
          /* border: 3px solid #73AD21; */
        }
    div.logo-pkm{
        position: absolute;
        top: 6px;
        left: 4;
        /* width: 60px;
        height: 60px; */
    }
</style>
</head>
<body>
<div class="relative">
    <div class="norm">
        No. RM : {{$dataPasien->no_rm}}
    </div>
    <div class="logo-pkm">
        <img src="img/logo_puskesmas.png" width="60" height="60"/>
    </div>


	<center>
		<h4>KARTU IDENTITAS BEROBAT (KIB)</h4>
		<h5>PUSKESMAS CIMAHI TENGAH</h5>
	</center>

<table class="print-judul">
	<tr>
		<td style="width: 20%">No. KTP</td>
		<td style="width: 2%">:</td>
		<td style="width: 78%">{{$dataPasien->nik}}</td>
	</tr>
	<tr>
		<td>Nama </td>
		<td>:</td>
		<td>{{$dataPasien->nama_lengkap}}</td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td>{{$dataPasien->alamat}}</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td>RT.{{$dataPasien->rt}} RW. RT.{{$dataPasien->rw}}</td>
	</tr>
	<tr>
		<td>Gol. darah</td>
		<td>:</td>
		<td>{{$dataPasien->gol_darah}}</td>
	</tr>
</table>
<div class="barcode">
    {!!$barcode!!}
</div>
    <div class="footer">
        <p style="font-size: 10px">Catatan : Kartu ini wajib dibawa setiap kali berobat ke Puskesmas Cimahi tengah, untuk mempermudah proses administrasi</p>
    </div>
</div>
</body>
</html>
