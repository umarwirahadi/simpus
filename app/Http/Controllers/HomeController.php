<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data=[
            'menu'=>'Home',
            'submenu'=>'dashboard',
            'judul'=>'Pemeriksaan Pasien',
            'isDataTable'=>true,
            'isJS'=>'pemeriksaan.js',
            'dataItem'=>null
        ];
        return view('home.index',$data);
    }
}
