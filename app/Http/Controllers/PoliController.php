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
    public function __construct()
    {
        $this->middleware('auth');
    }

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
            'submenu2'=>'tambah poli',
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
        $poli->kode             =$request->get('kode')?$request->get('kode'):'';
        $poli->poli             =$request->get('poli')?$request->get('poli'):'';
        $poli->tanggal_aktif    =$request->get('tanggal_aktif')?$request->get('tanggal_aktif'):NULL;
        $poli->status           =$request->get('status')?$request->get('status'):NULL;
        $poli->deskripsi        =$request->get('deskripsi')?$request->get('deskripsi'):'';            
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
        $dataPoli=Poli::find($id);        
        $data=[
            'menu'=>'Master',
            'submenu'=>'poli',
            'submenu2'=>'detail poli',
            'aksi'=>'Data Poli',
            'judul'=>'Data Poli',
            'isDataTable'=>true,
            'isJS'=>'poli.js',
            'data'=>$dataPoli
        ];
        return view('poli.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataPoli=Poli::find($id);        
        $data=[
            'menu'=>'Master',
            'submenu'=>'poli',
            'submenu2'=>'edit poli',
            'aksi'=>'Data Poli',
            'judul'=>'Data Poli',
            'isDataTable'=>true,
            'isJS'=>'poli.js',
            'data'=>$dataPoli
        ];
        return view('poli.edit',$data);
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
        $poli= Poli::findOrFail($id);
        if($poli){
            $poli->kode             =$request->get('kode');
            $poli->poli             =$request->get('poli');
            $poli->tanggal_aktif    =$request->get('tanggal_aktif');
            $poli->status           =$request->get('status');
            $poli->deskripsi        =!empty($request->get('deskripsi'))?$request->get('deskripsi'):'';
            // $poli->kode             =$request->get('kode')?$request->get('kode'):$poli->kode;
            // $poli->poli             =$request->get('poli')?$request->get('poli'):$poli->poli;
            // $poli->tanggal_aktif    =$request->get('tanggal_aktif')?$request->get('tanggal_aktif'):$poli->tanggal_aktif;
            // $poli->status           =$request->get('status')?$request->get('status'):$poli->status;
            // $poli->deskripsi        =$request->get('deskripsi')?$request->get('deskripsi'):$poli->deskripsi;
            $poli->update();
            return response()->json(['status'=>1,'message'=>'data poli berhasil diupdate','data'=>$poli],200);
        }else{
            return redirect()->route('poli.index')->with('status', 'data Poli gagal diupdate');
        }       
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poli= Poli::findOrFail($id);
        if($poli){
            $poli->delete();
            return response()->json(['status'=>1,'message'=>'data poli berhasil dihapus','data'=>null],200);
        }else{
            return redirect()->route('poli.index')->with('status', 'data Poli gagal dihapus');
        }
    }
}
