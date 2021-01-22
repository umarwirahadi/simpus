<?php

namespace App\Http\Controllers;

use App\wilayah;
use Illuminate\Http\Request;
use DataTables;

class WilayahController extends Controller
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
            'submenu'=>'Alamat',
            'judul'=>'Data Alamat',
            'isDataTable'=>true,
            'isJS'=>'wilayah.js',
            'dataItem'=>null
        ];
        return view('wilayah.index',$data);
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
     * @param  \App\wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function show(wilayah $wilayah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function edit(wilayah $wilayah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, wilayah $wilayah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function destroy(wilayah $wilayah)
    {
        //
    }


    public function fetch()
    {
        // $wilayah=DB::table('wilayahs')->select('*');
        $wilayah=Wilayah::all();
        // $wilayah=Wilayah::select('id','kel','kec','kotakab','prov','pos');

        // return Datatables()->of($wilayah)->make(true);
        return Datatables()->of($wilayah)->toJson();
    }
}
