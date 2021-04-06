<?php

namespace App\Http\Controllers;

use App\Pendaftaran;
use App\Pemeriksaan;
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
            'isJS'=>'pendaftaran.js',
            'menu'=>'Transaksi',
            'submenu'=>'Pendaftaran',
            'judul'=>'Pendaftaran Pasien',
            'isDataTable'=>true,
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

    public function kajianawal(Request $request)
    {        
        return response()->json(['status'=>1,'message'=>'form kajian awal pasien','daftar'=>DB::table('vpendaftaran')->where(['id'=>$request->regID,'tanggal'=>date('Y-m-d')])->first()],200);        
    }

    public function proseskajian(Request $request)
    {
        $cekvalidasi=Validator::make($request->all(),
            ['kajian_idpasien'=>['required'],'kajian_id_pendaftaran'=>['required'],'kajian_sistol'=>['required'],'kajian_no_rm'=>['required'],
            'kajian_diastol'=>['required'],'kajian_tekanan_nadi'=>['required'],'kajian_respirasi'=>['required'],'kajian_suhu'=>['required'],'kajian_berat_badan'=>['required'],
            'kajian_tinggi_badan'=>['required'],'kajian_anamnesa'=>['required']]
        );
        if($cekvalidasi->fails()){           
            return response()->json(['status'=>0,'message'=>'Proses input data pasien tidak bisa dilanjutkan','data'=>$cekvalidasi->errors()],422);
        }else{
            // cek jika pemeriksaan ada harus ditanyakan apakah pasien hanya boleh periksa 1 hari jika lebih pola harus diubah            
            $cekpemeriksaan=Pemeriksaan::where(['idpasien'=>$request->kajian_idpasien,'tanggal'=>date('Y-m-d')]);
            if($cekpemeriksaan->count()==0){
                $pemeriksaan=new Pemeriksaan;
                $pemeriksaan->idpasien=$request->kajian_idpasien;
                $pemeriksaan->id_pendaftaran=$request->kajian_id_pendaftaran;
                $pemeriksaan->tanggal=date('Y-m-d');
                $pemeriksaan->jam=date("H:i:s");
                $pemeriksaan->kasus='Kasus';
                $pemeriksaan->sistol=$request->kajian_sistol;
                $pemeriksaan->diastol=$request->kajian_diastol;
                $pemeriksaan->tekanan_nadi=$request->kajian_tekanan_nadi;
                $pemeriksaan->respirasi=$request->kajian_respirasi;
                $pemeriksaan->suhu=$request->kajian_suhu;
                $pemeriksaan->berat_badan=$request->kajian_berat_badan;
                $pemeriksaan->tinggi_badan=$request->kajian_tinggi_badan;
                $pemeriksaan->keluhan_utama='-';
                $pemeriksaan->pemeriksaan_fisik='-';
                $pemeriksaan->anamnesa='-';
                $pemeriksaan->terapi='-';
                $pemeriksaan->diagnosa=$request->kajian_anamnesa;
                $pemeriksaan->keterangan='';
                $pemeriksaan->id_petugas=\Auth::user()->id;
                $pemeriksaan->status=1;
                $pemeriksaan->save();
                return response()->json(['status'=>1,'message'=>'data kajian awal berhasil disimpan','data'=>null],200);
            }
            else{
                $isexist=$cekpemeriksaan->first();
                $updatepemeriksaan=Pemeriksaan::find($isexist->id);    
                $updatepemeriksaan->idpasien=$request->kajian_idpasien;
                $updatepemeriksaan->id_pendaftaran=$request->kajian_id_pendaftaran;
                $updatepemeriksaan->tanggal=date('Y-m-d');
                $updatepemeriksaan->jam=date("H:i:s");
                $updatepemeriksaan->kasus='Kasus';
                $updatepemeriksaan->sistol=$request->kajian_sistol;
                $updatepemeriksaan->diastol=$request->kajian_diastol;
                $updatepemeriksaan->tekanan_nadi=$request->kajian_tekanan_nadi;
                $updatepemeriksaan->respirasi=$request->kajian_respirasi;
                $updatepemeriksaan->suhu=$request->kajian_suhu;
                $updatepemeriksaan->berat_badan=$request->kajian_berat_badan;
                $updatepemeriksaan->tinggi_badan=$request->kajian_tinggi_badan;
                $updatepemeriksaan->keluhan_utama='-';
                $updatepemeriksaan->anamnesa='-';
                $updatepemeriksaan->terapi='-';
                $updatepemeriksaan->diagnosa=$request->kajian_anamnesa;
                $updatepemeriksaan->keterangan='';
                $updatepemeriksaan->id_petugas=\Auth::user()->id;
                $updatepemeriksaan->status=1;
                $updatepemeriksaan->update();
                return response()->json(['status'=>1,'message'=>'data pemeriksaan berhasil diubah ','data'=>$updatepemeriksaan],200);
            }                   
        } 
    }



    public function fetchToday()
    {
        $pasien=DB::table('vpendaftaran')->select('id','no_rm','nama_lengkap','no_pendaftaran','noantrian2','alamat','nama_poli')->where(['vpendaftaran.tanggal'=>date('Y-m-d')])->get();
        return Datatables::of($pasien)
                        ->addIndexColumn()
                        ->addColumn('aksi', function($pasien){
                            $btn='<div class="btn-group">
                            <a href="javascript:void(0)" data-id="'.$pasien->id.'" class="btn btn-xs btn-success data-kajian-awal" title="kajianawal"><i class="fa fa-user-check"></i></a>
                            <a href="javascript:void(0)" data-id="'.$pasien->id.'" class="btn btn-xs btn-primary data-pendaftaran" title="lihat pendaftaran"><i class="fa fa-eye"></i></a>
                            <a href="pasien/'.$pasien->id.'/edit" class="btn btn-xs btn-warning" title="edit pendaftaran"><i class="fa fa-edit"></i></a>
                            <div class="btn-group">
                            <button type="button" class="btn btn-xs btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu" style="">
                                <a href="javascript:void(0)" class="dropdown-item print-kib" href="#">hapus pendaftaran</a>
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
