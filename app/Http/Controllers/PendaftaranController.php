<?php

namespace App\Http\Controllers;

use App\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            ['id_pasien'=>['required']]
        );
        if($cekvalidasi->fails()){           
            return response()->json(['status'=>0,'message'=>'Proses input data pasien tidak bisa dilanjutkan','data'=>$cekvalidasi->errors()],422);
        }else{
            $cekpendaftaran=Pendaftaran::where(['tanggal'=>date('Y-m-d')]);
            if($cekpendaftaran->count()==0){
                $no_pendaftaran=1;
                
                $kode=DB::select('SELECT max(noantrian) as noantrian from pendaftarans where tanggal=now() and poli=:poli limit 1',['poli'=>$request->poli]);
                $temp_norm="";
                $temp_norm_fix="";
                foreach ($kode as $kd) {
                    $temp_norm=($kd->noantrian);
                }        
                $jml_digit=intval($temp_norm);                

                // switch (strlen($jml_digit)){
                // case 1:
                //     ++$jml_digit;
                //     $temp_norm_fix=$kode_pkm."00000".$jml_digit;
                // break;
                // case 2:
                //     ++$jml_digit;
                //     $temp_norm_fix=$kode_pkm."0000".$jml_digit;                
                // break;
                // case 3:
                //     ++$jml_digit;
                //     $temp_norm_fix=$kode_pkm."000".$jml_digit;                
                // break;
                // case 4:
                //     ++$jml_digit;
                //     $temp_norm_fix=$kode_pkm."00".$jml_digit;                
                // break;
                // case 5:
                //     ++$jml_digit;
                //     $temp_norm_fix=$kode_pkm."0".$jml_digit;
                // break;
                // case 6:
                //     ++$jml_digit;
                //     $temp_norm_fix=$kode_pkm.$jml_digit;                
                // break;
                // default:
                //     $temp_norm_fix=$kode_pkm."000001";
                // }

                $simpanPendaftaran=new Pendaftaran;
                $simpanPendaftaran->no_pendaftaran      =$no_pendaftaran;
                $simpanPendaftaran->tanggal             =date('Y-m-d');
                $simpanPendaftaran->waktu               =time('h:m:s');
                $simpanPendaftaran->idpasien            =$request->id_pasien;
                $simpanPendaftaran->no_rm               =$request->no_rm;
                $simpanPendaftaran->usia_tahun          =$request->usia_tahun;
                $simpanPendaftaran->usia_bulan          =$request->usia_bulan;
                $simpanPendaftaran->usia_hari           =$request->usia_hari;
                $simpanPendaftaran->poli                =$request->poli;
                $simpanPendaftaran->cara_daftar         ='LANGSUNG';
                $simpanPendaftaran->status              =1;                              
                $simpanPendaftaran->save();

                return response()->json(['status'=>1,'message'=>'data pasien berhasil disimpan','data'=>$simpanPendaftaran],200);
            }else{
                
                return response()->json(['status'=>0,'message'=>'Data pasien sudah ada/ ada yang sama, silahkan periksa kembali','data'=>$cekpasien->get()],200);
            }
            
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
        //
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



    public function fetch()
    {
        $pasien=DB::table('pendaftarans')->select('id','nik','no_rm','nama_lengkap','alamat','hp')->get();       

        return Datatables::of($pasien)
                        ->addIndexColumn()
                        ->addColumn('aksi', function($pasien){
                            $btn='<div class="btn-group">
                            <a href="pasien/'.$pasien->id.'" class="btn btn-xs btn-primary">View</a>
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
}
