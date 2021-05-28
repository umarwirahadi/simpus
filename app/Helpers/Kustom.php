<?php
namespace App\Helpers;
use Illuminate\support\Facades\DB;
class Kustom{

    public static function setKodePkm(){
        $namapuskesmas=DB::table('profiles')->select('kode_puskesmas')->first();
        if($namapuskesmas){
            return $namapuskesmas->kode_puskesmas;
        }else{
            return null;
        }
    }


    public static function setProfilePKM(){
        $pkm=DB::table('profiles')->first();
        if($pkm){
            return $pkm;
        }else{
            return null;
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
                if($key->kode_pcare===$default){
                    $dataItem .="<option value='".$key->kode_pcare."' selected>".$key->poli."</option>";
                }else{
                    $dataItem .="<option value='".$key->kode_pcare."'>".$key->poli."</option>";
                }
            }
        }else{
            foreach($item as $key){
                $dataItem .="<option value='".$key->kode_pcare."'>".$key->poli."</option>";
            }
        }

        return $dataItem;
    }

    public static function getDokter($default=''){
        $item=DB::table('tenagamedis')->where('status',1)->where('jenistenagamedis','=','dokter')->get();
        $dataItem="";
        if(!empty($default)){
            foreach ($item as $key) {
                if($key->kode_pcare===$default){
                    $dataItem .="<option value='".$key->id."' selected>".$key->nama_lengkap."</option>";
                }else{
                    $dataItem .="<option value='".$key->id."'>".$key->nama_lengkap."</option>";
                }
            }
        }else{
            foreach($item as $key){
                $dataItem .="<option value='".$key->id."'>".$key->nama_lengkap."</option>";
            }
        }

        return $dataItem;
    }

    public static function setLabelPoli($kode=''){
        $item=DB::table('polis')->where('status',1)->where('kode_pcare',$kode)->first();
        $dataItem="";
        if(!empty($kode)){
            $dataItem .='<div class="text text-primary" id="datanull">'.$item->poli.'</div>';

        }else{
            $dataItem .='<div class="text text-danger" id="datanull">Poli belum di set</div>';
        }

        return $dataItem;
    }

    public static function setLabeldokter($kode=''){
        $item=DB::table('tenagamedis')->where('status',1)->where('id',$kode)->first();
        $dataItem="";
        if(!empty($kode)){
            $dataItem .='<div class="text text-primary" id="datanull">'.$item->nama_lengkap.'</div>';

        }else{
            $dataItem .='<div class="text text-danger" id="datanull">dokter belum di set</div>';
        }
        return $dataItem;
    }

    public static function bridgeData(){

         /* get data from db setting check data akun pcare for bridging*/
         $result=DB::table('pcaresettings')->select('username_pcare','password_pcare','consumen_pcare','secretkey_pcare','aplicationcode_pcare')->where('status',1)->first();
         /*setting data for each variable*/
         $consumenID        =$result->consumen_pcare;
         $secretKey         =$result->secretkey_pcare;
         $pcareUname        =$result->username_pcare;
         $pcarePWD          =$result->password_pcare;
         $kdAplikasi        =$result->aplicationcode_pcare;

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

    public static function callAPI($method='',$url='',$datasend=null){

        $temp_message=[];

        /* get data from db setting check data akun pcare for bridging*/
        $result=DB::table('pcaresettings')->select('username_pcare','password_pcare','consumen_pcare','secretkey_pcare','aplicationcode_pcare')->where('status',1)->first();
        /*setting data for each variable*/
        $consumenID=$result->consumen_pcare;
        $secretKey=$result->secretkey_pcare;
        $pcareUname=$result->username_pcare;
        $pcarePWD=$result->password_pcare;
        $kdAplikasi=$result->aplicationcode_pcare;



        date_default_timezone_set('UTC');
        $generate_timestamp = strval(time()-strtotime('1970-01-01 00:00:00'));

        $datacustID 		    = $consumenID.'&'.$generate_timestamp;
        $generate_signature     = hash_hmac('sha256', $datacustID, $secretKey, true);
        $signature              = base64_encode($generate_signature);
        $encodedAuthorization   = base64_encode($pcareUname.':'.$pcarePWD.':'.$kdAplikasi);



        if($url==''){
            $temp_message[]=array('message'=>'URL/End point kosong, silahkan diisi terlebih dahulu');
        }

        $url_pcare=$url;

        $dataHEADER=array(
            'X-cons-id: 3909',
            'X-Timestamp: '.$generate_timestamp,
            'X-Signature: '.$signature,
            'X-Authorization: Basic '.$encodedAuthorization,
            'Content-Type: application/json'
        );


        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url_pcare);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_ENCODING,'');
        curl_setopt($ch,CURLOPT_MAXREDIRS,10);
        curl_setopt($ch,CURLOPT_TIMEOUT,0);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($ch,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);

        $tempdata=json_encode($datasend);

        if($method==''){
            $temp_message[]=array('message'=>'Method belum ditentukan silahkan tentukan method [GET,POST,PUT,DELETE]');
        }


        $method_pcare=$method;

        if($method_pcare=='GET'){
            curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'GET');

        }

        if($method_pcare=='POST'){
            curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'POST');
            curl_setopt($ch,CURLOPT_POSTFIELDS,$tempdata);
        }

        if($method_pcare=='DELETE'){
            curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'DELETE');
        }

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$dataHEADER);
        $response = curl_exec($ch);
        $data=json_decode($response,true);
        // $data=json_encode($dataHEADER);
        curl_close($ch);
        return ($data);


    }

    public static function callAPI2($url='',$datasend)
    {
        $temp_message=[];

        /* get data from db setting check data akun pcare for bridging*/
        $result=DB::table('pcaresettings')->select('username_pcare','password_pcare','consumen_pcare','secretkey_pcare','aplicationcode_pcare')->where('status',1)->first();
        /*setting data for each variable*/
        $consumenID=$result->consumen_pcare;
        $secretKey=$result->secretkey_pcare;
        $pcareUname=$result->username_pcare;
        $pcarePWD=$result->password_pcare;
        $kdAplikasi=$result->aplicationcode_pcare;

        date_default_timezone_set('UTC');
        $generate_timestamp = strval(time()-strtotime('1970-01-01 00:00:00'));

        $datacustID 		    = $consumenID.'&'.$generate_timestamp;
        $generate_signature     = hash_hmac('sha256', $datacustID, $secretKey, true);
        $signature              = base64_encode($generate_signature);
        $encodedAuthorization   = base64_encode($pcareUname.':'.$pcarePWD.':'.$kdAplikasi);



        if($url==''){
            $temp_message[]=array('message'=>'URL/End point kosong, silahkan diisi terlebih dahulu');
        }

        $url_pcare=$url;

        $dataHEADER=array(
            'X-cons-id: 3909',
            'X-Timestamp: '.$generate_timestamp,
            'X-Signature: '.$signature,
            'X-Authorization: Basic '.$encodedAuthorization,
            'Content-Type: application/json'
        );

        $tempdata=json_encode($datasend);

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url_pcare);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_ENCODING,'');
        curl_setopt($ch,CURLOPT_MAXREDIRS,10);
        curl_setopt($ch,CURLOPT_TIMEOUT,0);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($ch,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$tempdata);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$dataHEADER);
        $response = curl_exec($ch);
        $data=json_decode($response,true);
        curl_close($ch);
        return ($data);
    }

    public static function domainAPI()
    {
        $domain=DB::table('msdomainname')->select('domainapi')->where('status','=','1')->first();
        if($domain){
            return $domain->domainapi;
        }else{
            return null;
        }
    }

}
?>
