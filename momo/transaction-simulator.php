<?php
    include './access-token.php';
    $url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';
   
    $shortCode1  = '603021'; # Shortcode. Same as the one on register_url.php
    $amount     = '50'; # amount the client/we are paying to the paybill
    $msisdn     = '254708374149'; # phone number paying 
    $billRef    = 'testInv00002'; # This is anything that helps identify the specific transaction. Can be a clients ID, Account Number, Invoice amount, cart no.. etc
  
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$accessToken)); #setting custom header
  
  
    $curl_post_data = array(
            # Fill in the request parameters with valid values
           'ShortCode' => $shortCode1,
           'CommandID' => 'CustomerPayBillOnline',
           'Amount' => $amount,
           'Msisdn' => $msisdn,
           'BillRefNumber' => $billRef
    );
  
    $data_string = json_encode($curl_post_data);
  
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
  
    $curl_response = curl_exec($curl);
    print_r($curl_response);
  
    echo $curl_response;
  ?>
  