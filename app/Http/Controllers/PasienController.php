<?php

namespace App\Http\Controllers;

use App\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;


class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[
            'menu'=>'Data',
            'submenu'=>'pasien',
            'judul'=>'Data pasien',
            'isDataTable'=>true,
            'isJS'=>'pasien.js',
            'dataItem'=>null
        ];
        return view('pasien.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'menu'=>'Data',
            'submenu'=>'pasien',
            'submenu2'=>'tambah pasien',
            'aksi'=>'Tambah Pasien',
            'judul'=>'Data item',
            'isDataTable'=>false,
            'isJS'=>'pasien.js',
            'iscss'=>'pasien.css',
            'data'=>null
        ];
        return view('pasien.add',$data);
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
            'digits'=>':attribute apanjang karakter harus sesuai'
            ];
        $cekvalidasi=$request->validate([
                                'nik'=>['required','digits:16'],
                                'nama_lengkap'=>['required'],
                                'tanggal_lahir'=>['required','date'],
                                'alamat'=>['required'],
        ],$pesan);

        if($cekvalidasi){
            $cekpasien=Pasien::where(['nama_lengkap'=>$request->nama_lengkap,'nik'=>$request->nik]);
            if($cekpasien->count()<1){
                // proses pembuatan no_rm otomatis

                $simpanPasien=new Pasien;
                $simpanPasien->nik=$request->nik;
                $simpanPasien->no_kk=$request->no_kk;
                $simpanPasien->status_hubungan=$request->status_hubungan;
                $simpanPasien->no_bpjs=$request->no_bpjs;
                $simpanPasien->no_rm=$request->no_rm;
                $simpanPasien->no_rm_lama=$request->no_rm_lama;
                $simpanPasien->nama_lengkap=$request->nama_lengkap;
                $simpanPasien->jenis_kelamin=$request->jenis_kelamin;
                $simpanPasien->tempat_lahir=$request->tempat_lahir;
                $simpanPasien->tanggal_lahir=$request->tanggal_lahir;
                $simpanPasien->agama=$request->agama;
                $simpanPasien->gol_darah=$request->gol_darah;
                $simpanPasien->hp=$request->hp;
                $simpanPasien->telp=$request->telp;
                $simpanPasien->email=$request->email;
                $simpanPasien->warganegara='Indonesia';
                $simpanPasien->alamat=$request->alamat;
                $simpanPasien->rt=$request->rt;
                $simpanPasien->rw=$request->rw;
                $simpanPasien->kelurahan=$request->kelurahan;
                $simpanPasien->kecamatan=$request->kecamatan;
                $simpanPasien->kab_kota=$request->kab_kota;
                $simpanPasien->provinsi=$request->provinsi;
                $simpanPasien->pos=$request->pos;
                $simpanPasien->status_marital=$request->status_marital;
                $simpanPasien->pendidikan_terakhir=$request->pendidikan_terakhir;
                $simpanPasien->suku=$request->suku;
                $simpanPasien->pekerjaan=$request->pekerjaan;
                $simpanPasien->nama_ayah=$request->nama_ayah;
                $simpanPasien->nama_ibu=$request->nama_ibu;
                $simpanPasien->penanggung_jawab=$request->penanggung_jawab;
                $simpanPasien->hubungan_dengan_penanggung_jawab=$request->hubungan_dengan_penanggung_jawab;
                $simpanPasien->no_contact_darurat=$request->no_contact_darurat;
                $simpanPasien->status_pasien=$request->status_pasien;
                $simpanPasien->wilayah_kerja=$request->wilayah_kerja;                
                $simpanPasien->save();

                return response()->json(['status'=>1,'message'=>'data pasien berhasil disimpan','data'=>$simpanPasien],200);
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
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasien $pasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        //
    }

    public function fetch()
    {
        $pasien=DB::table('pasiens')->get();       

        return Datatables::of($pasien)->make(true);
    }
    
}
