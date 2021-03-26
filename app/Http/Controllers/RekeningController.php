<?php

namespace App\Http\Controllers;

use App\Rekening;
use Illuminate\Http\Request;

class RekeningController extends Controller
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
        $dataRekening=Rekening::all()->sortBy('jenis');
        $data=[
            'menu'=>'Master',
            'submenu'=>'rekening',
            'judul'=>'Data rekening',
            'isDataTable'=>true,
            'isJS'=>'rekening.js',
            'dataRekening'=>$dataRekening
        ];
        return view('rekening.index',$data);
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
            'submenu'=>'rekening',
            'submenu2'=>'tambah rekening',
            'aksi'=>'data rekening',
            'isDataTable'=>false,
            'isJS'=>'rekening.js',
            'data'=>null
        ];
        return view('rekening.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cekRekening=Rekening::where('kode_rekening',$request->kode_rekening)->count();
           
        if($cekRekening==0){            
            $rekening=new Rekening;
            $rekening->kode_rekening    =$request->kode_rekening;
            $rekening->nama_rekening    =$request->nama_rekening;
            $rekening->jenis            =$request->jenis;
            $rekening->biaya            =$request->biaya;        
            $rekening->jenis_biaya      =$request->jenis_biaya;
            $rekening->satuan           =$request->satuan;
            $rekening->status           =$request->status;        
            $rekening->deskripsi        =$request->deskripsi;        
            $rekening->save();
            return response()->json(['status'=>1,'message'=>'data rekening berhasil disimpan','data'=>$rekening],200);
        }else{
            return response()->json(['status'=>0,'message'=>'data rekening sudah ada, silahkan ganti dengan kode yang lain','data'=>null],200);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showrekening=Rekening::findOrFail($id);
        $data=[
            'menu'=>'Master',
            'submenu'=>'rekening',
            'submenu2'=>'Show rekening',
            'aksi'=>'data rekening',
            'isDataTable'=>false,
            'isJS'=>'rekening.js',
            'data'=>$showrekening
        ];

        return response()->json($data,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rekening=Rekening::find($id);
        $data=[
            'menu'=>'Master',
            'submenu'=>'rekening',
            'submenu2'=>'edit rekening',
            'aksi'=>'Data rekening',
            'judul'=>'Data rekening',
            'isDataTable'=>true,
            'isJS'=>'rekening.js',
            'data'=>$rekening
        ];
        return view('rekening.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rek= Rekening::find($id);
        if($rek){
            $rek->kode_rekening         =$request->kode_rekening;
            $rek->nama_rekening         =$request->nama_rekening;
            $rek->jenis                 =$request->jenis;
            $rek->biaya                 =$request->biaya;
            $rek->jenis_biaya           =$request->jenis_biaya;
            $rek->satuan                =$request->satuan;
            $rek->status                =$request->status;
            $rek->deskripsi             =$request->deskripsi;
            $rek->update();
            return response()->json(['status'=>1,'message'=>'data rekening berhasil diupdate','data'=>$rek],200);
        }else{
            return redirect()->route('item.index')->with('status', 'data rekening gagal diupdate');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rekening= Rekening::findOrFail($id);
        if($rekening){
            $rekening->delete();
            return response()->json(['status'=>1,'message'=>'data rekening berhasil dihapus','data'=>null],200);
        }else{
            return redirect()->route('rekening.index')->with('status', 'data rekening gagal dihapus');
        }
    }
}
