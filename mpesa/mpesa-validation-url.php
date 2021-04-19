<?php
	header("Content-Type: application/json"); # important because we shall not be using postman to generate requests
	$response = '{
		"ResultCode":0,
		"ResultDescription": "Confirmation Received Successfully."
	}';
	# Data
	$mpesaResponse = file_get_contents('php://input'); # use file_get_contents() because the data comes in as a stream

	# Log the data
	$logFile = "M_PesaResponse.txt";
	$jsonMpesaResponse = json_decode($mpesaResponse,true); # convert the mpesaResponse stream to json

	# Write to file
	$log = fopen($logFile, "a"); # open logFile in append mode

	fwrite($log, $mpesaResponse); # write the stream to file
	fclose($log);

	echo $response;
?>