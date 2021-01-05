<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function index()
    {
        $data=[
            'menu'=>'Transaksi',
            'submenu'=>'billing',
            'judul'=>'Data Poli',
            'isDataTable'=>true,
            'isJS'=>'billing.js',
            'datapoli'=>null
        ];
        return view('billing.index',$data);
    }
}
