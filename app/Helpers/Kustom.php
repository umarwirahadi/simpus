<?php
namespace App\Helpers;
use Illuminate\support\Facades\DB;
class Kustom{
    public static function getItem($categories='',$default='')
    {
        if(!empty($categories)){
            $item=DB::table('items')->where('status',1)->where('kategori',$categories)->get();
            $dataItem="";
            foreach ($item as $key) {
                if(!empty($default)){
                    if($key->kode==$default){
                        $dataItem .="<option value='".$key->kode."' selected>".$key->item."</option>";    
                    }
                    $dataItem .="<option value='".$key->kode."'>".$key->item."</option>";    
                }else{
                    $dataItem .="<option value='".$key->kode."'>".$key->item."</option>";    
                }
            }        
            return $dataItem;
        }else{
            $dataItem="";
            $dataItem .="<option selected>Pilih</option>";
            return $dataItem;
        }
        
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