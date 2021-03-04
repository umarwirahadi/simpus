<?php

namespace App\Http\Controllers;

use App\Pemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


class PemeriksaanController extends Controller
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
            'submenu'=>'Pemeriksaan',
            'judul'=>'Pemeriksaan Pasien',
            'isDataTable'=>true,
            'isJS'=>'pemeriksaan.js',
            'dataItem'=>null
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
        //
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

    public function proses()
    {
        $data=[
            'menu'=>'Transaksi',
            'judul'=>'Pemeriksaan Pasien',
            'submenu'=>'Pemeriksaan',
            'submenu2'=>'proses pemeriksaan pasien',
            'isDataTable'=>true,
            'isJS'=>'pemeriksaan.js',
            'dataItem'=>null
        ];
        return view('pemeriksaan.proses',$data);
    }



    public function setpoli(Request $request)
    {        
        $id_poli=$request->poli;        
        $cookie= cookie('id_poli', $id_poli,86400*30);        
        return response(['status'=>1,'message'=>'data perubahan poli berhasil dilakukan'])->cookie($cookie);        
    }
}
