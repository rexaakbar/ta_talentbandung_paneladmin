<?php 
	session_start();
	$con = new mysqli('localhost','root','',$_SESSION['db-name']);
	$articleId = $_GET['articleId'];
	$query_1 = $con->query("SELECT * FROM article WHERE id = '$articleId' ");
	while ($row_1 = $query_1->fetch_assoc()) {
	    $namaWisata = $row_1['nama_wisata'];
	}
	$query_2 = $con->query("DELETE FROM article WHERE id = '$articleId'");

	$_SESSION['notif_list_article'] = $_SESSION['notif_list_article'] . '<script type="text/javascript">
												      $(document).ready(function(e){
												        notifyResult("success","' . $namaWisata . '");
												      });
												    </script>';
	header('Location:../list_article');
 ?>