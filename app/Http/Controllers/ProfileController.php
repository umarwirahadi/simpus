<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
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
        $puskesmas=Profile::get()->first();
        $data=[
            'menu'=>'Data',
            'submenu'=>'profile',
            'judul'=>'Profile Puskesmas',
            'isDataTable'=>false,
            'isJS'=>'profile.js',
            'dataItem'=>$puskesmas
        ];
        return view('profile.index',$data);
    }


    public function store(Request $request)
    {
        $pesan=[
            'required'=>':attribute wajib diisi',
            'digits'=>':attribute apanjang karakter harus sesuai'
            ];
        $cekvalidasi=$request->validate([
                                'kode_puskesmas'=>['required'],
                                'nama_puskesmas'=>['required'],
                                'alamat'=>['required'],
                                'kelurahan'=>['required'],
                                'kecamatan'=>['required'],
                                'kota_kab'=>['required'],
                                'provinsi'=>['required'],
                                'pos'=>['required'],
                                'telp'=>['required'],
                                'email'=>['required'],
                                'no_ijin'=>['required'],
                                'no_register'=>['required'],
                                'nip_kapus'=>['required'],
                                'nip_katu'=>['required'] ],$pesan);

        if($cekvalidasi){
            $cekpkm=Profile::where(['kode_puskesmas'=>$request->kode_puskesmas])->first();
            if($cekpkm->count()<1){
                $simpanpkm=new Profile;
                $simpanpkm->id_puskesmas=$request->id_puskesmas;
                $simpanpkm->kode_puskesmas=$request->kode_puskesmas;
                $simpanpkm->nama_puskesmas=$request->nama_puskesmas;
                $simpanpkm->alamat=$request->alamat;
                $simpanpkm->rt=$request->rt;
                $simpanpkm->rw=$request->rw;
                $simpanpkm->kelurahan=$request->kelurahan;
                $simpanpkm->kecamatan=$request->kecamatan;
                $simpanpkm->kota_kab=$request->kota_kab;
                $simpanpkm->provinsi=$request->provinsi;
                $simpanpkm->pos=$request->pos;
                $simpanpkm->telp=$request->telp;
                $simpanpkm->email=$request->email;
                $simpanpkm->no_ijin=$request->no_ijin;
                $simpanpkm->tanggal=$request->tanggal;
                $simpanpkm->no_register=$request->no_register;
                $simpanpkm->nip_kapus=$request->nip_kapus;
                $simpanpkm->nip_katu=$request->nip_katu;
                $simpanpkm->save();
                return response()->json(['status'=>1,'message'=>'data Profile berhasil disimpan','data'=>$simpanpkm],200);
            }else{
                $updatepkm=Profile::find($cekpkm->id);
                $updatepkm->id_puskesmas=$request->id_puskesmas;
                $updatepkm->kode_puskesmas=$request->kode_puskesmas;
                $updatepkm->nama_puskesmas=$request->nama_puskesmas;
                $updatepkm->alamat=$request->alamat;
                $updatepkm->rt=$request->rt;
                $updatepkm->rw=$request->rw;
                $updatepkm->kelurahan=$request->kelurahan;
                $updatepkm->kecamatan=$request->kecamatan;
                $updatepkm->kota_kab=$request->kota_kab;
                $updatepkm->provinsi=$request->provinsi;
                $updatepkm->pos=$request->pos;
                $updatepkm->telp=$request->telp;
                $updatepkm->email=$request->email;
                $updatepkm->no_ijin=$request->no_ijin;
                $updatepkm->tanggal=$request->tanggal;
                $updatepkm->no_register=$request->no_register;
                $updatepkm->nip_kapus=$request->nip_kapus;
                $updatepkm->nip_katu=$request->nip_katu;
                $updatepkm->update();
                return response()->json(['status'=>1,'message'=>'Data profile berhasil diupdate','data'=>$updatepkm],200);
            }
        }else{
            return response()->json(['status'=>0,'message'=>'Proses input data profile tidak bisa dilanjutkan','data'=>null],200);
        }
    }



}
