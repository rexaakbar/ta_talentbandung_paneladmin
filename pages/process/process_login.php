<?php 
	session_start();
	$_SESSION['notif_input_article'] = null;
	$_SESSION['notif_view_article'] = null;
	$_SESSION['notif_input_admin'] = null;
	$_SESSION['admin'] = null;
	$_SESSION['db-name'] = "jarambah";
	$con = new mysqli('localhost','root','',$_SESSION['db-name']);
	if($_POST){
		
		$username = $_POST['username'];
		$password = MD5($_POST['password']);

		$query_1 = $con->query("SELECT * FROM user_login WHERE username = '$username' AND password = '$password'");

		$query_2 = $con->query("SELECT COUNT(*) FROM user_login WHERE username = '$username' AND password = '$password'");
		$row_2 = $query_2->fetch_row();
		if ($row_2[0] > 0) {
			while ($row_1 = $query_1->fetch_assoc()) {
				$_SESSION['admin'] = $_SESSION['admin'] . $row_1['username'] ;
			}
			header('Location:../index');
		}else{
			header('Location:../login');
		}	
	}
	else{
		header('Location:../login');
	}


?>