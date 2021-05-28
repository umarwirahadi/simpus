<?php

namespace App\Http\Controllers;

use App\Pendaftaran;
use App\Pemeriksaan;
use App\Pasien;
use App\Exports\PendaftaranExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use DataTables;
use KustomHelper;


class PendaftaranController extends Controller
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
            'isJS'=>'pendaftaran.js',
            'menu'=>'Transaksi',
            'submenu'=>'Pendaftaran',
            'judul'=>'Pendaftaran Pasien',
            'isDataTable'=>true,
            'dataItem'=>null
        ];
        return view('pendaftaran.index',$data);
    }


    public function create()
    {
        $data=[
            'menu'=>'Transaksi',
            'submenu'=>'Pendaftaran',
            'submenu2'=>'tambah',
            'aksi'=>'Pendaftaran pasien',
            'judul'=>'Pendaftaran Pasien',
            'isDataTable'=>true,
            'isJS'=>'pendaftaran.js',
            'printJS'=>true,
            'dataItem'=>null
        ];
        return view('pendaftaran.add',$data);
    }


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
                $lastQueues=Pendaftaran::where(['kode_poli'=>$request->kode_poli,'tanggal'=>date('Y-m-d')])->max('noantrian');
                if($lastQueues==0){
                    $tempLasQueueFix=1;
                }else{
                    $tempLasQueueFix=intval($lastQueues);
                    ++$tempLasQueueFix;
                }

                /*set pembayaran bpjs & umum*/
                $paymethod="";
                if(($request->tunggakan=='0') and (isset($request->no_bpjs2))){
                    $paymethod="BPJS";
                }else{
                    $paymethod="UMUM";
                }


                if($request->statusbpjs=='AKTIF'){
                    $paymethod="BPJS";
                }else{
                    $paymethod="UMUM";
                }






                $simpanPendaftaran=new Pendaftaran;
                $simpanPendaftaran->no_pendaftaran      =$no_pendaftaran;
                $simpanPendaftaran->noantrian           =$tempLasQueueFix;

                $simpanPendaftaran->kdprovider           =$request->kdprovider?$request->kdprovider:'-';
                $simpanPendaftaran->nmprovider          =$request->nmprovider?$request->nmprovider:'-';

                $simpanPendaftaran->tanggal             =date('Y-m-d');
                $simpanPendaftaran->waktu               =date("H:i:s");
                $simpanPendaftaran->idpasien            =$request->id_pasien2;
                $simpanPendaftaran->no_rm               =$request->no_rm;
                $simpanPendaftaran->usia_tahun          =$request->usia_tahun;
                $simpanPendaftaran->usia_bulan          =$request->usia_bulan;
                $simpanPendaftaran->usia_hari           =$request->usia_hari;
                $simpanPendaftaran->kode_poli           =$request->kode_poli;
                $simpanPendaftaran->cara_daftar         =$request->cara_daftar;
                $simpanPendaftaran->no_kartu_bpjs       =$request->no_bpjs2;
                $simpanPendaftaran->status              =1;
                $simpanPendaftaran->keluhan             =$request->keluhan;
                $simpanPendaftaran->deskripsi           =$request->deskripsi;
                $simpanPendaftaran->cara_bayar          =$paymethod;
                $simpanPendaftaran->save();
                return response()->json(['status'=>1,'message'=>'data pasien berhasil disimpan','data'=>$simpanPendaftaran],200);
            }
    }


    public function show(Pendaftaran $pendaftaran)
    {
        if($pendaftaran){
            $vpendaftaran=DB::table('vpendaftaran')->where(['id'=>$pendaftaran->id])->first();
            return response()->json(['status'=>1,'message'=>'sukses','data'=>$vpendaftaran],200);
        }else{
            return response()->json(['status'=>0,'message'=>'data pendaftaran gagal diambil','data'=>null],200);
        }
    }


    public function edit($id)
    {
        $data_pendaftaran=DB::table('vpendaftaran')->where('id','=',$id)->first();
        $data=[
            'menu'=>'Transaksi',
            'submenu'=>'Pendaftaran',
            'submenu2'=>'edit',
            'aksi'=>'Edit pendaftaran pasien',
            'judul'=>'Edit pendaftaran Pasien',
            'isDataTable'=>true,
            'isJS'=>'pendaftaran.js',
            'printJS'=>true,
            'pendaftaran'=>$data_pendaftaran
        ];
        return view('pendaftaran.edit',$data);
    }


    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        if($request->ajax()){
            if($pendaftaran->kode_poli!=$request->kode_poli){
                $lastQueues=Pendaftaran::where(['kode_poli'=>$request->kode_poli,'tanggal'=>date('Y-m-d')])->max('noantrian');
                if($lastQueues==0){
                    $tempLasQueueFix=1;
                }else{
                    $tempLasQueueFix=intval($lastQueues);
                    ++$tempLasQueueFix;
                }
                $pendaftaran->noantrian=$tempLasQueueFix;
            }

            $pendaftaran->keluhan=$request->keluhan;
            $pendaftaran->deskripsi=$request->deskripsi;
            $pendaftaran->kode_poli=$request->kode_poli;
            $pendaftaran->kunjsakit=$request->kunjsakit;
            $pendaftaran->cara_bayar=$request->cara_bayar;
            $pendaftaran->kdtkp=$request->kdtkp;
            $pendaftaran->update();
        if($pendaftaran){
            return response()->json(['status'=>1,'message'=>'data pendaftaran berhasil diupdate','data'=>null],200);
        }else{
            return response()->json(['status'=>0,'message'=>'data pendaftaran gagal diupdate','data'=>null],200);
        }
        }else{
            redirect('/pendaftaran');
        }
    }


    public function destroy(Pendaftaran $pendaftaran)
    {
        if($pendaftaran){

            $cekbeforedeletepemeriksaan=Pemeriksaan::where('id_pendaftaran',$pendaftaran->id)->first();
            if($cekbeforedeletepemeriksaan){
                return response()->json(['status'=>0,'message'=>'pendaftaran tidak bisa dihapus, karena sudah masuk ke pemeriksaan dokter','data'=>null],200);
            }else{
                $pendaftaran->delete();
                return response()->json(['status'=>1,'message'=>'pendaftaran berhasil dihapus','data'=>null],200);
            }
        }else{
            return redirect('pendaftaran');
        }
    }

    public function kajianawal(Request $request)
    {
        return response()->json(['status'=>1,'message'=>'form kajian awal pasien',
                                 'daftar'=>DB::table('vpendaftaran')->where(['id'=>$request->regID,'tanggal'=>date('Y-m-d')])->first(),
                                 'dataperiksa'=>DB::table('pemeriksaans')->where(['id_pendaftaran'=>$request->regID,'tanggal'=>date('Y-m-d')])->first()],200);
    }

    public function proseskajian(Request $request)
    {
        $cekvalidasi=Validator::make($request->all(),
            ['kajian_idpasien'=>['required'],'kajian_id_pendaftaran'=>['required'],'kajian_sistole'=>['required'],'kajian_no_rm'=>['required'],
            'kajian_diastole'=>['required'],'kajian_tekanan_nadi'=>['required'],'kajian_respirasi'=>['required'],'kajian_suhu'=>['required'],'kajian_berat_badan'=>['required'],
            'kajian_tinggi_badan'=>['required']]
        );
        if($cekvalidasi->fails()){
            return response()->json(['status'=>0,'message'=>'Proses input data pasien tidak bisa dilanjutkan','data'=>$cekvalidasi->errors()],422);
        }else{
            // cek jika pemeriksaan ada harus ditanyakan apakah pasien hanya boleh periksa 1 hari jika lebih pola harus diubah

            // update status pendaftaran menjadi 2 (kajian awal pasien)
            $updatePendaftaran= Pendaftaran::findOrFail($request->kajian_id_pendaftaran);
            if($updatePendaftaran){

                $updatePendaftaran->status=2;
                $updatePendaftaran->update();
                // return response()->json(['status'=>1,'message'=>'status pendaftaran pasien berhasil diupdate','data'=>null],200);
                $cekpemeriksaan=Pemeriksaan::where(['idpasien'=>$request->kajian_idpasien,'tanggal'=>date('Y-m-d')]);
                if($cekpemeriksaan->count()==0){
                    $pemeriksaan=new Pemeriksaan;
                    $pemeriksaan->idpasien=$request->kajian_idpasien;
                    $pemeriksaan->id_pendaftaran=$request->kajian_id_pendaftaran;
                    $pemeriksaan->tanggal=date('Y-m-d');
                    $pemeriksaan->jam=date("H:i:s");
                    $pemeriksaan->kasus='Kasus';
                    $pemeriksaan->sistole=$request->kajian_sistole;
                    $pemeriksaan->diastole=$request->kajian_diastole;
                    $pemeriksaan->tekanan_nadi=$request->kajian_tekanan_nadi;
                    $pemeriksaan->respirasi=$request->kajian_respirasi;
                    $pemeriksaan->suhu=$request->kajian_suhu;
                    $pemeriksaan->berat_badan=$request->kajian_berat_badan;
                    $pemeriksaan->tinggi_badan=$request->kajian_tinggi_badan;
                    $pemeriksaan->keluhan_utama='-';
                    $pemeriksaan->pemeriksaan_fisik='-';
                    $pemeriksaan->diagnosa='-';
                    $pemeriksaan->terapi='-';
                    $pemeriksaan->anamnesa=$request->kajian_anamnesa;
                    $pemeriksaan->keterangan='';
                    $pemeriksaan->id_petugas=\Auth::user()->id;
                    $pemeriksaan->status=2;
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
                    $updatepemeriksaan->sistole=$request->kajian_sistole;
                    $updatepemeriksaan->diastole=$request->kajian_diastole;
                    $updatepemeriksaan->tekanan_nadi=$request->kajian_tekanan_nadi;
                    $updatepemeriksaan->respirasi=$request->kajian_respirasi;
                    $updatepemeriksaan->suhu=$request->kajian_suhu;
                    $updatepemeriksaan->berat_badan=$request->kajian_berat_badan;
                    $updatepemeriksaan->tinggi_badan=$request->kajian_tinggi_badan;
                    $updatepemeriksaan->keluhan_utama='-';
                    $updatepemeriksaan->anamnesa=$request->kajian_anamnesa;
                    $updatepemeriksaan->terapi='-';
                    $updatepemeriksaan->diagnosa='-';
                    $updatepemeriksaan->keterangan='';
                    $updatepemeriksaan->id_petugas=\Auth::user()->id;
                    $updatepemeriksaan->status=2;
                    $updatepemeriksaan->update();
                    return response()->json(['status'=>1,'message'=>'data pemeriksaan berhasil diubah ','data'=>$updatepemeriksaan],200);
                }

            }else{
                return response()->json(['status'=>1,'message'=>'status pendaftaran pasien gagal diupdate','data'=>null],200);
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
                            <button type="button" class="btn btn-success btn-sm" data-toggle="dropdown" aria-expanded="false">
                              <i class="fa fa-arrow-circle-down"></i>
                            </button>
                                <form action="pendaftaran" method="post" id="form-delete-pendaftaran" style="display: none">
                                    <input type="hidden" name="_token" value="'.csrf_token().'" />
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <input type="hidden" name="idpemeriksaan" value="'.$pasien->id.'" />
                                </form>
                            <div class="dropdown-menu bg-gray" role="menu" style="">
                              <a class="dropdown-item data-kajian-awal" href="javascript:void(0)" data-id="'.$pasien->id.'" title="kajian awal pasien"><i class="fa fa-stethoscope"></i> Kajian awal</a>
                              <a class="dropdown-item view-pendaftaran" href="javascript:void(0)" data-id="'.$pasien->id.'" title="kajian awal pasien"><i class="fa fa-eye"></i> view pendaftaran</a>
                              <a class="dropdown-item" href="pendaftaran/'.$pasien->id.'/edit" data-id="'.$pasien->id.'" ><i class="fa fa-user-edit"></i> edit pendaftaran</a>
                              <button class="dropdown-item text text-white delete-pendaftaran" data-id="'.$pasien->id.'"><i class="fa fa-times-circle"></i> hapus pendaftaran</button>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item send-register-pcare" href="javascript:void(0)" data-id="'.$pasien->id.'"><i class="fa fa-sync-alt"></i> Kirim ke Pcare</a>
                              <a class="dropdown-item delete-register-pcare" href="javascript:void(0)" data-id="'.$pasien->id.'"><i class="fa fa-minus-circle"></i> Hapus dari Pcare</a>
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


    public function sendPcare(Request $request)
    {
        if($request->ajax()){
            $prepareData=DB::table('pcare_pendaftaran')->where('id','=',$request->regID)->first();
            if($prepareData){

                if($prepareData->nourut_pcare==NULL || $prepareData->nourut_pcare==''){
                    $tgldaftar                =date_create($prepareData->tanggal);
                    $prepareOfData=array("kdProviderPeserta"=>$prepareData->kdprovider,"tglDaftar"=>date_format($tgldaftar,'d-m-Y'),
                                         "noKartu"=>$prepareData->no_kartu_bpjs,"kdPoli"=>$prepareData->kode_poli,"keluhan"=>$prepareData->keluhan,
                                         "kunjSakit"=>$prepareData->kunjsakit==1?"true":"false","sistole"=>$prepareData->sistole,"diastole"=>$prepareData->diastole,
                                         "beratBadan"=>$prepareData->berat_badan,"tinggiBadan"=>$prepareData->tinggi_badan,"respRate"=>$prepareData->respirasi,
                                         "heartRate"=>$prepareData->tekanan_nadi,"rujukBalik"=>$prepareData->rujukBalik,"kdTkp"=>$prepareData->kdtkp);

                    $tampung=KustomHelper::callAPI('POST',$this->api.'/pendaftaran',$prepareOfData);
                    if($tampung['metaData']['code']==201){
                        $dataBPJS=$tampung['response'];
                        $updatenourut_pcare=Pendaftaran::find($request->regID);
                        $updatenourut_pcare->status_pcare='1';
                        $updatenourut_pcare->nourut_pcare=$dataBPJS['message'];
                        $updatenourut_pcare->update();
                        return response()->json(['status'=>1,'message'=>'data berhasil dikirim ke P-Care','data'=>null],200);
                    }else{
                        $error_respon=$tampung['response'];
                        return response()->json(['status'=>0,'message'=>$error_respon[0]['message'],'data'=>null],200);
                    }
                }else{
                    return response()->json(['status'=>0,'message'=>'pasien sudah terdaftar di P-Care','data'=>null],200);
                }
            }else{
                return response()->json(['status'=>0,'message'=>'data gagal dikirim ke P-Care, pastikan data pasien sudah kajian awal','data'=>null],200);
            }
        }else{
            redirect('/pendaftaran');
        }
    }

    public function deletependaftaranpcare(Request $request)
    {
        if($request->ajax()){
            $prepareData=DB::table('pcare_pendaftaran')->where('id','=',$request->regID)->where('status_pcare','=','1')->first();
            if($prepareData){
                $tgldaftar                =date_create($prepareData->tanggal);
                $nokartu                  =$prepareData->no_kartu_bpjs;
                $nourut                   =$prepareData->nourut_pcare;
                $kode_poli                =$prepareData->kode_poli;
                $tampung=KustomHelper::callAPI('DELETE',$this->api.'/pendaftaran/peserta/'.$nokartu.'/tglDaftar/'.date_format($tgldaftar,'d-m-Y').'/noUrut/'.$nourut.'/kdPoli/'.$kode_poli);
                // dd($tampung);
                if($tampung['metaData']['code']==200){
                    $updatenourut_pcare=Pendaftaran::find($request->regID);
                    $updatenourut_pcare->status_pcare='0';
                    $updatenourut_pcare->nourut_pcare='';
                    $updatenourut_pcare->update();
                    return response()->json(['status'=>1,'message'=>'data berhasil DIHAPUS dari P-Care','data'=>null],200);
                }else{
                    return response()->json(['status'=>0,'message'=>'data pcare gagal dihapus','data'=>null],200);
                }

            }else{
                return response()->json(['status'=>0,'message'=>'Proses hapus data pcare gagal ','data'=>null],200);
            }
        }else{
            redirect('/pendaftaran');
        }
    }

    public function cekstatusBPJS(Request $request)
    {
            if($request->ajax()){
                if(!empty($request->no_bpjs2))
                {
                    $tampung=KustomHelper::callAPI('GET',$this->api.'/peserta/'.$request->no_bpjs2);
                    // dd($tampung);
                    if($tampung['metaData']['code']==200){
                        $dataBPJS=$tampung['response']; /*destructing data*/
                            $tglMulaiAktif                  =date_create($dataBPJS['tglMulaiAktif']);
                            $tglAkhirBerlaku            =date_create($dataBPJS['tglAkhirBerlaku']);

                            $pasien=Pasien::where('no_bpjs','=',$request->no_bpjs2)->first();
                            // dd($pasien);

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
                            $pasien->update();

                        if($dataBPJS['ketAktif']=='AKTIF'){
                            return response()->json(['status'=>1,'message'=>'peserta terdata AKTIF di FKTP '.$dataBPJS['kdProviderPst']['nmProvider'],'data'=>null],200);
                        }else{
                            return response()->json(['status'=>2,'message'=>'peserta terdata TIDAK AKTIF, harus menjadi pasien umum ','data'=>null],200);
                        }
                    }else{
                        return response()->json(['status'=>0,'message'=>'pengecekan no kartu BPJS tidak bisa diproses..!','data'=>null],200);
                    }
                }else{
                    return response()->json(['status'=>0,'message'=>'no kartu BPJS kosong..!','data'=>null],200);
                }
            }else{
                return redirect()->route('pendaftaran.create');
            }
    }
}
