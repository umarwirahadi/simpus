<?php

namespace App\Http\Controllers;

use App\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use DataTables;
use KustomHelper;


class PasienController extends Controller
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
            'menu'=>'Data',
            'submenu'=>'pasien',
            'judul'=>'Data pasien',
            'isDataTable'=>true,
            'isJS'=>'pasien.js',
            'ismodal'=>'pasien.show',
            'dataItem'=>null
        ];
        return view('pasien.index',$data);
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
            'submenu'=>'pasien',
            'submenu2'=>'tambah pasien',
            'aksi'=>'Tambah Pasien',
            'judul'=>'Data item',
            'isDataTable'=>false,
            'isJS'=>'pasien.js',
            'iscss'=>'pasien.css',
            'data'=>null
        ];
        return view('pasien.add',$data);
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
            'digits'=>':attribute apanjang karakter harus 16 digit'
            ];
        $cekvalidasi=$request->validate([
                                'nama_lengkap'=>['required'],
                                'tanggal_lahir'=>['required'],
                                'alamat'=>['required'],
                                'rt'=>['required'],
                                'rw'=>['required'],
        ],$pesan);

        if($cekvalidasi){
            $cekpasien=Pasien::where(['nama_lengkap'=>$request->nama_lengkap,'nik'=>$request->nik]);
            if($cekpasien->count()<1){
                // proses pembuatan no_rm otomatis
                // set_kode_puskesmas
                $kode_pkm=KustomHelper::setKodePkm();
                if(!$kode_pkm){
                    return response()->json(['status'=>0,'message'=>'data profile tidak ada, proses penyipanan dibatalkan','data'=>null],200);
                }
                
                $kode=DB::select('SELECT max(RIGHT(no_rm,6)) as no_rm from pasiens limit 1');
                $temp_norm="";
                $temp_norm_fix="";
                foreach ($kode as $kd) {
                    $temp_norm=($kd->no_rm);
                }        
                $jml_digit=intval($temp_norm);                

                switch (strlen($jml_digit)){
                case 1:
                    ++$jml_digit;
                    $temp_norm_fix=$kode_pkm."00000".$jml_digit;
                break;
                case 2:
                    ++$jml_digit;
                    $temp_norm_fix=$kode_pkm."0000".$jml_digit;                
                break;
                case 3:
                    ++$jml_digit;
                    $temp_norm_fix=$kode_pkm."000".$jml_digit;                
                break;
                case 4:
                    ++$jml_digit;
                    $temp_norm_fix=$kode_pkm."00".$jml_digit;                
                break;
                case 5:
                    ++$jml_digit;
                    $temp_norm_fix=$kode_pkm."0".$jml_digit;
                break;
                case 6:
                    ++$jml_digit;
                    $temp_norm_fix=$kode_pkm.$jml_digit;                
                break;
                default:
                    $temp_norm_fix=$kode_pkm."000001";
                }

                $simpanPasien=new Pasien;
                $simpanPasien->nik=$request->nik;
                $simpanPasien->no_kk=$request->no_kk;
                $simpanPasien->status_hubungan=$request->status_hubungan;
                $simpanPasien->no_bpjs=$request->no_bpjs;
                $simpanPasien->no_rm=$temp_norm_fix;
                $simpanPasien->no_rm_lama=$request->no_rm_lama;
                $simpanPasien->nama_lengkap=$request->nama_lengkap;
                $simpanPasien->jenis_kelamin=$request->jenis_kelamin;
                $simpanPasien->tempat_lahir=$request->tempat_lahir;
                $simpanPasien->tanggal_lahir=$request->tanggal_lahir;
                $simpanPasien->agama=$request->agama;
                $simpanPasien->gol_darah=$request->gol_darah;
                $simpanPasien->hp=$request->hp;
                $simpanPasien->telp=$request->telp;
                $simpanPasien->email=$request->email;
                $simpanPasien->warganegara='Indonesia';
                $simpanPasien->alamat=$request->alamat;
                $simpanPasien->rt=$request->rt;
                $simpanPasien->rw=$request->rw;
                $simpanPasien->kelurahan=$request->kelurahan;
                $simpanPasien->kecamatan=$request->kecamatan;
                $simpanPasien->kab_kota=$request->kab_kota;
                $simpanPasien->provinsi=$request->provinsi;
                $simpanPasien->pos=$request->pos;
                $simpanPasien->status_marital=$request->status_marital;
                $simpanPasien->pendidikan_terakhir=$request->pendidikan_terakhir;
                $simpanPasien->suku=$request->suku;
                $simpanPasien->pekerjaan=$request->pekerjaan;
                $simpanPasien->nama_ayah=$request->nama_ayah;
                $simpanPasien->nama_ibu=$request->nama_ibu;
                $simpanPasien->penanggung_jawab=$request->penanggung_jawab;
                $simpanPasien->hubungan_dengan_penanggung_jawab=$request->hubungan_dengan_penanggung_jawab;
                $simpanPasien->no_contact_darurat=$request->no_contact_darurat;
                $simpanPasien->status_pasien='1'; //default status pasien is 1,if not pasiens not be shown 
                $simpanPasien->wilayah_kerja=$request->wilayah_kerja;                
                $simpanPasien->save();
                $vpasien=DB::table('vpasiens')
                        ->where('id','=',$simpanPasien->id)
                        ->limit(1)
                        ->get();

                return response()->json(['status'=>1,'message'=>'data pasien berhasil disimpan','data'=>$vpasien],200);
            }else{
                
                return response()->json(['status'=>0,'message'=>'Data pasien sudah ada/ ada yang sama, silahkan periksa kembali','data'=>$cekpasien->get()],200);
            }

    
        }else{
            return response()->json(['status'=>0,'message'=>'Proses input data pasien tidak bisa dilanjutkan','data'=>null],200);
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show($id)    
    {
        $pasien=pasien::findOrFail($id);
        $data=[
            'menu'=>'data',
            'submenu'=>'pasien',
            'submenu2'=>'lihat pasien',
            'aksi'=>'Data pasien',
            'isDataTable'=>false,
            'isJS'=>'pasien.js',
            'data'=>$pasien
        ];
        return view('pasien.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        $data=[
            'menu'=>'data',
            'submenu'=>'pasien',
            'submenu2'=>'edit pasien',
            'aksi'=>'Data pasien',
            'isDataTable'=>false,
            'isJS'=>'pasien.js',
            'data'=>$pasien
        ];
        return view('pasien.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // $pesan=[
        //     'required'=>':attribute wajib diisi',
        //     'digits'=>':attribute apanjang karakter harus 16 digit'
        //     ];
        // $cekvalidasi=$request->validate([
        //                         'id_pasien'=>['required'],
        //                         'nama_lengkap'=>['required'],
        //                         'tanggal_lahir'=>['required'],
        //                         'alamat'=>['required'],
        //                         'rt'=>['required'],
        //                         'rw'=>['required'],
        // ],$pesan);
        $cekvalidasi=Validator::make($request->all(),
                    ['id_pasien'=>['required'],
                     'nama_lengkap'=>['required'],
                     'tanggal_lahir'=>['required'],
                     'alamat'=>['required'],
                     'rt'=>['required'],
                     'rw'=>['required']]);

        if($cekvalidasi->fails()){           
            return response()->json(['status'=>0,'message'=>'Proses input data pasien tidak bisa dilanjutkan','data'=>$cekvalidasi->errors()],422);
        }else{
            $updatePasien= Pasien::findOrFail($id);
            if($updatePasien){
                $updatePasien->nik=$request->nik;
                $updatePasien->no_kk=$request->no_kk;
                $updatePasien->status_hubungan=$request->status_hubungan;
                $updatePasien->no_bpjs=$request->no_bpjs;
                $updatePasien->no_rm_lama=$request->no_rm_lama;
                $updatePasien->nama_lengkap=$request->nama_lengkap;
                $updatePasien->jenis_kelamin=$request->jenis_kelamin;
                $updatePasien->tempat_lahir=$request->tempat_lahir;
                $updatePasien->tanggal_lahir=$request->tanggal_lahir;
                $updatePasien->agama=$request->agama;
                $updatePasien->gol_darah=$request->gol_darah;
                $updatePasien->hp=$request->hp;
                $updatePasien->telp=$request->telp;
                $updatePasien->email=$request->email;
                $updatePasien->warganegara='Indonesia';
                $updatePasien->alamat=$request->alamat;
                $updatePasien->rt=$request->rt;
                $updatePasien->rw=$request->rw;
                $updatePasien->kelurahan=$request->kelurahan;
                $updatePasien->kecamatan=$request->kecamatan;
                $updatePasien->kab_kota=$request->kab_kota;
                $updatePasien->provinsi=$request->provinsi;
                $updatePasien->pos=$request->pos;
                $updatePasien->status_marital=$request->status_marital;
                $updatePasien->pendidikan_terakhir=$request->pendidikan_terakhir;
                $updatePasien->suku=$request->suku;
                $updatePasien->pekerjaan=$request->pekerjaan;
                $updatePasien->nama_ayah=$request->nama_ayah;
                $updatePasien->nama_ibu=$request->nama_ibu;
                $updatePasien->penanggung_jawab=$request->penanggung_jawab;
                $updatePasien->hubungan_dengan_penanggung_jawab=$request->hubungan_dengan_penanggung_jawab;
                $updatePasien->no_contact_darurat=$request->no_contact_darurat;
                $updatePasien->status_pasien='1';
                $updatePasien->wilayah_kerja=$request->wilayah_kerja;                
                $updatePasien->update();
                $vpasien=DB::table('vpasiens')
                            ->where('id','=',$updatePasien->id)
                            ->limit(1)
                            ->get();
    
                return response()->json(['status'=>1,'message'=>'data pasien berhasil diupdate','data'=>$vpasien],200);
            }else{
                return redirect()->route('pasien.index')->with('status', 'data pasien gagal diupdate');
            } 

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien= Pasien::findOrFail($id);
        if($pasien){
            $pasien->delete();
            return response()->json(['status'=>1,'message'=>'data pasien berhasil dihapus','data'=>null],200);
        }else{
            return redirect()->route('pasien.index')->with('status', 'data pasien gagal dihapus');
        }
    }

    public function fetch()
    {
        $pasien=DB::table('pasiens')->select('id','nik','no_rm','nama_lengkap','alamat','hp')->get();       

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


    public function finddata(Request $request)    
    {
        if($request->search){
            $vpasien=DB::table('vpasiens')
                        ->where('status_pasien','=',1)
                        ->where(function($query) use($request){
                            $query->where('nama_lengkap','like','%'.$request->search.'%')
                            ->orWhere('no_rm','like','%'.$request->search.'%')
                            ->orWhere('nik','like','%'.$request->search.'%');
                        })
                        ->limit(15)
                        ->get();
            $temp=array();
            foreach ($vpasien as $value) {
                $temp[]=array('label'=>$value->no_rm.' / '.$value->nama_lengkap.' ('.$value->nik.') / Alamat : '.$value->alamat,'value'=>$value->id,'nik'=>$value->nik,
                              'no_rm'=>$value->no_rm,'no_rm_lama'=>$value->no_rm_lama,'nama_lengkap'=>$value->nama_lengkap,'jenis_kelamin'=>$value->jenis_kelamin,'tanggal_lahir'=>$value->tanggal_lahir,
                              'tahun'=>$value->tahun,'bulan'=>$value->bulan,'hari'=>$value->hari,'gol_darah'=>$value->gol_darah,'hp'=>$value->hp,'telp'=>$value->telp,'alamat'=>$value->alamat,
                              'rt'=>$value->rt,'rw'=>$value->rw,'kelurahan'=>$value->kelurahan,'kecamatan'=>$value->kecamatan,'kab_kota'=>$value->kab_kota);
                            }            
            return response()->json($temp);
        }
    }


    public function finddatanik(Request $request)    
    {
        if($request->search){
            $vpasien=DB::table('pasiens')
                        ->where('status_pasien','=',0)
                        ->where(function($query) use ($request){
                            $query->Where('nik','like','%'.$request->search.'%')
                                  ->orWhere('nama_lengkap','like','%'.$request->search.'%');
                        })
                        ->limit(10)
                        ->get();
            $temp=array();

            foreach ($vpasien as $value) {
                $temp[]=array('label'=>$value->nik.' / '.$value->nama_lengkap,'value'=>$value->id,'nik'=>$value->nik,
                              'no_rm'=>$value->no_rm,'no_rm_lama'=>$value->no_rm_lama,'nama_lengkap'=>$value->nama_lengkap,'jenis_kelamin'=>$value->jenis_kelamin,'tempat_lahir'=>$value->tempat_lahir,'tanggal_lahir'=>$value->tanggal_lahir,
                              'agama'=>$value->agama,'gol_darah'=>$value->gol_darah,'hp'=>$value->hp,'telp'=>$value->telp,'email'=>$value->email,'warganegara'=>$value->warganegara,'alamat'=>$value->alamat,
                              'rt'=>$value->rt,'rw'=>$value->rw,'kelurahan'=>$value->kelurahan,'kecamatan'=>$value->kecamatan,'kab_kota'=>$value->kab_kota,'provinsi'=>$value->provinsi,'pos'=>$value->pos,'status_marital'=>$value->status_marital,'pendidikan_terakhir'=>$value->pendidikan_terakhir,
                            'suku'=>$value->suku,'pekerjaan'=>$value->pekerjaan,'nama_ayah'=>$value->nama_ayah,'nama_ibu'=>$value->nama_ibu,'penanggung_jawab'=>$value->penanggung_jawab,'hubungan_dengan_penanggung_jawab'=>$value->hubungan_dengan_penanggung_jawab,
                            'no_contact_darurat'=>$value->no_contact_darurat,'status_pasien'=>$value->status_pasien,'wilayah_kerja'=>$value->wilayah_kerja,'status_pasien'=>$value->status_pasien);
                            }            
            return response()->json($temp);
        }

    }
    
}
