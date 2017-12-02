<?php 
	$con = new mysqli('localhost','root','',$_SESSION['db-name']);
	

	class data{
		function data_article(){
			global $con;
			$i = 0;
			$query_1 = $con->query("SELECT * FROM article");
			while ($row_1 = $query_1->fetch_assoc()) {
			    $resultData[$i]['id']            = $row_1['id'];
			    $resultData[$i]['nama_wisata']   = $row_1['nama_wisata'];
			    $resultData[$i]['alamat_wisata'] = $row_1['alamat_wisata'];
			    $resultData[$i]['lat']           = $row_1['lat'];
			    $resultData[$i]['lng']           = $row_1['lng'];
			    $resultData[$i]['isi_konten']    = $row_1['isi_konten'];
				$i = $i + 1;
			}
				$resultEncoded = json_encode($resultData);
				$resultDecoded = json_decode($resultEncoded);
			

			return $resultDecoded;

		}

		function data_comment(){
			global $con;
			$i = 0;
			$query_1 = $con->query("SELECT * FROM comment");
			while($row_1 = $query_1->fetch_assoc()){
				$resultData[$i]['id'] 			= $row_1['id'];
				$resultData[$i]['id_article'] 	= $row_1['id_article'];
				$resultData[$i]['username']	    = $row_1['username'];
				$resultData[$i]['isi_komentar'] = $row_1['isi_komentar'];
				$resultData[$i]['rate'] 		= $row_1['rate'];
				$resultData[$i]['created']	    = $row_1['created_at'];
				$i = $i + 1;
			}
			
			$resultEncoded = json_encode($resultData);
			$resultDecoded = json_decode($resultEncoded);

			return $resultDecoded;
		}

		function data_admin(){
			global $con;
			$i = 0;
			$query_1 = $con->query("SELECT * FROM admin_account");
			while($row_1 = $query_1->fetch_assoc()){
				$resultData[$i]['id'] 			= $row_1['id'];
				$resultData[$i]['nama_lengkap'] = $row_1['nama_lengkap'];
				$resultData[$i]['username']	    = $row_1['username'];
				$resultData[$i]['photo']	    = $row_1['photo'];
				$resultData[$i]['email'] 		= $row_1['email'];
				$resultData[$i]['no_hp']	    = $row_1['no_hp'];
				$i = $i + 1;
			}
			
			$resultEncoded = json_encode($resultData);
			$resultDecoded = json_decode($resultEncoded);

			return $resultDecoded;
		}

		function data_pilih_tempat_wisata(){
			global $con;
			$i = 0;
			$query_1 = $con->query("SELECT * FROM article");
			while ($row_1 = $query_1->fetch_assoc()) {
			    $resultData[$i]['id'] 			= $row_1['id'];
			    $resultData[$i]['nama_wisata'] 	= $row_1['nama_wisata'];
				$i = $i + 1;
			}

			$resultEncoded = json_encode($resultData);
			$resultDecoded = json_decode($resultEncoded);

			return $resultDecoded;
		}
	}

	$data = new data();

 ?>