<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Maatwebsite\Excel\Facades\Excel;

class MonitoringController extends Controller
{
    public function index(Request $request)
    {
        $data=[
            'menu'=>'Transaksi',
            'submenu'=>'Monitoring berkas rekam medis',
            'judul'=>'monitoring berkas rekam medis',
            'isDataTable'=>true,
            'isJS'=>'custom.js',
            // 'jumlah'=>DB::table('vpendaftaran')->where(['kode_poli'=>Cookie::get('id_poli'),'tanggal'=>date('Y-m-d')])->count(),
            // 'jumlahTunggu'=>DB::table('vpendaftaran')->where(['kode_poli'=>Cookie::get('id_poli'),'tanggal'=>date('Y-m-d')])->where('status','<>',3)->count(),
            // 'jumlahDiperiksa'=>DB::table('vpendaftaran')->where(['kode_poli'=>Cookie::get('id_poli'),'tanggal'=>date('Y-m-d'),'status'=>2])->count(),
            // 'dataItem'=>DB::table('vpendaftaran')->where(['kode_poli'=>Cookie::get('id_poli'),'tanggal'=>date('Y-m-d')])->get()
        ];
        return view('monitoringrm.index',$data);
    }







    public function fetch(Request $request)
    {
        $monitoringberkasrm=DB::table('vpendaftaran')->select(['id','idpasien','no_pendaftaran','noantrian2','no_rm','no_rm_lama','nik','nama_lengkap','tanggal','kode_poli','no_kartu_bpjs','status'])->where('tanggal','=',date('y-m-d'))->orderBy('id','desc');
        return Datatables::of($monitoringberkasrm)
                        ->addIndexColumn()
                        ->addColumn('aksi', function($data){
                            $btn='<div class="btn-group">
                            <button type="button" class="btn btn-success btn-sm" data-toggle="dropdown" aria-expanded="false">
                              <i class="fa fa-arrow-circle-down"></i>
                            </button>
                            <div class="dropdown-menu bg-gray" role="menu" style="">
                              <a class="dropdown-item show-obat" href="javascript:void(0)" value="obat/'.$data->id.'" title="show obat"><i class="fa fa-stethoscope"></i> Show</a>
                              <a class="dropdown-item edit-obat" href="javascript:void(0)" data-id="'.$data->id.'" title="Edit obat" data-toggle="modal" data-target="#modalMd-obat-edit"><i class="fa fa-eye"></i> Edit</a>
                              <a class="dropdown-item delete-obat"  href="javascript:void(0)" data-id="'.$data->id.'"><i class="fa fa-times-circle"></i> Delete</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item show-penerimaan-obat" href="penerimaanObat/'.$data->id.'" ><i class="fa fa-sync-alt"></i> Penerimaan Obat</a>
                            </div>
                          </div>';
                            return $btn;
                        })
                        ->rawColumns(['aksi'])
                        ->toJson();
    }

    public function printkib()
    {
        return view('monitoringrm.popupkartu');
    }
}
