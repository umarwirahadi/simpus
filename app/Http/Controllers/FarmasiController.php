<?php

namespace App\Http\Controllers;

use App\Farmasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use KustomHelper;


class FarmasiController extends Controller
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
            'submenu'=>'farmasi',
            'judul'=>'Data farmasi',
            'isDataTable'=>true,
            'isJS'=>'farmasi.js',
            'dataItem'=>null
        ];
        return view('farmasi.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $selectData=DB::table('vpemeriksaanfarmasi')->where('id_pemeriksaan','=',$id)->take(1)->first();

        $data=[
            'menu'=>'Transaksi',
            'submenu'=>'farmasi',
            'judul'=>'Tambah data',
            'isDataTable'=>true,
            'isJS'=>'farmasi.js',
            'dataItem'=>$selectData
        ];
        return view('farmasi.add',$data);
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
     * @param  \App\Farmasi  $farmasi
     * @return \Illuminate\Http\Response
     */
    public function show(Farmasi $farmasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Farmasi  $farmasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Farmasi $farmasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Farmasi  $farmasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farmasi $farmasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Farmasi  $farmasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farmasi $farmasi)
    {
        //
    }

    /*additional*/

    public function fetch()
    {
        $pemeriksaanFarmasi=DB::table('vpemeriksaanfarmasi')->select('id','id_pendaftaran','id_pemeriksaan','idpasien','pcare_no_kunjungan','tensi','suhu','berat_badan','keluhan_utama','terapi',
                                                                    'diagnosa','resep_obat','noantrian','no_rm','nama_lengkap','alamat','poli','status_pelayanan_farmasi')->where('tanggal','=',date('Y-m-d'))->where('status_periksa','=','3')->orderBy('id_pendaftaran');
        return Datatables::of($pemeriksaanFarmasi)
                        ->addIndexColumn()
                        ->addColumn('status_pelayanan_farmasi', function($data) {
                            if(!empty($data->status_pelayanan_farmasi)){
                                $icon= '<i class="fa fa-check text text-success"></i>';
                            }else{
                                $icon= '<i class="fa fa-times text text-red"></i>';
                            }
                            return $icon;
                        })
                        ->addColumn('aksi', function($data){

                            $btn='<div class="btn-group">
                            <button type="button" class="btn btn-success btn-sm" data-toggle="dropdown" aria-expanded="false">
                              <i class="fa fa-arrow-circle-down"></i>
                            </button>
                            <div class="dropdown-menu bg-gray" role="menu" style="">
                              <a class="dropdown-item show-obat" href="farmasi/create/'.$data->id_pemeriksaan.'" ><i class="fa fa-tablets"></i> Proses</a>
                              <a class="dropdown-item edit-obat" href="farmasi/show" ><i class="fa fa-eye"></i> Edit</a>
                              <a class="dropdown-item delete-obat"  href="javascript:void(0)" data-id="'.$data->id.'"><i class="fa fa-times-circle"></i> Delete</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item show-penerimaan-obat" href="penerimaanObat/'.$data->id.'" ><i class="fa fa-sync-alt"></i> Penerimaan Obat</a>
                            </div>
                          </div>';
                            return $btn;
                        })
                        ->rawColumns(['aksi','status_pelayanan_farmasi'])
                        ->toJson();
    }
}
