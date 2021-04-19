<?php

namespace App\Http\Controllers;

use App\Pcaresetting;
use Illuminate\Http\Request;

class PcaresettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataSetting=Pcaresetting::all()->sortBy('id');
        $data=[
            'menu'=>'Master',
            'submenu'=>'setting Pcare',
            'judul'=>'Data Setting Pcare',
            'isDataTable'=>true,
            'isJS'=>'simpus.js',
            'dataItem'=>$dataSetting
        ];
        return view('bridgingpcare.index',$data);
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
            'submenu'=>'setting Pcare',
            'submenu2'=>'tambah',
            'aksi'=>'Tambah Data Setting Pcare',
            'isDataTable'=>false,
            'isJS'=>'simpus.js',
            'data'=>null
        ];
        return view('bridgingpcare.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addNew=new Pcaresetting;
        $addNew->username_pcare         =!empty($request->username_pcare)?$request->username_pcare:'';
        $addNew->password_pcare         =!empty($request->password_pcare)?$request->password_pcare:'';
        $addNew->consumen_pcare         =!empty($request->consumen_pcare)?$request->consumen_pcare:'';
        $addNew->secretkey_pcare        =!empty($request->secretkey_pcare)?$request->secretkey_pcare:'';
        $addNew->timestamp_pcare        =!empty($request->timestamp_pcare)?$request->timestamp_pcare:'';
        $addNew->signature_pcare        =!empty($request->signature_pcare)?$request->signature_pcare:'';
        $addNew->authorization_pcare    =!empty($request->authorization_pcare)?$request->authorization_pcare:'';
        $addNew->aplicationcode_pcare   =!empty($request->aplicationcode_pcare)?$request->aplicationcode_pcare:'';
        $addNew->description            =!empty($request->description)?$request->description:'';
        $addNew->status                 =!empty($request->data_status)?$request->data_status:'';
        $addNew->id_petugas             =\Auth::user()->id;              
        $addNew->save();
        return redirect()->route('settingpcare.index')->with('status', 'data setting Pcare berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pcaresetting  $pcaresetting
     * @return \Illuminate\Http\Response
     */
    public function show(Pcaresetting $pcaresetting)
    {
        $data=[
            'menu'=>'Master',
            'submenu'=>'setting pcare',
            'submenu2'=>'show setting',
            'aksi'=>'Data Item',
            'judul'=>'Data item',
            'isDataTable'=>true,
            'isJS'=>'item.js',
            'data'=>$pcaresetting
        ];
        return view('bridgingpcare.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pcaresetting  $pcaresetting
     * @return \Illuminate\Http\Response
     */
    public function edit(Pcaresetting $pcaresetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pcaresetting  $pcaresetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pcaresetting $pcaresetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pcaresetting  $pcaresetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $dataSetingPcare= Pcaresetting::findOrFail($request->id);
        if($dataSetingPcare){
            $dataSetingPcare->delete();
            return response()->json(['status'=>1,'message'=>'data berhasil dihapus','data'=>null],200);
        }else{
            return redirect()->route('settingpcare.index')->with('status', 'data gagal dihapus');
        }
    }
}
