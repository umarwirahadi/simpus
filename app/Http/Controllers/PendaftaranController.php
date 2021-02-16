<?php

namespace App\Http\Controllers;

use App\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[
            'menu'=>'Transaksi',
            'submenu'=>'Pendaftaran',
            'judul'=>'Pendaftaran Pasien',
            'isDataTable'=>true,
            'isJS'=>'pendaftaran.js',
            'dataItem'=>null
        ];
        return view('pendaftaran.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'menu'=>'Transaksi',
            'submenu'=>'Pendaftaran',
            'submenu2'=>'tambah',
            'aksi'=>'Formulir pendaftaran pasien',
            'judul'=>'Pendaftaran Pasien',
            'isDataTable'=>true,
            'isJS'=>'pendaftaran.js',
            'dataItem'=>null
        ];
        return view('pendaftaran.add',$data);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pesan=[
            'required'=>':attribute wajib diisi',
            'digits'=>':attribute apanjang karakter harus 16 digit'
            ];
        $cekvalidasi=$request->validate([
                                'id_pasien'=>['required'],
                                'poli'=>['required']],$pesan);

        if($cekvalidasi){
            $cekpendaftaran=Pendaftaran::where(['tanggal'=>date('Y-m-d')]);
            if($cekpendaftaran->count()==0){
                $no_pendaftaran=1;
                // proses pembuatan no_rm otomatis
                // set_kode_puskesmas
                // $kode_pkm=KustomHelper::setKodePkm();
                
                $kode=DB::select('SELECT max(noantrian) as noantrian from pendaftarans where tanggal=now() and poli=:poli limit 1',['poli'=>$request->poli]);
                $temp_norm="";
                $temp_norm_fix="";
                foreach ($kode as $kd) {
                    $temp_norm=($kd->no_rm);
                }        
                $jml_digit=intval($temp_norm);                

                switch (strlen($jml_digit)){
                case 1:
                    ++$jml_digit;
                    $temp_norm_fix=$kode_pkm."00000".$jml_digit;
                break;
                case 2:
                    ++$jml_digit;
                    $temp_norm_fix=$kode_pkm."0000".$jml_digit;                
                break;
                case 3:
                    ++$jml_digit;
                    $temp_norm_fix=$kode_pkm."000".$jml_digit;                
                break;
                case 4:
                    ++$jml_digit;
                    $temp_norm_fix=$kode_pkm."00".$jml_digit;                
                break;
                case 5:
                    ++$jml_digit;
                    $temp_norm_fix=$kode_pkm."0".$jml_digit;
                break;
                case 6:
                    ++$jml_digit;
                    $temp_norm_fix=$kode_pkm.$jml_digit;                
                break;
                default:
                    $temp_norm_fix=$kode_pkm."000001";
                }

                $simpanPendaftaran=new Pendaftaran;
                $simpanPendaftaran->no_pendaftaran=$no_pendaftaran;
                $simpanPendaftaran->tanggal=date('Y-m-d');
                $simpanPendaftaran->waktu=$date('h:m:s');
                $simpanPendaftaran->no_rm=$request->no_rm;
                $simpanPendaftaran->poli=$request->poli;
                $simpanPendaftaran->cara_daftar='LANGSUNG';
                $simpanPendaftaran->status=1;
                $simpanPendaftaran->jenis_kelamin=$request->jenis_kelamin;
                $simpanPendaftaran->tempat_lahir=$request->tempat_lahir;
                $simpanPendaftaran->tanggal_lahir=$request->tanggal_lahir;
                $simpanPendaftaran->agama=$request->agama;
                $simpanPendaftaran->gol_darah=$request->gol_darah;
                $simpanPendaftaran->hp=$request->hp;
                $simpanPendaftaran->telp=$request->telp;
                $simpanPendaftaran->email=$request->email;
                $simpanPendaftaran->warganegara='Indonesia';
                $simpanPendaftaran->alamat=$request->alamat;
                $simpanPendaftaran->rt=$request->rt;
                $simpanPendaftaran->rw=$request->rw;
                $simpanPendaftaran->kelurahan=$request->kelurahan;
                $simpanPendaftaran->kecamatan=$request->kecamatan;
                $simpanPendaftaran->kab_kota=$request->kab_kota;
                $simpanPendaftaran->provinsi=$request->provinsi;
                $simpanPendaftaran->pos=$request->pos;
                $simpanPendaftaran->status_marital=$request->status_marital;
                $simpanPendaftaran->pendidikan_terakhir=$request->pendidikan_terakhir;
                $simpanPendaftaran->suku=$request->suku;
                $simpanPendaftaran->pekerjaan=$request->pekerjaan;
                $simpanPendaftaran->nama_ayah=$request->nama_ayah;
                $simpanPendaftaran->nama_ibu=$request->nama_ibu;
                $simpanPendaftaran->penanggung_jawab=$request->penanggung_jawab;
                $simpanPendaftaran->hubungan_dengan_penanggung_jawab=$request->hubungan_dengan_penanggung_jawab;
                $simpanPendaftaran->no_contact_darurat=$request->no_contact_darurat;
                $simpanPendaftaran->status_pasien=$request->status_pasien;
                $simpanPendaftaran->wilayah_kerja=$request->wilayah_kerja;                
                $simpanPendaftaran->save();

                return response()->json(['status'=>1,'message'=>'data pasien berhasil disimpan','data'=>$simpanPendaftaran],200);
            }else{
                
                return response()->json(['status'=>0,'message'=>'Data pasien sudah ada/ ada yang sama, silahkan periksa kembali','data'=>$cekpasien->get()],200);
            }

    
        }else{
            return response()->json(['status'=>0,'message'=>'Proses input data pasien tidak bisa dilanjutkan','data'=>null],200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        //
    }
}
