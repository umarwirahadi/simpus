<?php
namespace App\Helpers;
use Illuminate\support\Facades\DB;
class Kustom{

    public static function setKodePkm(){
        $namapuskesmas=DB::table('profiles')->select('kode_puskesmas')->first();
        return $namapuskesmas->kode_puskesmas;
    }

    public static function getItem($categories='',$default='')
    {
        if(!empty($categories)){
            $item=DB::table('items')->where('status',1)->where('kategori',$categories)->get();
            $dataItem="";            
            if(isset($default)){
                foreach ($item as $key) {                        
                    if($default==$key->kode){
                        $dataItem .="<option value='".$key->kode."' selected='selected'>".$key->item."</option>";    
                    }else{
                        $dataItem .="<option value='".$key->kode."'>".$key->item."</option>";                            
                    }                    
                }        
                return $dataItem;
            }else{
                foreach ($item as $key) {                                            
                    $dataItem .="<option value='".$key->kode."'>".$key->item."</option>";                        
                }
                return $dataItem;
            }
        }else{
            $dataItem="";
            $dataItem .="<option selected>Pilih</option>";
            return $dataItem;
        }
                
    }

    public static function getAllCategories($default='')
    {
        $kat=DB::table('items')->select('kategori')->distinct()->get();
        $dataItem="";

        if(isset($default)){
            foreach ($kat as $key) {
                if($default==$key->kategori){
                    $dataItem .="<option value='".$key->kategori."' selected>".$key->kategori."</option>";
                }else{
                    $dataItem .="<option value='".$key->kategori."'>".$key->kategori."</option>";

                }
            }
        }

                
        return $dataItem;
    }

    public static function getPoli($default=''){
        $item=DB::table('polis')->where('status',1)->get();
        $dataItem="";
        if(!empty($default)){
            foreach ($item as $key) {
                if($key->kode===$default){
                    $dataItem .="<option value='".$key->kode."' selected>".$key->poli."</option>";
                }else{
                    $dataItem .="<option value='".$key->kode."'>".$key->poli."</option>";
                }                
            }  
        }else{
            foreach($item as $key){
                $dataItem .="<option value='".$key->kode."'>".$key->poli."</option>";            
            }
        }
              
        return $dataItem;
    }
}
?>