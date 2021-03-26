<?php

namespace App\Http\Controllers;

use App\Pendaftaran;
use App\Exports\PendaftaranExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use DataTables;


class PendaftaranController extends Controller
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
            'menu'=>'Transaksi',
            'submenu'=>'Pendaftaran',
            'judul'=>'Pendaftaran Pasien',
            'isDataTable'=>true,
            'isJS'=>'pendaftaran.js',
            'dataItem'=>null
        ];
        return view('pendaftaran.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'menu'=>'Transaksi',
            'submenu'=>'Pendaftaran',
            'submenu2'=>'tambah',
            'aksi'=>'Formulir pendaftaran pasien',
            'judul'=>'Pendaftaran Pasien',
            'isDataTable'=>true,
            'isJS'=>'pendaftaran.js',
            'printJS'=>true,
            'dataItem'=>null
        ];
        return view('pendaftaran.add',$data);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cekvalidasi=Validator::make($request->all(),
            ['id_pasien2'=>['required']]
        );
        if($cekvalidasi->fails()){           
            return response()->json(['status'=>0,'message'=>'Proses input data pasien tidak bisa dilanjutkan','data'=>$cekvalidasi->errors()],422);
        }else{
            $cekpendaftaran=Pendaftaran::where(['tanggal'=>date('Y-m-d')]);
            if($cekpendaftaran->count()==0){
                $no_pendaftaran=1;
            }
            else{
                $no_pendaftaran=$cekpendaftaran->count();
                ++$no_pendaftaran;
            }                
                $lastQueues=Pendaftaran::where(['poli'=>$request->poli,'tanggal'=>date('Y-m-d')])->max('noantrian');                
                if($lastQueues==0){
                    $tempLasQueueFix=1;   
                }else{                          
                    $tempLasQueueFix=intval($lastQueues);                
                    ++$tempLasQueueFix;
                }
                $simpanPendaftaran=new Pendaftaran;
                $simpanPendaftaran->no_pendaftaran      =$no_pendaftaran;
                $simpanPendaftaran->noantrian           =$tempLasQueueFix;
                $simpanPendaftaran->tanggal             =date('Y-m-d');
                $simpanPendaftaran->waktu               =date("H:i:s");
                $simpanPendaftaran->idpasien            =$request->id_pasien2;
                $simpanPendaftaran->no_rm               =$request->no_rm;
                $simpanPendaftaran->usia_tahun          =$request->usia_tahun;
                $simpanPendaftaran->usia_bulan          =$request->usia_bulan;
                $simpanPendaftaran->usia_hari           =$request->usia_hari;
                $simpanPendaftaran->poli                =$request->poli;
                $simpanPendaftaran->cara_daftar         =$request->cara_daftar;
                $simpanPendaftaran->status              =1;
                $simpanPendaftaran->deskripsi           =$request->deskripsi;
                $simpanPendaftaran->save();
                return response()->json(['status'=>1,'message'=>'data pasien berhasil disimpan','data'=>$simpanPendaftaran],200);
            }               
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftaran $pendaftaran)
    {
        if($pendaftaran){
            $vpendaftaran=DB::table('vpendaftaran')->where(['id'=>$pendaftaran->id])->first();
            // return response()->json($vpendaftaran, 200);
            return response()->json(['status'=>1,'message'=>'data pendaftaran berhasil diambil','data'=>$vpendaftaran],200);
        }else{            
            return response()->json(['status'=>0,'message'=>'data pendaftaran gagal diambil','data'=>null],200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        //
    }



    public function fetchToday()
    {
        $pasien=DB::table('vpendaftaran')->select('id','no_rm','nama_lengkap','no_pendaftaran','noantrian2','alamat','nama_poli')->where(['vpendaftaran.tanggal'=>date('Y-m-d')])->get();
        return Datatables::of($pasien)
                        ->addIndexColumn()
                        ->addColumn('aksi', function($pasien){
                            $btn='<div class="btn-group">
                            <a href="javascript:void(0)" data-id="'.$pasien->id.'" class="btn btn-xs btn-primary data-pendaftaran">Show</a>
                            <a href="pasien/'.$pasien->id.'/edit" class="btn btn-xs btn-success">Edit</a>
                            <div class="btn-group">
                            <button type="button" class="btn btn-xs btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu" style="">
                                <a href="javascript:void(0)" class="dropdown-item print-kib" href="#">cetak KIB</a>
                                <a href="javascript:void(0)" class="dropdown-item hapuspasien" data-id="'.$pasien->id.'">Delete</a>
                            </div>
                            </div>
                        </div>';

                            return $btn;
                        })
                        ->rawColumns(['aksi'])
                        ->toJson();
    }

    public function export()
    {
        return Excel::download(new PendaftaranExport,'pendaftaran_'.date('d-M-y').'.xlsx');
    }
}
