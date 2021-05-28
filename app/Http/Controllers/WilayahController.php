<?php
namespace App\Http\Controllers;

use App\Exports\WilayahExport;
use App\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Maatwebsite\Excel\Facades\Excel;

class WilayahController extends Controller
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
            'menu'=>'Master',
            'submenu'=>'Alamat',
            'judul'=>'Data Alamat',
            'isDataTable'=>true,
            'isJS'=>'wilayah.js',
            'dataItem'=>null
        ];
        return view('wilayah.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'menu'=>'Master',
            'submenu'=>'alamat',
            'submenu2'=>'tambah alamat',
            'judul'=>'Data Alamat',
            'aksi'=>'Data alamat',
            'isDataTable'=>true,
            'isJS'=>'wilayah.js',
            'dataItem'=>null
        ];
        return view('wilayah.add',$data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->ajax()){
        $validasi=$request->validate([
        'kel'=>'required','kec'=>'required','jenis'=>'required','kotakab'=>'required','prov'=>'required','pos'=>'required']);
            $wilayah=new Wilayah();
            $wilayah->kel       =$request->kel;
            $wilayah->kec       =$request->kec;
            $wilayah->jenis     =$request->jenis;
            $wilayah->kotakab   =$request->kotakab;
            $wilayah->prov      =$request->prov;
            $wilayah->pos       =$request->pos;
            $wilayah->save();
            return response()->json(['status'=>1,'message'=>'data tenaga medis berhasil disimpan','data'=>$insertTenagamedis],200);
    }else{
        return redirect('wilayah');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function show(wilayah $wilayah)
    {
        $data=[
            'menu'=>'Master',
            'submenu'=>'Alamat',
            'submenu2'=>'show wilayah',
            'aksi'=>'Data alamat',
            'judul'=>'Data alamat',
            'isDataTable'=>true,
            'isJS'=>'wilayah.js',
            'data'=>$wilayah
        ];
        return view('wilayah.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function edit(wilayah $wilayah)
    {
        $data=[
            'menu'=>'Master',
            'submenu'=>'Alamat',
            'submenu2'=>'edit alamat',
            'aksi'=>'Data alamat',
            'judul'=>'Data alamat',
            'isDataTable'=>true,
            'isJS'=>'wilayah.js',
            'data'=>$wilayah
        ];
        return view('wilayah.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, wilayah $wilayah)
    {

        if($request->has('update')){
            $wilayah->kel       =$request->kel??$wilayah->kel;
            $wilayah->kec       =$request->kec??$wilayah->kec;
            $wilayah->jenis     =$request->jenis??$wilayah->jenis;
            $wilayah->kotakab   =$request->kotakab??$wilayah->kotakab;
            $wilayah->prov      =$request->prov??$wilayah->prov;
            $wilayah->pos       =$request->pos??$wilayah->pos;
            $wilayah->save();
            return redirect('wilayah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function destroy(wilayah $wilayah)
    {
        if($wilayah){
            $wilayah->delete();
            return response()->json(['status'=>1,'message'=>'data poli berhasil dihapus','data'=>null],200);
        }else{
            return redirect()->route('wilayah.index')->with('status', 'data Poli gagal dihapus');
        }
    }


    public function fetch()
    {
        $wilayah=DB::table('wilayahs')->select(['id','kel','kec','jenis','kotakab','prov','pos'])->orderBy('id','desc');
        return Datatables::of($wilayah)
                        ->addIndexColumn()
                        ->addColumn('aksi', function($data){


                            $btn='<div class="btn-group">
                            <a href="wilayah/'.$data->id.'/edit" class="btn btn-success btn-sm"><i class="fas fa-pen"
                                title="edit item"></i></a>
                            <a href="wilayah/'.$data->id.'" class="btn btn-primary btn-sm detail" id="{{$item->id}}">
                                <i class="fas fa-search"
                                title="detail data"></i></a>
                            <button class="btn btn-danger btn-sm delete-date" data-id="'.$data->id.'">
                                <i class="fas fa-trash-alt"
                                title="Hapus"></i></button>
                          </div>';
                            return $btn;
                        })
                        ->rawColumns(['aksi'])
                        ->toJson();
    }

    public function finddata(Request $request)
    {
        if($request->search){
            $wilayah=DB::table('wilayahs')
                        ->select('kel','kec','kotakab','prov','pos')
                        ->where('kel','like','%'.$request->search.'%')
                        ->orWhere('kec','like','%'.$request->search.'%')
                        ->orWhere('kotakab','like','%'.$request->search.'%')
                        ->limit(10)
                        ->get();
            $temp=array();
            foreach ($wilayah as $value) {
                $temp[]=array('label'=>$value->kel.' - '.$value->kec.' - '.$value->kotakab.'- '.$value->prov.' - '.$value->pos,'value'=>$value->kel,'kel'=>$value->kel,
                                'kec'=>$value->kec,'kotakab'=>$value->kotakab,'prov'=>$value->prov,'pos'=>$value->pos);
            }

            return response()->json($temp);
        }
    }

    public function export()
    {
        // $logs = Wilayah::orderByRaw('FIELD(kotakab,"CIMAHI")','ASC')->get();
        $logs = Wilayah::orderBy('id')->cursor();
        $filename = "data-wilayah.csv";

        return response()->streamDownload(function() use ($logs) {
            $csv = fopen("php://output", "w+");

            fputcsv($csv, ["id","kel", "kec", "Jenis", "kotakab", "prov","pos"]);

            foreach ($logs as $log) {
                fputcsv($csv, [
                    $log->id,
                    $log->kel,
                    $log->kec,
                    $log->jenis,
                    $log->kotakab,
                    $log->prov,
                    $log->pos
                ]);
            }

            fclose($csv);
        }, $filename, ["Content-type" => "text/csv"]);
    }


}
