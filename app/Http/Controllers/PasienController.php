<?php

namespace App\Http\Controllers;

use App\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use DataTables;
use DNS1D;
use KustomHelper;
use PDF;

class PasienController extends Controller
{

    private $api='';

    public function __construct()
    {
        $this->middleware('auth');
        $this->api=KustomHelper::domainAPI();
    }

    public function index()
    {
        $data=[
            'menu'=>'Data',
            'submenu'=>'pasien',
            'judul'=>'Data pasien',
            'isDataTable'=>true,
            'isJS'=>'pasien.js',
            'printJS'=>true,
            'ismodal'=>'pasien.show',
            'dataItem'=>null
        ];
        return view('pasien.index',$data);
    }

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
                                'nik'=>['required'],
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
                $jml_digit=intval($temp_norm)+1;

                switch (strlen($jml_digit)){
                case 1:
                    $temp_norm_fix=$kode_pkm."00000".$jml_digit;
                break;
                case 2:
                    $temp_norm_fix=$kode_pkm."0000".$jml_digit;
                break;
                case 3:
                    $temp_norm_fix=$kode_pkm."000".$jml_digit;
                break;
                case 4:
                    $temp_norm_fix=$kode_pkm."00".$jml_digit;
                break;
                case 5:
                    $temp_norm_fix=$kode_pkm."0".$jml_digit;
                break;
                case 6:
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
                $tglMulaiAktif=date_create($request->tglMulaiAktif);
                $simpanPasien->tglmulaiaktif=date_format($tglMulaiAktif,'Y-m-d');
                $tglAkhirBerlaku=date_create($request->tglAkhirBerlaku);
                $simpanPasien->tglakhirberlaku=date_format($tglAkhirBerlaku,'Y-m-d');
                $simpanPasien->kodeproviderpeserta_bpjs=$request->kdProvider;
                $simpanPasien->namaproviderpeserta_bpjs=$request->nmProvider;
                $simpanPasien->kodeprovidergigi_bpjs=$request->kdProviderGigi;
                $simpanPasien->namaprovidergigi_bpjs=$request->nmProviderGigi;
                $simpanPasien->kodejeniskelas_bpjs=$request->kdKelas;
                $simpanPasien->namajeniskelas_bpjs=$request->namaKelas;
                $simpanPasien->kodejenispeserta_bpjs=$request->kodeJenisPeserta;
                $simpanPasien->namajenispeserta_bpjs=$request->namaJenisPeserta;
                $simpanPasien->kode_asuransi_bpjs=$request->kodeAsuransiPeserta;
                $simpanPasien->nama_asuransi_bpjs=$request->namaAsuransiPeserta;
                $simpanPasien->no_asuransi_bpjs=$request->nomorAsuransiPeserta;
                $simpanPasien->tunggakan_bpjs=$request->tunggakan_bpjs;
                $simpanPasien->keterangan_aktif_bpjs=$request->ketAktif;
                $simpanPasien->aktif_bpjs=$request->aktif;
                $simpanPasien->peserta_prol=$request->pstprol;
                $simpanPasien->peserta_prb=$request->pesprb;

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


    public function show($id)
    {
        // $pasien=pasien::findOrFail($id);
        $pasien=DB::table('pasienfulls')->where('id',$id)->first();
        $data=[
            'menu'=>'data',
            'submenu'=>'pasien',
            'submenu2'=>'lihat pasien',
            'aksi'=>'Data pasien',
            'isDataTable'=>false,
            'isJS'=>'pasien.js',
            'pasien'=>$pasien
        ];
        return view('pasien.show',$data);
    }


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


    public function update(Request $request,$id)
    {
        $cekvalidasi=Validator::make($request->all(),
                    ['id'=>['required'],
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
        $pasien=DB::table('pasiens')->select('id','nik','no_rm','nama_lengkap','alamat','hp')->orderBy('id');
        return Datatables::of($pasien)
                        ->addIndexColumn()
                        ->addColumn('aksi', function($data){
                            $btn='<div class="btn-group">
                            <button type="button" class="btn btn-success btn-sm" data-toggle="dropdown" aria-expanded="false">
                              <i class="fa fa-arrow-circle-down"></i>
                            </button>
                            <div class="dropdown-menu bg-gray" role="menu" style="">
                              <a class="dropdown-item show-obat" href="pasien/'.$data->id.'" title="show obat"><i class="fa fa-user"></i> View</a>
                              <a class="dropdown-item print-barcode-pasien" href="javascript:void(0)" data-id="'.$data->id.'" title="cetak barcode"><i class="fa fa-print"></i> Cetak barcode</a>
                              <a class="dropdown-item cetak-kib" href="javascript:void(0)" data-id="'.$data->id.'" title="cetak KIB"  ><i class="fa fa-id-card"></i> Cetak KIB</a>
                              <a class="dropdown-item delete-obat"  href="javascript:void(0)" data-id="'.$data->id.'"><i class="fa fa-times-circle"></i> Delete</a>
                            </div>
                          </div>';
                            return $btn;
                        })
                        ->rawColumns(['aksi'])
                        ->toJson();
    }

    public function export()
    {
        $logs = DB::table('vpasiens')->select('id','nik','no_rm','no_rm_lama','nama_lengkap','jenis_kelamin','tanggal_lahir','tahun','bulan','hari','gol_darah','hp','telp','alamat','rt','rw','kelurahan','kecamatan','kab_kota','status_pasien')->orderBy('id')->cursor();
        $filename = "data_pasien.csv";
        return response()->streamDownload(function() use ($logs) {
            $csv = fopen("php://output", "w+");

            fputcsv($csv, ['no','id','nik','no_rm','no_rm_lama','nama_lengkap','jenis_kelamin','tanggal_lahir','tahun','bulan','hari','gol_darah','hp','telp','alamat','rt','rw','kelurahan','kecamatan','kab_kota','status_pasien']);
            $no=1;
            foreach ($logs as $log) {
                fputcsv($csv, [
                    $no,
                    $log->id,
                    $log->nik,
                    $log->no_rm,
                    $log->no_rm_lama,
                    $log->nama_lengkap,
                    $log->jenis_kelamin,
                    $log->tanggal_lahir,
                    $log->tahun,
                    $log->bulan,
                    $log->hari,
                    $log->gol_darah,
                    $log->hp,
                    $log->telp,
                    $log->alamat,
                    $log->rt,
                    $log->rw,
                    $log->kelurahan,
                    $log->kecamatan,
                    $log->kab_kota,
                    $log->status_pasien
                ]);
                $no++;
            }

            fclose($csv);
        }, $filename, ["Content-type" => "text/csv"]);
    }

    public function barcode(Request $request)
    {
        if($request->ajax()){
            $pasien=DB::table('pasienfulls')->where('id',$request->id_pasien)->first();
            $barcode='<img src="data:image/png;base64,'.DNS1D::getBarcodePNG($pasien->no_rm,"C128",3,100,array(1,1,1),true).'" alt="barcode" style="width:100%"/>';
            return response()->json(['status'=>1,'message'=>'data pasien','data'=>$pasien,'databarcode'=>$barcode],200);
        }else{
            return redirect('pasien.index');
        }
    }

    public function printkib(Request $request)
    {
        if($request->ajax()){
            $tampungPKM=KustomHelper::setProfilePKM();
            $pasien=DB::table('pasienfulls')->where('id',$request->id_pasien)->first();
            $barcode='<img src="data:image/png;base64,'.DNS1D::getBarcodePNG($pasien->no_rm,"C128",3,100,array(1,1,1),true).'" alt="barcode" style="width:100%"/>';
            $logopkm='img/logo_puskesmas.png';
            $pdf = PDF::loadview('pasien.cetakkib',['dataPasien'=>$pasien,'barcode'=>$barcode,'puskesmas'=>$tampungPKM,'logoo'=>$logopkm])->setPaper('a6', 'landscape');
        	return $pdf->stream('KIB.pdf',array("Attachment" => false));
        }else{
            return redirect()->route('pasien.index');
        }

    }




    public function finddata(Request $request)
    {
        if($request->search){
            $vpasien=DB::table('pasienfulls')
                        ->where('status_pasien','=',1)
                        ->where(function($query) use($request){
                            $query->where('nama_lengkap','like','%'.$request->search.'%')
                            ->orWhere('no_rm','like','%'.$request->search.'%')
                            ->orWhere('nik','like','%'.$request->search.'%')
                            ->orWhere('no_bpjs','like','%'.$request->search.'%');
                        })
                        ->limit(15)
                        ->get();
            $temp=array();
            foreach ($vpasien as $value) {
                $temp[]=array('label'=>$value->no_rm.' / '.$value->nama_lengkap.' ('.$value->nik.') / Alamat : '.$value->alamat,'value'=>$value->id,'nik'=>$value->nik,
                              'no_rm'=>$value->no_rm,'no_rm_lama'=>$value->no_rm_lama,'nama_lengkap'=>$value->nama_lengkap,'jenis_kelamin'=>$value->jenis_kelamin,'tanggal_lahir'=>$value->tanggal_lahir,
                              'tahun'=>$value->tahun,'bulan'=>$value->bulan,'hari'=>$value->hari,'gol_darah'=>$value->gol_darah,'hp'=>$value->hp,'telp'=>$value->telp,'alamat'=>$value->alamat,
                              'rt'=>$value->rt,'rw'=>$value->rw,'kelurahan'=>$value->kelurahan,'kecamatan'=>$value->kecamatan,'kab_kota'=>$value->kab_kota,'no_bpjs'=>$value->no_bpjs,
                              'kodeproviderpeserta_bpjs'=>$value->kodeproviderpeserta_bpjs,'namaproviderpeserta_bpjs'=>$value->namaproviderpeserta_bpjs,'kodeprovidergigi_bpjs'=>$value->kodeprovidergigi_bpjs,
                              'namaprovidergigi_bpjs'=>$value->namaprovidergigi_bpjs,'tunggakan'=>$value->tunggakan_bpjs,'keterangan_aktif_bpjs'=>$value->keterangan_aktif_bpjs,'namajenispeserta_bpjs'=>$value->namajenispeserta_bpjs,'namajeniskelas_bpjs'=>$value->namajeniskelas_bpjs);
                            }
            return response()->json($temp);
        }
    }

    public function specifiedbyidbpjs(Request $request)
    {
        if($request->ajax()){

            /*pasien bpjs wajib update dulu data dari pcarnya untuk memastikan data sesuai/tidak ada tunggakan*/
            $tampung=KustomHelper::callAPI('GET',$this->api.'/peserta/'.$request->bpjsID);
            if($tampung['metaData']['code']==200){
                $dataBPJS=$tampung['response'];
                $tglMulaiAktif                  =date_create($dataBPJS['tglMulaiAktif']);
                $tglAkhirBerlaku                =date_create($dataBPJS['tglAkhirBerlaku']);
                /*find data*/
                // $pasien=Pasien::where('no_bpjs','=',$request->bpjsID)->first();

                $checkrecord=DB::table('pasiens')->where('no_bpjs','=',$request->bpjsID)->get('id');
                if($checkrecord->count()==1){
                    $pasien=Pasien::where('no_bpjs','=',$request->bpjsID)->first();
                    $pasien->tglmulaiaktif              =date_format($tglMulaiAktif,'Y-m-d');
                    $pasien->tglakhirberlaku            =date_format($tglAkhirBerlaku,'Y-m-d');
                    $pasien->kodeproviderpeserta_bpjs   =$dataBPJS['kdProviderPst']['kdProvider'];
                    $pasien->namaproviderpeserta_bpjs   =$dataBPJS['kdProviderPst']['nmProvider'];
                    $pasien->kodeprovidergigi_bpjs      =$dataBPJS['kdProviderGigi']['kdProvider'];
                    $pasien->namaprovidergigi_bpjs      =$dataBPJS['kdProviderGigi']['nmProvider'];
                    $pasien->kodejeniskelas_bpjs        =$dataBPJS['jnsKelas']['kode'];
                    $pasien->namajeniskelas_bpjs        =$dataBPJS['jnsKelas']['nama'];
                    $pasien->kodejenispeserta_bpjs      =$dataBPJS['jnsPeserta']['kode'];
                    $pasien->namajenispeserta_bpjs      =$dataBPJS['jnsPeserta']['nama'];
                    $pasien->aktif_bpjs                 =$dataBPJS['aktif'];
                    $pasien->keterangan_aktif_bpjs      =$dataBPJS['ketAktif'];
                    $pasien->tunggakan_bpjs             =$dataBPJS['tunggakan'];
                    $pasien->kode_asuransi_bpjs         =$dataBPJS['asuransi']['kdAsuransi'];
                    $pasien->nama_asuransi_bpjs         =$dataBPJS['asuransi']['nmAsuransi'];
                    $pasien->no_asuransi_bpjs           =$dataBPJS['asuransi']['noAsuransi'];
                    $pasien->save();

                    if($pasien){
                        $data_pasien=DB::table('pasienfulls')->select('id','nik','no_bpjs','no_rm','no_rm_lama','nama_lengkap','jenis_kelamin','tanggal_lahir','gol_darah','hp','alamat',
                                                                  'rt','rw','kelurahan','kecamatan','nama_ibu','penanggung_jawab','hubungan_dengan_penanggung_jawab','no_contact_darurat',
                                                                  'status_pasien','wilayah_kerja','tglmulaiaktif','tglakhirberlaku','kodeproviderpeserta_bpjs','namaproviderpeserta_bpjs',
                                                                  'kodeprovidergigi_bpjs','namaprovidergigi_bpjs','kodejeniskelas_bpjs','namajeniskelas_bpjs','kodejenispeserta_bpjs','namajenispeserta_bpjs',
                                                                  'aktif_bpjs','keterangan_aktif_bpjs','tunggakan_bpjs','tahun','bulan','hari','keterangan_aktif_bpjs','tunggakan_bpjs')
                                                                  ->where('status_pasien','=',1)
                                                                  ->Where('no_bpjs','=',$request->bpjsID)
                                                                  ->limit(1)
                                                                  ->get();
                        return response()->json(['status'=>1,'message'=>'data pasien berhasil ditemukan dan diupdate dari P-care','data'=>$data_pasien],200);
                    }
                }else{
                    return response()->json(['status'=>0,'message'=>'pasien ini belum terdaftar di puskesmas, silahkan input pasien baru..!','data'=>$checkrecord],200);
                }
            }else{
                return response()->json(['status'=>0,'message'=>'data tidak ditemukan','data'=>$tampung],200);
            }
        }else{
            redirect('/pendaftaran/create');
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

    public function findatabpjs(Request $request)
    {
        $bpjs_number    =$request->nobpjs;
        if($bpjs_number){
            $tampung=KustomHelper::callAPI('GET',$this->api.'/peserta/'.$bpjs_number);
            return response()->json($tampung);
        }
        return response()->json(['error']);
    }

}
