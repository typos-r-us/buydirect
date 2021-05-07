 <?php
  include './access-token.php'; #test if this works
  $url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';

  $shortCode1 = '603021';
  $confirmationURL = 'https://buydirect.palacina.com/momo/confirmation-url.php';
  $validationURL = 'https://buydirect.palacina.com/momo/validation-url.php';
  
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$accessToken)); #setting custom header
  
  
  $curl_post_data = array(
    #Fill in the request parameters with valid values
    'ShortCode' => $shortCode1,
    'ResponseType' => 'Confirmed',
    'ConfirmationURL' => $confirmationURL,
    'ValidationURL' => $validationURL
  );
  
  $data_string = json_encode($curl_post_data);
  
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
  
  $curl_response = curl_exec($curl);
  print_r($curl_response);
  
  echo $curl_response;
  ?>
  