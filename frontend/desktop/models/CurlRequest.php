<?php
class CurlRequest

{
    public function postDataToURL($post_data, $url){
       $headers = array( 'Accept: application/json',); 
      $url = "http://".Yii::app()->request->getServerName()
       .Yii::app()->baseURL
       ."/index.php/interface/".$url;
        // $url = "http://www.tongchengchina.com/index.php/interface/".$url;
       //curl_setopt($handler, CURLOPT_HTTPHEADER, $headers);
       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       // post数据
       curl_setopt($ch, CURLOPT_POST, 1);
       // post的变量
       curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
       $response = curl_exec($ch);
       curl_close($ch);
       return $response;
    }
}

?>
