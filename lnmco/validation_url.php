<?php
 
    require_once('../src/TransactionCallbacks.php');
    $callback =  new TransactionCallbacks();

    header("Content-Type:application/json");
     //read incoming request
    $postData = file_get_contents('php://input');
    
    $result = ['type'=>"result" ,'post'=>$postData ];
    
    if($result){
       $resp = '{"ResultCode":0,"ResultDesc":"Validation passed successfully"}';
   
    }else{
        $resp = '{"ResultCode": 1, "ResultDesc":"Validation failure due to internal service error"}';
  
    }

    echo $resp;
?>
