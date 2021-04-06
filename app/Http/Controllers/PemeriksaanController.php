<?php

namespace App\Http\Controllers;

use App\Pemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;



class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $data=[
            'menu'=>'Transaksi',
            'submenu'=>'Pemeriksaan',
            'judul'=>'Pemeriksaan Pasien',
            'isDataTable'=>true,
            'isJS'=>'pemeriksaan.js',
            'jumlah'=>DB::table('vpendaftaran')->where(['poli'=>Cookie::get('id_poli'),'tanggal'=>date('Y-m-d')])->count(),
            'jumlahTunggu'=>DB::table('vpendaftaran')->where(['poli'=>Cookie::get('id_poli'),'tanggal'=>date('Y-m-d'),'status'=>1])->count(),
            'jumlahDiperiksa'=>DB::table('vpendaftaran')->where(['poli'=>Cookie::get('id_poli'),'tanggal'=>date('Y-m-d'),'status'=>2])->count(),
            'dataItem'=>DB::table('vpendaftaran')->where(['poli'=>Cookie::get('id_poli'),'tanggal'=>date('Y-m-d')])->get()
        ];
        return view('pemeriksaan.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cekvalidasi=Validator::make($request->all(),
            ['idpasien'=>['required'],'id_pendaftaran'=>['required'],'sistol'=>['required'],
            'diastol'=>['required'],'tekanan_nadi'=>['required'],'respirasi'=>['required'],'suhu'=>['required'],'berat_badan'=>['required'],
            'tinggi_badan'=>['required'],'keluhan_utama'=>['required'],'pemeriksaan_fisik'=>['required'],'anamnesa'=>['required'],
            'terapi'=>['required'],'diagnosa'=>['required'],'keterangan'=>['required']]
        );
        if($cekvalidasi->fails()){           
            return response()->json(['status'=>0,'message'=>'Proses input data pasien tidak bisa dilanjutkan','data'=>$cekvalidasi->errors()],422);
        }else{
            //cek jika pemeriksaan ada harus ditanyakan apakah pasien hanya boleh periksa 1 hari jika lebih pola harus diubah
            $cekpemeriksaan=Pemeriksaan::where(['idpasien'=>$request->idpasien,'tanggal'=>date('Y-m-d')]);
            if($cekpemeriksaan->count()==0){
                $pemeriksaan=new Pemeriksaan;
                $pemeriksaan->idpasien=$request->idpasien;
                $pemeriksaan->id_pendaftaran=$request->id_pendaftaran;
                $pemeriksaan->tanggal=date('Y-m-d');
                $pemeriksaan->jam=date("H:i:s");
                $pemeriksaan->kunjungan=$request->idpasien;
                $pemeriksaan->kasus='kasus euy';
                $pemeriksaan->sistol=$request->sistol;
                $pemeriksaan->diastol=$request->diastol;
                $pemeriksaan->tekanan_nadi=$request->tekanan_nadi;
                $pemeriksaan->respirasi=$request->respirasi;
                $pemeriksaan->suhu=$request->suhu;
                $pemeriksaan->berat_badan=$request->berat_badan;
                $pemeriksaan->tinggi_badan=$request->tinggi_badan;
                $pemeriksaan->keluhan_utama=$request->keluhan_utama;
                $pemeriksaan->pemeriksaan_fisik=$request->pemeriksaan_fisik;
                $pemeriksaan->anamnesa=$request->anamnesa;
                $pemeriksaan->terapi=$request->terapi;
                $pemeriksaan->diagnosa=$request->diagnosa;
                $pemeriksaan->keterangan=$request->keterangan;
                $pemeriksaan->id_petugas='Umar Wirahadi';
                $pemeriksaan->status=1;
                $pemeriksaan->save();
                return response()->json(['status'=>1,'message'=>'data pemeriksaan tidak ada','data'=>null],200);
            }
            else{
                $isexist=$cekpemeriksaan->first();
                $updatepemeriksaan=Pemeriksaan::find($isexist->id);    
                $updatepemeriksaan->idpasien=$request->idpasien;
                $updatepemeriksaan->id_pendaftaran=$request->id_pendaftaran;
                $updatepemeriksaan->tanggal=date('Y-m-d');
                $updatepemeriksaan->jam=date("H:i:s");
                $updatepemeriksaan->kunjungan=$request->idpasien;
                $updatepemeriksaan->kasus=$request->idpasien;
                $updatepemeriksaan->sistol=$request->sistol;
                $updatepemeriksaan->diastol=$request->diastol;
                $updatepemeriksaan->tekanan_nadi=$request->tekanan_nadi;
                $updatepemeriksaan->respirasi=$request->respirasi;
                $updatepemgiteriksaan->suhu=$request->suhu;
                $updatepemeriksaan->berat_badan=$request->berat_badan;
                $updatepemeriksaan->tinggi_badan=$request->tinggi_badan;
                $updatepemeriksaan->keluhan_utama=$request->keluhan_utama;
                $updatepemeriksaan->pemeriksaan_fisik=$request->pemeriksaan_fisik;
                $updatepemeriksaan->anamnesa=$request->anamnesa;
                $updatepemeriksaan->terapi=$request->terapi;
                $updatepemeriksaan->diagnosa=$request->diagnosa;
                $updatepemeriksaan->keterangan=$request->keterangan;
                $updatepemeriksaan->id_petugas='Umar Wirahadi update';
                $updatepemeriksaan->status=1;     
                $updatepemeriksaan->update();
                return response()->json(['status'=>1,'message'=>'data pemeriksaan ada ','data'=>$updatepemeriksaan],200);
            }                   
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemeriksaan $pemeriksaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemeriksaan $pemeriksaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemeriksaan $pemeriksaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemeriksaan $pemeriksaan)
    {
        //
    }

 

    public function proses(Request $request)
    {
        $data=[
            'menu'=>'Transaksi',
            'judul'=>'Pemeriksaan Pasien',
            'submenu'=>'Pemeriksaan',
            'submenu2'=>'proses pemeriksaan pasien',
            'isDataTable'=>true,
            'isJS'=>'pemeriksaan.js',
            'dataItem'=>DB::table('vpendaftaran')->where(['id'=>$request->idpemeriksaan,'tanggal'=>date('Y-m-d')])->first(),
            'pemeriksaan'=>Pemeriksaan::where('id', $request->idpemeriksaan)->first(),
            'dataRiwayatPeriksa'=>DB::table('pemeriksaans')->join('vpendaftaran',function($join){
                $join->on('pemeriksaans.id_pendaftaran','=','vpendaftaran.no_pendaftaran');
                $join->on('pemeriksaans.tanggal','=','vpendaftaran.tanggal');
                })
                ->select(['pemeriksaans.id','pemeriksaans.idpasien','pemeriksaans.id_pendaftaran','pemeriksaans.tanggal','pemeriksaans.diagnosa','vpendaftaran.usia_tahun','vpendaftaran.usia_bulan','vpendaftaran.usia_hari'])
                ->where('pemeriksaans.idpasien',$request->idpasien)
                ->orderBy('pemeriksaans.tanggal', 'desc')
                ->get()
        ];
        return view('pemeriksaan.proses',$data);
    }



    public function setpoli(Request $request)
    {        
        $id_poli=$request->poli;        
        $cookie= cookie('id_poli', $id_poli,86400*30);        
        return response(['status'=>1,'message'=>'data perubahan poli berhasil dilakukan'])->cookie($cookie);        
    }

    public function riwayatperiksa(Request $request)
    {
        # code...
    }
}
