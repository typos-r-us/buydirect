<?php
     require_once('../src/TransactionCallbacks.php');
    $callback =  new TransactionCallbacks();

     //Set the response content type to application/json
      header("Content-Type:application/json");
       
     //read incoming request
     //$callbackJSONData=file_get_contents('php://input');
     $result = json_decode($callback->processSTKPushRequestCallback());
     //$result =['post'=> $callbackJSONData,'type'=> 'post'];
     
    if($result)){
        $resp = '{"ResultCode":0,"ResultDesc":"Confirmation recieved successfully"}';
    }else{
        $resp = '{"ResultCode":1, "ResultDesc":"Confirmation failure due to internal service error"}';

    }
    
   echo $resp;
 

?>
