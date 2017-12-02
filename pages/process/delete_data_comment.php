<?php 
	session_start();
	$con = new mysqli('localhost','root','',$_SESSION['db-name']);
	$commentId = $_GET['commentId'];
	$query_1 = $con->query("SELECT * FROM comment WHERE id = '$commentId' ");
	while ($row_1 = $query_1->fetch_assoc()) {
	    $username = $row_1['username'];
	}
	$query_2 = $con->query("DELETE FROM comment WHERE id = '$commentId'");

	$_SESSION['notif_list_comment'] = $_SESSION['notif_list_comment'] . '<script type="text/javascript">
												      $(document).ready(function(e){
												        notifyResult("success","' . $username . '");
												      });
												    </script>';
	header('Location:../list_comment');
 ?>