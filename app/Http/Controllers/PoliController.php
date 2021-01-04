<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poli;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[
            'menu'=>'Master',
            'submenu'=>'poli',
            'judul'=>'Data Poli',
            'isDataTable'=>true,
            'isJS'=>'poli.js',
            'datapoli'=>$poli=Poli::all()
        ];
        return view('poli.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $data=[
            'menu'=>'Master',
            'submenu'=>'poli',
            'aksi'=>'Tambah poli',
            'judul'=>'Data Poli',
            'isDataTable'=>true,
            'isJS'=>'poli.js',
            'data'
        ];
        return view('poli.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $poli=new Poli;
        $poli->kode=$request->get('kode');
        $poli->poli=$request->get('poli');
        $poli->status=$request->get('status');
        $poli->tanggal_aktif=$request->get('tanggal_aktif');
        $poli->deskripsi=$request->get('deskripsi');
        $poli->save();
        return redirect()->route('poli.index')->with('status', 'data Poli berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
