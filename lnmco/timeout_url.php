<?php
    require_once('../src/TransactionCallbacks.php');
    $callback =  new TransactionCallbacks();

    header("Content-Type:application/json");
     //read incoming request
    $postData = file_get_contents('php://input');
    
    if($postData){
        $resp = '{"ResultCode":00000000,"ResultDesc":"Success"}';
  
    }else{
        $resp = '{"ResultCode":1,"ResultDesc":" internal service error"}';
  
    }
    
    echo $resp;

