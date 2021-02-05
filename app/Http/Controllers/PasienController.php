<?php

namespace App\Http\Controllers;

use App\Pasien;
use Illuminate\Http\Request;

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
                                'nik'=>'required|digits:16',
                                'nama_lengkap'=>['required'],
                                'tanggal_lahir'=>['required','date'],
                                'nik'=>['required'],
        ],$pesan);

        if($cekvalidasi){
            $cekpasien=Pasien::where(['nama_lengkap'=>$request->nama_lengkap,'nik'=>$request->nik]);
            if($cekpasien->count()<1){
                return response()->json(['status'=>1,'message'=>'proses berlanjut','data'=>$cekpasien->get()],200);
            }else{
                
                return response()->json(['status'=>0,'message'=>'Data pasien sudah ada/ ada yang sama, silahkan periksa kembali','data'=>$cekpasien->get()],200);
            }

    
        }else{
            return response()->json(['status'=>0,'message'=>'Proses input data pasien tidak bisa dilanjutkan','data'=>null],200);
        }
        

        
        
        // if($cekpasien){            
        //     $pasienBaru=new Pasien;
        //     $pasienBaru->id         =$request->id;
        //     $pasienBaru->nik        =$request->nik;
        //     $pasienBaru->no_kk      =$request->no_kk;
        //     $pasienBaru->status_hubungan=$request->status_hubungan;
        //     $pasienBaru->no_bpjs=$request->no_bpjs;
        //     $pasienBaru->no_rm=$request->no_rm;
        //     $pasienBaru->no_rm_lama=$request->no_rm_lama;
        //     $pasienBaru->nama_lengkap=$request->nama_lengkap;
        //     $pasienBaru->jenis_kelamin=$request->jenis_kelamin;
        //     $pasienBaru->tempat_lahir=$request->tempat_lahir;
        //     $pasienBaru->tanggal_lahir=$request->tanggal_lahir;
        //     $pasienBaru->agama=$request->agama;
        //     $pasienBaru->gol_darah=$request->gol_darah;
        //     $pasienBaru->hp=$request->hp;
        //     $pasienBaru->telp=$request->telp;
        //     $pasienBaru->email=$request->email;
        //     $pasienBaru->warganegara=$request->warganegara;
        //     $pasienBaru->alamat=$request->alamat;
        //     $pasienBaru->rt=$request->rt;
        //     $pasienBaru->rw=$request->rw;
        //     $pasienBaru->kelurahan=$request->kelurahan;
        //     $pasienBaru->kecamatan=$request->kecamatan;
        //     $pasienBaru->kab_kota=$request->kab_kota;
        //     $pasienBaru->provinsi=$request->provinsi;
        //     $pasienBaru->pos=$request->pos;
        //     $pasienBaru->status_marital=$request->status_marital;
        //     $pasienBaru->pendidikan_terakhir=$request->pendidikan_terakhir;
        //     $pasienBaru->suku=$request->suku;
        //     $pasienBaru->pekerjaan=$request->pekerjaan;
        //     $pasienBaru->nama_ayah=$request->nama_ayah;
        //     $pasienBaru->nama_ibu=$request->nama_ibu;
        //     $pasienBaru->penanggung_jawab=$request->penanggung_jawab;
        //     $pasienBaru->hubungan_dengan_penanggung_jawab=$request->hubungan_dengan_penanggung_jawab;
        //     $pasienBaru->no_contact_darurat=$request->no_contact_darurat;
        //     $pasienBaru->status_pasien=$request->status_pasien;
        //     $pasienBaru->wilayah_kerja=$request->wilayah_kerja;
        //     $pasienBaru->created_at=$request->created_at;
        //     $pasienBaru->updated_at=$request->updated_at;

        //     // $pasienBaru->kode_rekening    =$request->kode_rekening;
        //     // $pasienBaru->nama_rekening    =$request->nama_rekening;
        //     // $pasienBaru->jenis            =$request->jenis;
        //     // $pasienBaru->biaya            =$request->biaya;        
        //     // $pasienBaru->status           =$request->status;        
        //     // $pasienBaru->deskripsi        =$request->deskripsi;        
        //     $pasienBaru->save();
        //     return response()->json(['status'=>1,'message'=>'data pasien berhasil disimpan','data'=>$pasienBaru],200);
        // }else{
        //     return response()->json(['status'=>0,'message'=>'data pasien sudah ada, silahkan ganti dengan kode yang lain','data'=>null],200);
        // }
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
}
