<?php 
	session_start();

	if(isset($_SESSION['admin'])){
		session_destroy();
		header('Location:../login');
	}else{
		header('Location:../login');
	}


 ?>