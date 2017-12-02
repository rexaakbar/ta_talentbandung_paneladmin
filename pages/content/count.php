<?php 

	$con = new mysqli('localhost','root','',$_SESSION['db-name']);

	// $query = $con->query("SELECT * FROM markers");

	// while($row = $query->fetch_assoc()){
	// 	$result[] = $row;
	// }

	// $aa = json_encode($result , JSON_PRETTY_PRINT);

	// $query1 = $con->query("INSERT INTO test(nama_file) VALUES ('$aa') ");

	// $query = $con->query("SELECT * FROM test");

	// while($row = $query->fetch_assoc() ){
	// 	echo $row['nama_file'];
	// }

	// echo $aa;

	// $bb = json_decode($aa);

	// foreach ($bb as $cc) {
	// 	echo $cc->id;
	// }
	
	class counting{

		function counting_row($name_table = ""){
			global $con;
			if($query = $con->query("SELECT COUNT(*) FROM ".$name_table." ")){
				$query = $con->query("SELECT COUNT(*) FROM ".$name_table." ");
				$row = $query->fetch_row();
				$result = $row[0];
			}else{
				$result = "Anda Salah Memasukan Nama Table";
			}
			return $result;
		}

	}

	$counting = new counting();
?>