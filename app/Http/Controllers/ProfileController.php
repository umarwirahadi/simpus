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
    public function index()
    {
        $data=[
            'menu'=>'Data',
            'submenu'=>'profile',
            'judul'=>'Profile Puskesmas',
            'isDataTable'=>false,
            'isJS'=>'profile.js',
            'dataItem'=>null
        ];
        return view('profile.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            $cekpkm=Profile::where(['kode_puskesmas'=>$request->kode_puskesmas]);
            if($cekpasien->count()<1){
                $simpanpkm=new Profile;
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
                $simpanpkm->nip_kapus=nip_kapus;
                $simpanpkm->nip_katu=$request->nip_katu;

                                
                $simpanpkm->save();

                return response()->json(['status'=>1,'message'=>'data Profile berhasil disimpan','data'=>$simpanpkm],200);
            }else{
                
                return response()->json(['status'=>0,'message'=>'Data profile sudah ada/ ada yang sama, silahkan periksa kembali','data'=>$cekpasien->get()],200);
            }

    
        }else{
            return response()->json(['status'=>0,'message'=>'Proses input data profile tidak bisa dilanjutkan','data'=>null],200);
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
