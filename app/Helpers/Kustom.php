<?php
namespace App\Helpers;
use Illuminate\support\Facades\DB;
class Kustom{
    public  static $consID 	    = "";
    public  static $secretKey 	= "2wJ43627A6";        
    public  static $pcareUname   = "00930018.test";
    public  static $pcarePWD 	= "Bpjs2021#";
    public  static $kdAplikasi	= "095";

    public function __construct()
    {
        $this->consID="3909";
    }
    
    public static function setKodePkm(){
        $namapuskesmas=DB::table('profiles')->select('kode_puskesmas')->first();
        if($namapuskesmas){
            return $namapuskesmas->kode_puskesmas;
        }else{
            
        }
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
 
    public static function setLabelPoli($kode=''){
        $item=DB::table('polis')->where('status',1)->where('kode',$kode)->first();
        $dataItem="";
        if(!empty($kode)){
            $dataItem .='<div class="text text-primary" id="datanull">'.$item->poli.'</div>';
            
        }else{
            $dataItem .='<div class="text text-danger" id="datanull">Poli belum di set</div>';
        }
              
        return $dataItem;
    }

    public static function bridgeData(){

        $consumenID=self::$consID;
        $secretKey=self::$secretKey;
        $pcareUname=self::$pcareUname;
        $pcarePWD=self::$pcarePWD;
        $kdAplikasi=self::$kdAplikasi;

        date_default_timezone_set('UTC');
        $generate_timestamp = strval(time()-strtotime('1970-01-01 00:00:00'));

        $data 		= $consumenID.'&'.$generate_timestamp;		
        $generate_signature = hash_hmac('sha256', $data, $secretKey, true);
        $signature = base64_encode($generate_signature);

        $encodedAuthorization = base64_encode($pcareUname.':'.$pcarePWD.':'.$kdAplikasi);       
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://dvlp.bpjs-kesehatan.go.id:9081/pcare-rest-v3.0/peserta/0000445402541',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_SSL_VERIFYPEER =>FALSE,
        CURLOPT_SSL_VERIFYHOST=>FALSE,
        CURLOPT_HTTPHEADER => array(
            'X-cons-id: 3909',
            'X-Timestamp: '.$generate_timestamp,
            'X-Signature: '.$signature,
            'X-Authorization: Basic '.$encodedAuthorization,
            'Cookie: BIGipServerdvlp_https_pool_9081=2181371820.31011.0000'
        ),
        ));
        $response = curl_exec($curl);
        $data=json_decode($response,true);
        curl_close($curl);
        return json_encode($response);        
    }

    public static function readingdatamaster(){
        $item=DB::table('pcaresettings')->where('status',1)->first();
        return $item;
    }
}
?>