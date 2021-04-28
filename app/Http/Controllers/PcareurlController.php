<?php

namespace App\Http\Controllers;

use App\Pcareurl;
use Illuminate\Http\Request;

class PcareurlController extends Controller
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
            'submenu'=>'pcare / endpoint',
            'judul'=>'Data pasien',
            'isDataTable'=>true,
            'isJS'=>'pasien.js',
            'ismodal'=>'pasien.show',
            'dataItem'=>Pcareurl::all()
        ];
        return view('pcareurl.index',$data);
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
            'submenu'=>'pcare / endpoint',
            'submenu2'=>'tambah endpoint',
            'aksi'=>'tambah endpoint',
            'judul'=>'endpoint pcare',
            'isDataTable'=>false,
            'isJS'=>'pasien.js',
            'iscss'=>'pasien.css',
            'data'=>null
        ];
        return view('pcareurl.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){               
        $validateData=$request->validate([
        'endpoint'=>'required',
        'domain'=>'required',
        'method'=>'required',
        'status'=>'required'
        ]);
       
        $dataendpoint= new Pcareurl;
        $dataendpoint->endpoint     =$request->endpoint;
        $dataendpoint->domain       =$request->domain;
        $dataendpoint->method       =$request->method;
        $dataendpoint->description  =$request->description;
        $dataendpoint->status       =$request->status;
        $dataendpoint->id_user      =\Auth::user()->id;
        $dataendpoint->save();

        return response()->json(['status'=>1,'message'=>'data berhasil disimpan','data'=>$dataendpoint],200); 
        }else{
            
            return redirect()->action([PcareurlController::class, 'index']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pcareurl  $pcareurl
     * @return \Illuminate\Http\Response
     */
    public function show(Pcareurl $pcareurl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pcareurl  $pcareurl
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=[
            'menu'=>'Master',
            'submenu'=>'pcare / endpoint',
            'submenu2'=>'edit endpoint',
            'aksi'=>'edit endpoint',
            'isDataTable'=>false,
            'dataurl'=>$data1=Pcareurl::find($id)
        ];
        return view('pcareurl.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pcareurl  $pcareurl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->ajax()){               
            $request->validate([
            'endpoint'=>'required',
            'domain'=>'required',
            'method'=>'required',
            'status'=>'required'
            ]);
            $updatedata= Pcareurl::find($id);
            $updatedata->endpoint     =$request->endpoint;
            $updatedata->domain       =$request->domain;
            $updatedata->method       =$request->method;
            $updatedata->description  =$request->description;
            $updatedata->status       =$request->status;
            $updatedata->update();
            return response()->json(['status'=>1,'message'=>'data berhasil diupdate','data'=>$updatedata],200); 
            }else{
                
                return redirect()->action([PcareurlController::class, 'index']);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pcareurl  $pcareurl
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $delete=Pcareurl::find($id);
            $delete->delete();
            return response()->json(['status'=>1,'message'=>'data berhasil dihapus','data'=>$delete],200);
    }
}
