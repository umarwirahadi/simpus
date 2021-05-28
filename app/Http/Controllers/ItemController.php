<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Illuminate\Support\Facades\DB;
use KustomHelper;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $dataItem=Item::all()->sortBy('kategori');
        $data=[
            'menu'=>'Master',
            'submenu'=>'item',
            'judul'=>'Data item',
            'isDataTable'=>true,
            'isJS'=>'item.js',
            'dataItem'=>$dataItem
        ];
        return view('item.index',$data);
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
            'submenu'=>'item',
            'submenu2'=>'tambah item',
            'aksi'=>'Data item',
            'isDataTable'=>false,
            'isJS'=>'item.js',
            'data'=>null
        ];
        return view('item.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item=new Item;
        $item->kode=!empty($request->get('kode'))?$request->get('kode'):'';
        $item->item=!empty($request->get('item'))?$request->get('item'):'';
        $item->kategori=!empty($request->get('kategori'))?$request->get('kategori'):'';
        $item->status=!empty($request->get('status'))?$request->get('status'):'';        
        $item->save();
        return redirect()->route('item.index')->with('status', 'data item berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataItem=Item::find($id);        
        $data=[
            'menu'=>'Master',
            'submenu'=>'item',
            'submenu2'=>'show item',
            'aksi'=>'Data Item',
            'judul'=>'Data item',
            'isDataTable'=>true,
            'isJS'=>'item.js',
            'data'=>$dataItem
        ];
        return view('item.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataItem=Item::find($id);        
        $data=[
            'menu'=>'Master',
            'submenu'=>'item',
            'submenu2'=>'edit item',
            'aksi'=>'Data Item',
            'judul'=>'Data item',
            'isDataTable'=>true,
            'isJS'=>'item.js',
            'data'=>$dataItem
        ];
        return view('item.edit',$data);
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
        $item= Item::findOrFail($id);
        if($item){
            $item->kategori         =$request->get('kategori');
            $item->kode             =$request->get('kode');
            $item->item             =$request->get('item');
            $item->status           =$request->get('status');
            $item->update();
            return response()->json(['status'=>1,'message'=>'data item berhasil diupdate','data'=>$item],200);
        }else{
            return redirect()->route('item.index')->with('status', 'data Poli gagal diupdate');
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
        $item= Item::findOrFail($id);
        if($item){
            $item->delete();
            return response()->json(['status'=>1,'message'=>'data item berhasil dihapus','data'=>null],200);
        }else{
            return redirect()->route('item.index')->with('status', 'data item gagal dihapus');
        }
    }
    
    public function getdatapcare(Request $request)
    {                                             
    if($request->ajax()){
        $temp_result=[];
        $tampung=KustomHelper::callAPI('GET','https://dvlp.bpjs-kesehatan.go.id:9081/pcare-rest-v3.0/statuspulang/rawatInap/true');
        if($tampung['metaData']['code']==200){            
            $listdata=$tampung['response']['list'];
            foreach ($listdata as $key) {
                if(DB::table('items')->where('kode', $key['kdStatusPulang'])
                                    ->where('item',$key['nmStatusPulang'])
                                    ->where('kategori','status-pulang')
                                    ->doesntExist()){
                                        DB::table('items')->insert(['kode'=>$key['kdStatusPulang'],'item'=>$key['nmStatusPulang'],'kategori'=>'status-pulang','status'=>'1','created_at'=>date('y-m-d h:m:s')]);                                    
                                    }                
            }                        
            // return response()->json(['status'=>1,'message'=>'data berhasil diambil dari P-Care','data'=>null],200); 
            $temp_result[]=['status_pulang'=>1];
        }else{
            return response()->json(['status'=>0,'message'=>'data gagal diambil dari P-care','data'=>null],200);                
        } 
        
        $tampung=KustomHelper::callAPI('GET','https://dvlp.bpjs-kesehatan.go.id:9081/pcare-rest-v3.0/spesialis');
        if($tampung['metaData']['code']==200){            
            $listdata=$tampung['response']['list'];
            foreach ($listdata as $key) {
                if(DB::table('items')->where('kode', $key['kdSpesialis'])
                                    ->where('item',$key['nmSpesialis'])
                                    ->where('kategori','spesialis')
                                    ->doesntExist()){
                                        DB::table('items')->insert(['kode'=>$key['kdSpesialis'],'item'=>$key['nmSpesialis'],'kategori'=>'spesialis','status'=>'1','created_at'=>date('y-m-d h:m:s')]);
                                    }                
            }                        
            // return response()->json(['status'=>1,'message'=>'data berhasil diambil dari P-Care','data'=>null],200); 
            $temp_result[]=['spesialis'=>1];
        }else{
            return response()->json(['status'=>0,'message'=>'data gagal diambil dari P-care','data'=>null],200);                
        } 
        
        $tampung=KustomHelper::callAPI('GET','https://dvlp.bpjs-kesehatan.go.id:9081/pcare-rest-v3.0/kesadaran');
        if($tampung['metaData']['code']==200){            
            $listdata=$tampung['response']['list'];
            foreach ($listdata as $key) {
                if(DB::table('items')->where('kode', $key['kdSadar'])
                                    ->where('item',$key['nmSadar'])
                                    ->where('kategori','kesadaran')
                                    ->doesntExist()){
                                        DB::table('items')->insert(['kode'=>$key['kdSadar'],'item'=>$key['nmSadar'],'kategori'=>'kesadaran','status'=>'1','created_at'=>date('y-m-d h:m:s')]);
                                    }                
            }                        
            // return response()->json(['status'=>1,'message'=>'data berhasil diambil dari P-Care','data'=>null],200); 
            $temp_result[]=['kesadaran'=>1];
        }else{
            return response()->json(['status'=>0,'message'=>'data gagal diambil dari P-care','data'=>null],200);                
        } 
        
        return response()->json(['status'=>1,'message'=>'data berhasil diambil dari P-care','data'=>$temp_result],200);                
        
    }else{
        redirect('/item');
    }
    }

 
}
