<?php
namespace App\Helpers;
use Illuminate\support\Facades\DB;
class Kustom{
    public static function getItem($categories=null,$default=null)
    {
        $item=DB::table('items')->where('status',1)->where('kategori',$categories)->get();
        $dataItem="";
        foreach ($item as $key) {
            $dataItem .="<option value='".$key->kode."'>".$key->item."</option>";    
        }        
        return $dataItem;
    }

    public static function getAllCategories()
    {
        $kat=DB::table('items')->select('kategori')->distinct()->get();
        $dataItem="";
        foreach ($kat as $key) {
            $dataItem .="<option value='".$key->kategori."'>".$key->kategori."</option>";
        }        
        return $dataItem;
    }
}
?>