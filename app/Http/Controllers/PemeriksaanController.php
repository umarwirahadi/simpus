<?php
namespace App\Http\Controllers;
use App\Pemeriksaan;
use App\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use DataTables;

class PemeriksaanController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $data=[
            'menu'=>'Transaksi',
            'submenu'=>'Pemeriksaan',
            'judul'=>'Pemeriksaan Pasien',
            'isDataTable'=>true,
            'isJS'=>'pemeriksaan.js',
            'jumlah'=>DB::table('vpendaftaran')->where(['kode_poli'=>Cookie::get('id_poli'),'tanggal'=>date('Y-m-d')])->count(),
            'jumlahTunggu'=>DB::table('vpendaftaran')->where(['kode_poli'=>Cookie::get('id_poli'),'tanggal'=>date('Y-m-d')])->where('status','<>',3)->count(),
            'jumlahDiperiksa'=>DB::table('vpendaftaran')->where(['kode_poli'=>Cookie::get('id_poli'),'tanggal'=>date('Y-m-d'),'status'=>2])->count(),
            'dataItem'=>DB::table('vpendaftaran')->where(['kode_poli'=>Cookie::get('id_poli'),'tanggal'=>date('Y-m-d')])->get()
        ];
        return view('pemeriksaan.index',$data);
    }

    public function create($id)
    {
        $data=[
            'menu'=>'Transaksi',
            'judul'=>'Pemeriksaan Pasien',
            'submenu'=>'Pemeriksaan',
            'submenu2'=>'proses pemeriksaan pasien',
            'isDataTable'=>true,
            'isJS'=>'pemeriksaan.js',
            ''=>'pemeriksaan.js',
            // 'dataItem'=>DB::table('vpendaftaran')->where(['id'=>$request->idpemeriksaan,'tanggal'=>date('Y-m-d')])->first(),
            // 'pemeriksaan'=>Pemeriksaan::where('id', $request->idpemeriksaan)->first(),
            // 'dataRiwayatPeriksa'=>DB::table('pemeriksaans')->join('vpendaftaran',function($join){
            //     $join->on('pemeriksaans.id_pendaftaran','=','vpendaftaran.no_pendaftaran');
            //     $join->on('pemeriksaans.tanggal','=','vpendaftaran.tanggal');
            //     })
            //     ->select(['pemeriksaans.id','pemeriksaans.idpasien','pemeriksaans.id_pendaftaran','pemeriksaans.tanggal','pemeriksaans.diagnosa','vpendaftaran.usia_tahun','vpendaftaran.usia_bulan','vpendaftaran.usia_hari'])
            //     ->where('pemeriksaans.idpasien',$request->idpasien)
            //     ->orderBy('pemeriksaans.tanggal', 'desc')
            //     ->get()
        ];
        // return view('pemeriksaan.proses',$data);

    }

    public function store(Request $request)
    {
        $cekvalidasi=Validator::make($request->all(),
            ['idpasien'=>['required'],'id_pendaftaran'=>['required'],'sistole'=>['required'],
            'diastole'=>['required'],'tekanan_nadi'=>['required'],'respirasi'=>['required'],'suhu'=>['required'],'berat_badan'=>['required'],
            'tinggi_badan'=>['required'],'keluhan_utama'=>['required'],'pemeriksaan_fisik'=>['required'],'anamnesa'=>['required'],
            'terapi'=>['required'],'diagnosa'=>['required','min:10'],'resep_obat'=>['required']]
        );
        if($cekvalidasi->fails()){
            return response()->json(['status'=>0,'message'=>'Proses input data pasien tidak bisa dilanjutkan','data'=>$cekvalidasi->errors()],422);
        }else{
            //cek jika pemeriksaan ada harus ditanyakan apakah pasien hanya boleh periksa 1 hari jika lebih pola harus diubah
            $cekpemeriksaan=Pemeriksaan::where(['idpasien'=>$request->idpasien,'tanggal'=>date('Y-m-d')]);
            if($cekpemeriksaan->count()==0){
                $pemeriksaan=new Pemeriksaan;
                $pemeriksaan->idpasien=$request->idpasien;
                $pemeriksaan->id_pendaftaran=$request->id_pendaftaran;
                $pemeriksaan->tanggal=date('Y-m-d');
                $pemeriksaan->jam=date("H:i:s");
                $pemeriksaan->kunjungan=$request->idpasien;
                $pemeriksaan->kasus='kasus euy';
                $pemeriksaan->sistole=$request->sistole;
                $pemeriksaan->diastole=$request->diastole;
                $pemeriksaan->tekanan_nadi=$request->tekanan_nadi;
                $pemeriksaan->respirasi=$request->respirasi;
                $pemeriksaan->suhu=$request->suhu;
                $pemeriksaan->berat_badan=$request->berat_badan;
                $pemeriksaan->tinggi_badan=$request->tinggi_badan;
                $pemeriksaan->keluhan_utama=$request->keluhan_utama;
                $pemeriksaan->pemeriksaan_fisik=$request->pemeriksaan_fisik;
                $pemeriksaan->anamnesa=$request->anamnesa;
                $pemeriksaan->terapi=$request->terapi;
                $pemeriksaan->diagnosa=$request->diagnosa;
                $pemeriksaan->resep_obat=$request->resep_obat;
                $pemeriksaan->pcare_kdsadar=$request->pcare_kdsadar;
                $pemeriksaan->pcare_kd_status_pulang=$request->pcare_kd_status_pulang;
                $pemeriksaan->pcare_tgl_pulang=date('Y-m-d');
                $pemeriksaan->status=3;
                $pemeriksaan->save();
                /*proses update data pendaftaran menjadi 2*/
                $updatependaftaran=DB::table('pendaftarans')->where('id',$pemeriksaan->id_pendaftaran)->update(['status'=>3]);
                return response()->json(['status'=>1,'message'=>'pemeriksaan pasien berhasil disimpan','data'=>null],200);
            }
            else{
                $isexist=$cekpemeriksaan->first();
                $updatepemeriksaan=Pemeriksaan::find($isexist->id);
                $updatepemeriksaan->idpasien=$request->idpasien;
                $updatepemeriksaan->id_pendaftaran=$request->id_pendaftaran;
                $updatepemeriksaan->tanggal=date('Y-m-d');
                $updatepemeriksaan->jam=date("H:i:s");
                $updatepemeriksaan->kunjungan=$request->idpasien;
                $updatepemeriksaan->kasus=$request->idpasien;
                $updatepemeriksaan->sistole=$request->sistole;
                $updatepemeriksaan->diastole=$request->diastole;
                $updatepemeriksaan->tekanan_nadi=$request->tekanan_nadi;
                $updatepemeriksaan->respirasi=$request->respirasi;
                $updatepemeriksaan->suhu=$request->suhu;
                $updatepemeriksaan->berat_badan=$request->berat_badan;
                $updatepemeriksaan->tinggi_badan=$request->tinggi_badan;
                $updatepemeriksaan->keluhan_utama=$request->keluhan_utama;
                $updatepemeriksaan->pemeriksaan_fisik=$request->pemeriksaan_fisik;
                $updatepemeriksaan->anamnesa=$request->anamnesa;
                $updatepemeriksaan->terapi=$request->terapi;
                $updatepemeriksaan->diagnosa=$request->diagnosa;
                $updatepemeriksaan->resep_obat=$request->resep_obat;
                $updatepemeriksaan->pcare_kdsadar=$request->pcare_kdsadar;
                $updatepemeriksaan->pcare_kd_status_pulang=$request->pcare_kd_status_pulang;
                $updatepemeriksaan->pcare_tgl_pulang=date('Y-m-d');
                $updatepemeriksaan->status=3;
                $updatepemeriksaan->status=3;
                $updatepemeriksaan->update();
                $updatependaftaran=DB::table('pendaftarans')->where('id',$updatepemeriksaan->id_pendaftaran)->update(['status'=>3]);
                return response()->json(['status'=>1,'message'=>'pemeriksaan pasien berhasil diupdate ','data'=>null],200);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemeriksaan $pemeriksaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemeriksaan $pemeriksaan)
    {
        //
    }

    public function update(Request $request, Pemeriksaan $pemeriksaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemeriksaan $pemeriksaan)
    {
        //
    }



    public function proses($id)
    {
        $data_pendaftaran=DB::table('vpendaftaran')->where(['id'=>$id,'tanggal'=>date('Y-m-d')])->first();
        $data=[
            'menu'=>'Transaksi',
            'judul'=>'Pemeriksaan Pasien',
            'submenu'=>'Pemeriksaan',
            'submenu2'=>'proses pemeriksaan pasien',
            'isDataTable'=>true,
            'isJS'=>'pemeriksaan.js',
            'dataItem'=>$data_pendaftaran,
            'pemeriksaan'=>Pemeriksaan::where('id_pendaftaran', $id)->first(),
            'dataRiwayatPeriksa'=>DB::table('v_riwayat_pemeriksaan')
                ->where('idpasien',$data_pendaftaran->idpasien)
                ->orderBy('tanggal', 'desc')
                ->get()
        ];
        return view('pemeriksaan.proses',$data);
    }



    public function setpoli(Request $request)
    {
        if($request->ajax()){
            $id_poli=$request->poli;
            $id_dokter=$request->id_petugas;
            $cookie= cookie('id_poli', $id_poli,86400*30);
            // $cookie= cookie('id_dokter', $id_dokter,86400*30);
            return response(['status'=>1,'message'=>'data perubahan poli dan dokter berhasil dilakukan'])->cookie($cookie);
        }else{
            return redirect('pemeriksaan');
        }
    }

    public function fetchToday()
    {
        $pasien=DB::table('vpendaftaran')->where(['kode_poli'=>Cookie::get('id_poli'),'tanggal'=>date('Y-m-d')])->get();
        return Datatables::of($pasien)
                        // ->addIndexColumn()
                        ->addColumn('status_periksa', function($data) {
                            if($data->status==2){
                                $icon= '<span class="text text-warning"><i class="fa fa-exclamation-triangle"></i> blm  dilayani</span>';
                            }elseif($data->status==3){
                                $icon= '<span class="text text-success"><i class="fa fa-check"></i> sdh  dilayani</span>';
                            }else{
                                $icon= '<span class="text text-danger"><i class="fa fa-times"></i> Kajian awal</span>';
                            }
                            return $icon;
                        })
                        ->addColumn('aksi', function($pasien){
                            $btn='<div class="btn-group">
                            <button type="button" class="btn btn-success btn-sm" data-toggle="dropdown" aria-expanded="false">
                              <i class="fa fa-arrow-circle-down"></i>
                            </button>
                            <div class="dropdown-menu bg-gray" role="menu" style="">
                            <form action="prosespemeriksaan" method="post" id="create-form-pemeriksaan" style="display: none">
                            <input type="hidden" name="_token" value="'.csrf_token().'" />
                            <input type="hidden" name="idpemeriksaan" value="'.$pasien->id.'" />
                          </form>
                          </a>
                              <a class="dropdown-item data-kajian-awal" href="javascript:void(0)" data-id="'.$pasien->id.'" title="kajian awal pasien"><i class="fa fa-stethoscope"></i> Kajian awal</a>
                              <a class="dropdown-item add-pemeriksaann" href="/prosespemeriksaan/'.$pasien->id.'"  title="pemeriksaan pasien"><i class="fa fa-eye"></i> Pemeriksaan</a>
                              <a class="dropdown-item" href="pendaftaran/'.$pasien->id.'/edit" data-id="'.$pasien->id.'" ><i class="fa fa-user-edit"></i> edit pendaftaran</a>
                              <a class="dropdown-item" href="javascript:void(0)" data-id="'.$pasien->id.'"><i class="fa fa-times-circle"></i> hapus pendaftaran</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item send-register-pcare" href="javascript:void(0)" data-id="'.$pasien->id.'"><i class="fa fa-sync-alt"></i> Kirim ke Pcare</a>
                              <a class="dropdown-item delete-register-pcare" href="javascript:void(0)" data-id="'.$pasien->id.'"><i class="fa fa-minus-circle"></i> Hapus dari Pcare</a>
                            </div>
                          </div>';
                            return $btn;
                        })
                        ->rawColumns(['aksi','status_periksa'])
                        ->toJson();
    }


}
