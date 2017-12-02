<?php 
	$con = new mysqli('localhost','root','','jarambah');
	
	$query = $con->query("SELECT * FROM gallery");

	while( $row = $query->fetch_assoc() ){
		$resultData[] = $row;
	}

	$dataJson = json_encode($resultData , JSON_PRETTY_PRINT);

	$result = json_decode($dataJson);

	foreach ($result as $key ) {
		echo $key->id;
	}

 ?>