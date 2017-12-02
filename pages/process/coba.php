<?php 

	// include "connection.php";
	// $name_art = "Huehuehue";
	// $loc_gallery = ['img/blabla.png' , 'img/blabla.jpg' , 'img/blabla.gif' , 'img/blabla.php' , 'img/blabla.ini' ];

	// $q = $con->query("SELECT COUNT(*) FROM article WHERE name_art = '$name_art' ");

	// $row = $q->fetch_row();

	// $val_check = $row[0];

	// if($val_check >= 1){
	// 	echo "Maaf tidak bisa memasukan artikel yang sama";
	// }else{
	// 	$q1 = $con->query("INSERT INTO article(name_art) VALUES ('$name_art') ");

	// 	$q2 = $con->query("SELECT id FROM article WHERE name_art = '$name_art' ");

	// 	while($row2 = $q2->fetch_assoc()){
	// 		$get_id = $row2['id'];
	// 	}

	// 	foreach($loc_gallery AS $loc){
	// 		$q3 = $con->query("INSERT INTO gallery(id_theme,loc_pic) VALUES ('$get_id','$loc') ");
	// 	}
	// }

	$data = "<marquee>asd</marquee>";


	echo htmlspecialchars($data);

	

?>