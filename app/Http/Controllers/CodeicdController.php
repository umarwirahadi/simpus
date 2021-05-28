<?php

namespace App\Http\Controllers;

use App\Codeicd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use KustomHelper;

class CodeicdController extends Controller
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
            'menu'=>'Master',
            'submenu'=>'ICD-10',
            'judul'=>'data kode ICD-10',
            'isDataTable'=>true,
            'isJS'=>'icd.js',
            'dataItem'=>null
        ];
        return view('icd.index',$data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\codeicd  $codeicd
     * @return \Illuminate\Http\Response
     */
    public function show(codeicd $codeicd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\codeicd  $codeicd
     * @return \Illuminate\Http\Response
     */
    public function edit(codeicd $codeicd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\codeicd  $codeicd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, codeicd $codeicd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\codeicd  $codeicd
     * @return \Illuminate\Http\Response
     */
    public function destroy(codeicd $codeicd)
    {
        //
    }

    public function fetch()
    {
        $dataICD=DB::table('icd10')->select(['id','id_icd','id_icd2','chapter','section','descriptions','gender','agegroup'])->orderBy('id');
        return Datatables::of($dataICD)
                        ->addIndexColumn()
                        ->addColumn('aksi', function($icd){
                            $btn='<div class="btn-group btn-sm">
                            <a href="pasien/'.$icd->id.'" class="btn btn-default">View</a>
                            <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu" style="">
                              <a class="dropdown-item" href="#">Edit</a>
                              <a class="dropdown-item" href="#">Print KIB</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Delete</a>
                            </div>
                          </div>';
                            return $btn;
                        })
                        ->rawColumns(['aksi'])
                        ->toJson();
    }
}
