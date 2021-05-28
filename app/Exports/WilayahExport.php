<?php

namespace App\Exports;

use App\wilayah;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class WilayahExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         $data_wilayah=DB::table('wilayahs')->select(['kel','kec','jenis','kotakab','prov','pos'])->take(10000)->orderBy('id');
        return $data_wilayah;
        // return wilayah::latest()->orderBy('id');
    }
}
