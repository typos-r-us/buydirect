<?php
	# Data
	$logFile = "M_PesaCallBackResponse.txt";
	$callBackResponse = file_get_contents('php://input'); # use file_get_contents() because the data comes in as a stream

	
	# Write to file
	$log = fopen($logFile, "a"); # open logFile in append mode

	fwrite($log, $callBackResponse); # write the stream to file
	fclose($log);

?>