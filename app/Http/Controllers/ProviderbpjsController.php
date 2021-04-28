<?php

namespace App\Http\Controllers;

use App\Providerbpjs;
use Illuminate\Http\Request;
use KustomHelper;

class ProviderbpjsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data=[            
            'isJS'=>'pendaftaran.js',
            'menu'=>'master',
            'submenu'=>'Faskes BPJS',
            'judul'=>'Data Faskes',
            'isDataTable'=>true,
            'datafaskes'=>Providerbpjs::all()
        ];
        return view('faskes.index',$data);
    }

 
    public function create()
    {
        
        
        
    }

   
    public function store(Request $request)
    {
        $tampung=KustomHelper::callAPI('GET','https://dvlp.bpjs-kesehatan.go.id:9081/pcare-rest-v3.0/provider/0/100');        
        $temp=[];
        foreach ($tampung['response']['list'] as $key) {
            $temp[]=array('kdProvider'=>$key['kdProvider'],'nmProvider'=>$key['nmProvider'],'created_at'=>date('Y-m-d H:i:s'));
        }        
        $result=Providerbpjs::insert($temp);
        if($result){
            return response()->json(['status'=>0,'message'=>'data berhasil disimpan','data'=>null],200);        
        }else{
            return response()->json(['status'=>0,'message'=>'data gagal disimpan','data'=>null],200);                
        }                
}

 
    public function show(Providerbpjs $providerbpjs)
    {
        //
    }

   
    public function edit(Providerbpjs $providerbpjs)
    {
        //
    }


    public function update(Request $request, Providerbpjs $providerbpjs)
    {
        //
    }

  
    public function destroy($id)
    {
        $providerbpjs= Providerbpjs::findOrFail($id);
        if($providerbpjs){
            $providerbpjs->delete();
            return response()->json(['status'=>1,'message'=>'data berhasil dihapus','data'=>null],200);
        }else{
            return redirect()->route('pasien.index')->with('status', 'data gagal dihapus');
        }
    }
}
