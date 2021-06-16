<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obat;
use App\Penerimaanobat;
use Illuminate\Support\Facades\DB;
use DataTables;
use KustomHelper;
use PDF;
class PenerimaanobatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $obatDipilih=Obat::find($id);
        $historyTerima=Penerimaanobat::where('id_obat',$obatDipilih->id)->get();

        $kirim=[
            'isJS'=>'obat.js',
            'menu'=>'data',
            'submenu'=>'pengiriman obat',
            'judul'=>'data obat',
            'isDataTable'=>true,
            'dataObat'=>$obatDipilih,
            'historyPenerimaan'=>$historyTerima
        ];
        return view('penerimaanobat.index',$kirim);
    }

    public function store(Request $request)
    {
        if($request->ajax()){
            $cekvalidasi=$request->validate(
            [
            'id_obat'=>['required'],
            'jumlah_penermaan'=>['required'],
            'tanggal_penermaan'=>['required'],
            'tanggal_kadaluarsa'=>['required'],
            'petugas_pengirim'=>['required']]
            );
                $savePenerimaan=new Penerimaanobat();
                $savePenerimaan->id_obat                  =$request->id_obat;
                $savePenerimaan->satuan                   =$request->satuan;
                $savePenerimaan->jumlah_penermaan         =$request->jumlah_penermaan;
                $savePenerimaan->tanggal_penermaan        =$request->tanggal_penermaan;
                $savePenerimaan->tanggal_kadaluarsa       =$request->tanggal_kadaluarsa;
                $savePenerimaan->waktu_penermaan          =$request->waktu_penermaan;
                $savePenerimaan->no_batch                 =$request->no_batch;
                $savePenerimaan->petugas_pengirim         =$request->petugas_pengirim;
                $savePenerimaan->id_petugas               =$request->id_petugas;
                $savePenerimaan->keterangan               =$request->keterangan;
                $savePenerimaan->status                   =$request->status;
                $savePenerimaan->save();
                if($savePenerimaan){
                    return response()->json(['status'=>1,'message'=>'data penerimaan obat berhasil disimpan','data'=>$savePenerimaan],200);
                }else{
                    return response()->json(['status'=>0,'message'=>'data penerimaan obat gagal disimpan','data'=>null],200);
                }
        }else{
            redirect('/penerimaan');
        }
    }

    public function edit($id)
    {
        $penerimaanobat=Penerimaanobat::find($id);
        if($penerimaanobat){
            return response()->json(['status'=>1,'message'=>'data obat ditemukan','data'=>$penerimaanobat],200);
        }else{
            return response()->json(['status'=>0,'message'=>'data obat tidak ditemukan','data'=>null],200);
        }
    }

    public function update(Request $request,$id)
    {
        if($request->ajax()){
        $penerimaanobat=Penerimaanobat::find($id);
        $validate=$request->validate([
        'edit_id_penerimaan'=>['required'],
        'edit_satuan'=>['required'],
        'edit_jumlah_penermaan'=>['required'],
        'edit_tanggal_penermaan'=>['required'],
        'edit_tanggal_kadaluarsa'=>['required'],
        'edit_petugas_pengirim'=>['required'],
        'edit_petugas_pengirim'=>['required']
        ]);
        $penerimaanobat->satuan             =$request->edit_satuan;
        $penerimaanobat->jumlah_penermaan   =$request->edit_jumlah_penermaan;
        $penerimaanobat->tanggal_penermaan  =$request->edit_tanggal_penermaan;
        $penerimaanobat->tanggal_kadaluarsa =$request->edit_tanggal_kadaluarsa;
        $penerimaanobat->waktu_penermaan    =$request->edit_waktu_penermaan;
        $penerimaanobat->no_batch           =$request->edit_no_batch;
        $penerimaanobat->petugas_pengirim   =$request->edit_petugas_pengirim;
        $penerimaanobat->keterangan         =$request->edit_keterangan;
        $penerimaanobat->status             =$request->edit_status;
        $penerimaanobat->update();

        if($penerimaanobat){
            return response()->json(['status'=>1,'message'=>'data penerimaan berhasil diupdate','data'=>$penerimaanobat],200);
        }else{
            return response()->json(['status'=>0,'message'=>'data penerimaan gagal  diupdate','data'=>null],200);
        }
    }else{
        redirect('/obat');
    }
    }


    public function destroy(Request $request,$id)
    {
        if($request->ajax()){
            $hapuspenerimaan=Penerimaanobat::find($id);
            $hapuspenerimaan->delete();

            if($hapuspenerimaan){
                return response()->json(['status'=>1,'message'=>'data penerimaan berhasil dihapus','data'=>$hapuspenerimaan],200);
            }else{
                return response()->json(['status'=>0,'message'=>'data penerimaan gagal  dihapus','data'=>null],200);
            }
        }else{
            redirect('/obat');
        }
    }


    public function printpenerimaan(Request $request)
    {
        $tampungPKM=KustomHelper::setProfilePKM();
        $dataObat=DB::table('obats')->select(['kode','nama_obat','jenis','satuan','harga','stok_awal','sisa_stok','keterangan'])->where('id','=',$request->id_obat)->first();
        $data=DB::table('penerimaanobats')->where('id','=',$request->id)->get();
        $pdf = PDF::loadview('penerimaanobat.printpdf',['dataObat'=>$dataObat,'penerimaan'=>$data,'puskesmas'=>$tampungPKM])->setPaper('a4', 'landscape');
    	return $pdf->stream('print-penerimaan-obat.pdf',array("Attachment" => false));
    }

    public function printpenerimaanAll(Request $request)
    {
        $tampungPKM=KustomHelper::setProfilePKM();
        $dataObat=DB::table('obats')->select(['kode','nama_obat','jenis','satuan','harga','stok_awal','sisa_stok','keterangan'])->where('id','=',$request->id_obat)->first();
        $data=DB::table('penerimaanobats')->where('id_obat','=',$request->id_obat)->get();
        $pdf = PDF::loadview('penerimaanobat.printpdf',['dataObat'=>$dataObat,'penerimaan'=>$data,'puskesmas'=>$tampungPKM])->setPaper('a4', 'landscape');
    	return $pdf->stream('print-penerimaan-obat.pdf',array("Attachment" => false));
    }













    public function fetch(Request $request)
    {
        $pasien=DB::table('penerimaanobats')->select('id','tanggal_penermaan','jumlah_penermaan','tanggal_kadaluarsa','no_batch','petugas_pengirim')->where('id_obat','=',$request->idobat)->orderBy('created_at','desc')->get();
        return Datatables::of($pasien)
                        ->addIndexColumn()
                        ->addColumn('aksi', function($terima){
                            $btn='<div class="btn-group">
                            <button type="button" class="btn btn-success btn-sm" data-toggle="dropdown" aria-expanded="false">
                              <i class="fa fa-arrow-circle-down"></i>
                            </button>
                            <div class="dropdown-menu bg-gray" role="menu" style="">
                              <a class="dropdown-item edit-penerimaan" href="javascript:void(0)" data-id="'.$terima->id.'" title="Edit obat" data-toggle="modal" data-target="#form-edit-penerimaan-obat"><i class="fa fa-eye"></i> Edit</a>
                              <a class="dropdown-item delete-penerimaan"  href="javascript:void(0)" data-id="'.$terima->id.'"><i class="fa fa-times-circle"></i> Delete</a>
                              <a class="dropdown-item print-penerimaan"  href="javascript:void(0)" data-id="'.$terima->id.'" ><i class="fa fa-download"></i> Download</a>
                            </div>
                          </div>';
                            return $btn;
                        })
                        ->rawColumns(['aksi'])
                        ->toJson();
    }
}
