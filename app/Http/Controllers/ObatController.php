<?php

namespace App\Http\Controllers;

use App\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use KustomHelper;

class ObatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {       
        $data=[            
            'isJS'=>'obat.js',
            'menu'=>'data',
            'submenu'=>'obat',
            'judul'=>'data obat',
            'isDataTable'=>true,
            'dataItem'=>null
        ];
        return view('obat.index',$data);        
    }

   
    public function create()
    {
        $data=[
            'menu'=>'data',
            'submenu'=>'obat',
            'submenu2'=>'tambah',
            'aksi'=>'data obat',
            'judul'=>'data obat',
            'isDataTable'=>true,
            'isJS'=>'obat.js',
            'dataItem'=>null
        ];
        return view('obat.add',$data);
    }


    public function store(Request $request)
    {
        if($request->ajax()){
            $cekvalidasi=$request->validate(
            [
            'kode'=>['required','unique:obats,kode'],
            'nama_obat'=>['required']]
            );            
                $saveObat=new Obat();                
                $saveObat->kode                  =$request->kode;
                $saveObat->nama_obat             =$request->nama_obat;
                $saveObat->jenis                 =$request->jenis;
                $saveObat->satuan                =$request->satuan;
                $saveObat->harga                 =$request->harga;
                $saveObat->stok_awal             =0;
                $saveObat->sisa_stok             =0;
                $saveObat->keterangan            =$request->keterangan;
                $saveObat->status                =$request->status;
                $saveObat->save();
                if($saveObat){
                    return response()->json(['status'=>1,'message'=>'data obat berhasil disimpan','data'=>$saveObat],200);
                }else{
                    return response()->json(['status'=>0,'message'=>'data obat gagal disimpan','data'=>null],200);
                }    
        }else{
            redirect('/obat');
        }
    }

  
    public function show(Obat $obat)
    {  
        return view('obat.show',compact('obat'))->renderSections()['content'];                 
    }


    public function edit(Obat $obat)
    {
        if($obat){
            return response()->json(['status'=>1,'message'=>'data obat ditemukan','data'=>$obat],200);
        }else{
            return response()->json(['status'=>0,'message'=>'data obat tidak ditemukan','data'=>null],200);
        }         
    }

  
    public function update(Request $request, Obat $obat)
    {
        if($request->ajax()){
            $obat->kode=$request->edit_kode;
            $obat->nama_obat=$request->edit_nama_obat;
            $obat->jenis=$request->edit_jenis;
            $obat->satuan=$request->edit_satuan;
            $obat->harga=$request->edit_harga;
            $obat->stok_awal=$request->edit_stok_awal;
            $obat->sisa_stok=$request->edit_sisa_stok;
            $obat->keterangan=$request->edit_keterangan;
            $obat->status=$request->edit_status;
            $obat->update();        
            if($obat){
                return response()->json(['status'=>1,'message'=>'data obat berhasil diupdate','data'=>$obat],200);
            }else{
                return response()->json(['status'=>0,'message'=>'data obat gagal diupdate','data'=>null],200);
            }
        }else{
            redirect('/obat');
        }       
    }


    public function destroy(Obat $obat)
    {
        if($obat){
            $cekPenerimaan=DB::table('penerimaanobats')->where('id_obat','=',$obat->id)->count('id');
            if($cekPenerimaan==0){                
                $obat->delete();
                return response()->json(['status'=>1,'message'=>'data obat berhasil dihapus','data'=>$cekPenerimaan],200);
            }else{
                return response()->json(['status'=>0,'message'=>'data obat gagal dihapus, periksa penerimaan obat','data'=>null],200);            
            }
        }else{
            return redirect('obat');
        }
    }
    
    
    public function fetch()
    {
        $pasien=DB::table('obats')->select('id','kode','nama_obat','jenis','satuan','sisa_stok')->get();
        return Datatables::of($pasien)
                        ->addIndexColumn()
                        ->addColumn('aksi', function($obat){
                            $btn='<div class="btn-group">
                            <button type="button" class="btn btn-success btn-sm" data-toggle="dropdown" aria-expanded="false">
                              <i class="fa fa-arrow-circle-down"></i>
                            </button>                                
                            <div class="dropdown-menu bg-gray" role="menu" style="">
                              <a class="dropdown-item show-obat" href="javascript:void(0)" value="obat/'.$obat->id.'" title="show obat"><i class="fa fa-stethoscope"></i> Show</a>
                              <a class="dropdown-item edit-obat" href="javascript:void(0)" data-id="'.$obat->id.'" title="Edit obat" data-toggle="modal" data-target="#modalMd-obat-edit"><i class="fa fa-eye"></i> Edit</a>
                              <a class="dropdown-item delete-obat"  href="javascript:void(0)" data-id="'.$obat->id.'"><i class="fa fa-times-circle"></i> Delete</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item show-penerimaan-obat" href="penerimaanObat/'.$obat->id.'" ><i class="fa fa-sync-alt"></i> Penerimaan Obat</a>
                            </div>
                          </div>';                        
                            return $btn;
                        })
                        ->rawColumns(['aksi'])
                        ->toJson();
    }
}
