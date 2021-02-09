<?php

namespace App\Http\Controllers;

use App\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $wilayah=Wilayah::where('kotakab','CIMAHI')->get();
            // $wilayah=DB::table('wilayahs')->where('kotakab','CIMAHI')->get();
            return response()->json($wilayah);
    
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
            // $wilayah=DB::table('wilayahs')->where('kotakab','CIMAHI')->get();       
        $wilayah=DB::table('wilayahs')->where('kotakab','CIMAHI')->get();       

        return Datatables::of($wilayah)->make(true);
    }

    public function finddata(Request $request)    
    {
        if($request->search){
            $wilayah=DB::table('wilayahs')
                        ->select('kel','kec','kotakab','prov','pos')
                        ->where('kel','like','%'.$request->search.'%')
                        ->orWhere('kec','like','%'.$request->search.'%')
                        ->orWhere('kotakab','like','%'.$request->search.'%')
                        ->limit(10)
                        ->get();
            $temp=array();
            foreach ($wilayah as $value) {
                $temp[]=array('label'=>$value->kel.' - '.$value->kec.' - '.$value->kotakab.'- '.$value->prov.' - '.$value->pos,'value'=>$value->kel,'kel'=>$value->kel,
                                'kec'=>$value->kec,'kotakab'=>$value->kotakab,'prov'=>$value->prov,'pos'=>$value->pos);
            }
            
            return response()->json($temp);
        }

    }

}
