<?php
	require 'config.php';
	header("Content-Type: application/json"); # important because we shall not be using postman to generate requests
	$response = '{
		"ResultCode":0,
		"ResultDescription": "Confirmation Received Successfully."
	}';
	# Data
	$mpesaResponse = file_get_contents('php://input'); # use file_get_contents() because the data comes in as a stream

	# Log the data
	$logFile = "M_PesaConfirmationResponse.txt";
	$jsonMpesaResponse = json_decode($mpesaResponse,true); # convert the mpesaResponse stream to json

	$transaction = array(
            ':TransactionType'      => $jsonMpesaResponse['TransactionType'],
            ':TransID'              => $jsonMpesaResponse['TransID'],
            ':TransTime'            => $jsonMpesaResponse['TransTime'],
            ':TransAmount'          => $jsonMpesaResponse['TransAmount'],
            ':BusinessShortCode'    => $jsonMpesaResponse['BusinessShortCode'],
            ':BillRefNumber'        => $jsonMpesaResponse['BillRefNumber'],
            ':InvoiceNumber'        => $jsonMpesaResponse['InvoiceNumber'],
            ':OrgAccountBalance'    => $jsonMpesaResponse['OrgAccountBalance'],
            ':ThirdPartyTransID'    => $jsonMpesaResponse['ThirdPartyTransID'],
            ':MSISDN'               => $jsonMpesaResponse['MSISDN'],
            ':FirstName'            => $jsonMpesaResponse['FirstName'],
            ':MiddleName'           => $jsonMpesaResponse['MiddleName'],
            ':LastName'             => $jsonMpesaResponse['LastName']
    );

	# Write to file
	$log = fopen($logFile, "a"); # open logFile in append mode

	fwrite($log, $mpesaResponse); # write the stream to file
	fclose($log);

	echo $response;

	insert_response($transaction);
?>