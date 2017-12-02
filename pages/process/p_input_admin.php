<?php 
	session_start();
	$con = new mysqli('localhost','root','',$_SESSION['db-name']);

	if($_POST && isset($_SESSION['admin'])){
		$namaLengkap = $_POST['namaLengkap'];
		$username = $_POST['username'];
		$lowerUsername = strtolower($username);
		$password = md5($_POST['password']);
		$email = $_POST['email'];
		$noHp = $_POST['noHp'];
		$query_1 = $con->query("SELECT * FROM user_login");
		while ($row_1 = $query_1->fetch_assoc()) {
		    if (strtolower($row_1['username']) == $lowerUsername) {
		    	$_SESSION['notif_input_admin'] = $_SESSION['notif_input_admin'] . '<script type="text/javascript">
												      $(document).ready(function(e){
												        notifyResult("usernameSudahAda","' . $username .'");
												      });
												    </script>';
		    }
		}

		$photo = $_FILES['photo']['name'];
		$checkFormatPic = explode("." , $photo);
		if (end($checkFormatPic) == "jpg" || end($checkFormatPic) == "png") {
			$tmpFilePath = $_FILES['photo']['tmp_name'];
			$nameFilePath = $username . end($checkFormatPic);
			$filePath = '../images/admin-photo/' . $nameFilePath;
		}else{
			$_SESSION['notif_input_admin'] = $_SESSION['notif_input_admin'] . '<script type="text/javascript">
												      $(document).ready(function(e){
												        notifyResult("formatGambarSalah");
												      });
												    </script>';
			header('Location:../input_admin');
		}

		if($_SESSION['notif_input_admin'] == ""){
			$query_2 = $con->query("INSERT INTO user_login(username,password,role) VALUES('$username' , '$password' , 'Admin') ");
			$query_3 = $con->query("INSERT INTO admin_account(nama_lengkap , username , photo , email , no_hp) VALUES('$namaLengkap' , '$username' , '$nameFilePath' , '$email' , '$noHp') ");
			move_uploaded_file($tmpFilePath , $filePath);
			$_SESSION['notif_input_admin'] = $_SESSION['notif_input_admin'] . '<script type="text/javascript">
													      $(document).ready(function(e){
													        notifyResult("success" , "' . $username . '");
													      });
													    </script>';
		}

		
		header('Location:../input_admin');
	}else{
		header('Location:../login');
	}
	
?>