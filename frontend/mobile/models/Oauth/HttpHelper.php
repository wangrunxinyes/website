<?php
error_reporting(E_ALL);

class HttpHelper{

public function postDataToURL($post_data,$header,$url){
	$o="";  
        foreach ($post_data as $k=>$v)  
        {  
            $o.= $k."=".urlencode($v)."&";  
        }

       $post_data=substr($o,0,-1);
$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
$result = curl_exec($ch);
$result=substr($result,0,-1);
return $result;
}






public function getToURL($post_data, $url){
$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_URL,$url);
//为了支持cookie
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
$result = curl_exec($ch);
$result=substr($result,0,-1);
return $result;
}

}
?>