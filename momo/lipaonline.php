<?php
  #include './access-token.php'; #test if this works
  #=================================================
  $consumerKey = 'PW3vWUP4Yr5nfLDGDii4laZGTEnKax3p';
  $consumerSecret = 'yMTKele5MHIRnMhZ';

  $headers = ['Contemt-Type:application/json; charset=utf8'];

  $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

  $curl = curl_init($access_token_url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($curl, CURLOPT_HEADER, FALSE);
  curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);

  $result = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  $result = json_decode($result);

  $accessToken = $result->access_token;

  # echo $accessToken; # for debug purposes

  curl_close($curl);
  $stkHeader = array('Content-Type:application/json','Authorization:Bearer '.$accessToken);
  #=================================================
  # Initiating the transaction
  $BusinessShortCode='174379';
  $Timestamp=date('YmdHis'); #20210513002240
  $Amount = '1'; # because... brokeness
  $PartyA = '254720376759'; #254700000000
  $CallBackURL = 'https://buydirect.palacina.com/momo/callback_url.php'; # check how to adapt this
  $AccountReference = 'Cart ID: 14'; #Get from checkout cart ID, etc
  $TransactionDesc = uniqid('MPSL_');
  $Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
  $Password = base64_encode($BusinessShortcode.$Passkey.$Timestamp); #BusinessShortcode, Passkey, Timestamp


  $initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
  
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $initiate_url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $stkHeader); //setting custom header
  
  
  $curl_post_data = array(
    //Fill in the request parameters with valid values
    'BusinessShortCode' => $BusinessShortCode,
    'Password' => $Password,
    'Timestamp' => $Timestamp,
    'TransactionType' => 'CustomerPayBillOnline',
    'Amount' =>  $Amount, # Safaricom docs have an error...'Amount"' 
    'PartyA' => $PartyA,
    'PartyB' => $BusinessShortCode,
    'PhoneNumber' => $PartyA,
    'CallBackURL' => $CallBackURL,
    'AccountReference' => $AccountReference,
    'TransactionDesc' => $TransactionDesc
  );
  
  $data_string = json_encode($curl_post_data);
  
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
  
  $curl_response = curl_exec($curl);
  print_r($curl_response);
  
  echo $curl_response;
  ?>
  