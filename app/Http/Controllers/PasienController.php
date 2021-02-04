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
        $cekpasien=Pasien::where(['nama_lengkap'=>$request->kode_rekening,'tanggal_lahir'=>$request->tanggal_lahir])->get();
        
    
        if($cekpasien){            
            $pasienBaru=new Pasien;
            // $pasienBaru->kode_rekening    =$request->kode_rekening;
            // $pasienBaru->nama_rekening    =$request->nama_rekening;
            // $pasienBaru->jenis            =$request->jenis;
            // $pasienBaru->biaya            =$request->biaya;        
            // $pasienBaru->status           =$request->status;        
            // $pasienBaru->deskripsi        =$request->deskripsi;        
            $pasienBaru->save();
            return response()->json(['status'=>1,'message'=>'data pasien berhasil disimpan','data'=>$pasienBaru],200);
        }else{
            return response()->json(['status'=>0,'message'=>'data pasien sudah ada, silahkan ganti dengan kode yang lain','data'=>null],200);
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
}
