<?php
	require('nusoap/lib/nusoap.php');
	$server = new nusoap_server();
	$server->configureWSDL('demows','http://localhost/soap/SOAPserver/index.php');
	
	function getRate($curry) {
		$con = mysqli_connect("localhost","root","","ForeignExchange");
		$result = mysqli_query($con,"select * from rate where currency = '$curry'");
		$row_result = mysqli_fetch_array($result);
		return $row_result['rate'];
	}
	
	$server->register('getRate',array('curry'=>'xsd:string'),array('result'=>'xsd:decimal'),'http://localhost/soap/SOAPserver/index.php');
	
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA:'';
	
	$server->service($HTTP_RAW_POST_DATA);
?>