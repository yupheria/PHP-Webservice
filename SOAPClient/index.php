<?php
	require_once('nusoap/lib/nusoap.php');
	$client = new nusoap_client('http://localhost/soap/SOAPServer/index.php?wsdl',true);
	echo "<form method='post' action='index.php'>";
	echo "Currency Code:<input type='text' name='myCurry'/> <br />";
	echo "<input type='Submit'/>";
	echo "</form>";
	$cary = null;
	if(isset($_POST['myCurry'])) {
		$cary = $_POST['myCurry'];
	} else {
		$cary = 'USD';
	}
	echo $result = $client->call('getRate',array($cary))."<br />";
?>