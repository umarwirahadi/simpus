<?php
namespace App\Http\Controllers;
use App\Tenagamedis;
use Illuminate\Http\Request;
use DataTables;
use KustomHelper;


class TenagamedisController extends Controller
{

    protected $api='';
    public function __construct()
    {
        $this->middleware('auth');
        $this->api=KustomHelper::domainAPI();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $data=[
            'menu'=>'Data',
            'submenu'=>'tenaga medis',
            'judul'=>'Data Tenaga Medis',
            'isDataTable'=>true,
            'isJS'=>'tenagamedis.js',
            'dataItem'=>Tenagamedis::all(['id','nip','nama_lengkap','jenistenagamedis','hp','kdDokter_pcare','bidang_pelayanan'])
        ];
        return view('tenagamedis.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'menu'=>'Data',
            'submenu'=>'tenaga medis',
            'submenu2'=>'tambah tenaga medis',
            'aksi'=>'Data tenaga medis',
            'isDataTable'=>false,
            'isJS'=>'tenagamedis.js',
            'data'=>null
        ];
        return view('tenagamedis.add',$data);
    }

    public function store(Request $request)
    {
        if($request->ajax()){
            $validasitenagamedis = $request->validate([
                'nama_lengkap' => 'required',
                'jenistenagamedis' => 'required',
                'bidang_pelayanan' => 'required',
                'hp' => 'required',
                'tgl_gabung' => 'required',
            ]);

            $insertTenagamedis= new Tenagamedis;
            $insertTenagamedis->nip=$request->nip;
            $insertTenagamedis->nama_lengkap=$request->nama_lengkap;
            $insertTenagamedis->jenistenagamedis=$request->jenistenagamedis;
            $insertTenagamedis->bidang_pelayanan=$request->bidang_pelayanan;
            $insertTenagamedis->hp=$request->hp;
            $insertTenagamedis->alamat=$request->alamat;
            $insertTenagamedis->tgl_lahir=$request->tgl_lahir;
            $insertTenagamedis->tgl_gabung=$request->tgl_gabung;
            $insertTenagamedis->no_ijin=$request->no_ijin;
            $insertTenagamedis->status=$request->status;
            $insertTenagamedis->keterangan=$request->keterangan;
            $insertTenagamedis->nip=$request->nip;
            $insertTenagamedis->nip=$request->nip;
            $insertTenagamedis->save();
            return response()->json(['status'=>1,'message'=>'data tenaga medis berhasil disimpan','data'=>$insertTenagamedis],200);
        }else{
            return redirect('tenagamedis');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tenagamedis  $tenagamedis
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=[
            'menu'=>'Data',
            'submenu'=>'tenaga medis',
            'submenu2'=>'tambah tenaga medis',
            'aksi'=>'Data tenaga medis',
            'isDataTable'=>false,
            'isJS'=>'tenagamedis.js',
            'datamedis'=>Tenagamedis::find($id)];
            return view('tenagamedis.show',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tenagamedis  $tenagamedis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data=[
            'menu'=>'Data',
            'submenu'=>'tenaga medis',
            'submenu2'=>'tambah tenaga medis',
            'aksi'=>'Data tenaga medis',
            'isDataTable'=>false,
            'isJS'=>'tenagamedis.js',
            'datamedis'=>Tenagamedis::find($id)
        ];

        return view('tenagamedis.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tenagamedis  $tenagamedis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        if($request->ajax()){
            $updatetenagamedis=Tenagamedis::find($id);
            $updatetenagamedis->nip                =$request->nip;
            $updatetenagamedis->nama_lengkap       =$request->nama_lengkap;
            $updatetenagamedis->jenistenagamedis   =$request->jenistenagamedis;
            $updatetenagamedis->bidang_pelayanan   =$request->bidang_pelayanan;
            $updatetenagamedis->hp                 =$request->hp;
            $updatetenagamedis->alamat             =$request->alamat;
            $updatetenagamedis->tgl_lahir          =$request->tgl_lahir;
            $updatetenagamedis->tgl_gabung         =$request->tgl_gabung;
            $updatetenagamedis->no_ijin            =$request->no_ijin;
            $updatetenagamedis->status             =$request->status;
            $updatetenagamedis->keterangan         =$request->keterangan;
            $updatetenagamedis->update();
            return response()->json(['status'=>1,'message'=>'data tenagamedis berhasil diupdate','data'=>$updatetenagamedis],200);
        }else{
            return redirect('tenagamedis');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tenagamedis  $tenagamedis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete= Tenagamedis::find($id);
        if($delete){
            $delete->delete();
            return response()->json(['status'=>1,'message'=>'data tenaga medis berhasil dihapus','data'=>null],200);
        }else{
            return redirect()->route('item.index')->with('status', 'data tenaga medis gagal dihapus');
        }
    }


    public function getTenagaMedisPcare()
    {
                $tampung=KustomHelper::callAPI('GET',$this->api.'/dokter/0/3/');
                dd($tampung);
                if($tampung){
                    if($tampung['metaData']['code']==200){
                        $datatenagaMedis=$tampung['response']['list']; /*destructing data*/

                        foreach ($datatenagaMedis as $val) {
                            $listdataa=array('nip'=>'-','nama_lengkap'=>$val['nmDokter'],'kdDokter_pcare'=>$val['kdDokter'],'jenistenagamedis'=>'0','bidang_pelayanan'=>'0','hp'=>'0','alamat'=>'-','tgl_lahir'=>date('Y-m-D'),'tgl_gabung'=>date('y-m-d'),'no_ijin'=>'0','status'=>'1');
                        }

                        $bulkrecord=Tenagamedis::insert($listdataa);

                        if($bulkrecord){
                            return response()->json(['status'=>1,'message'=>'Data tenaga medis/dokter berhasil disimpan ','data'=>null],200);
                        }else{
                            return response()->json(['status'=>2,'message'=>'Data tenaga medis/dokter gagal disimpan ','data'=>null],200);
                        }
                    }else{
                        return response()->json(['status'=>0,'message'=>'pengecekan no kartu BPJS tidak bisa diproses..!','data'=>null],200);
                    }
                }else{
                    return response()->json(['status'=>0,'message'=>'Server sedang mengalami error, proses dihentikan','data'=>null],200);
                }

    }
}
