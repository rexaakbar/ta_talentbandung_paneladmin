<?php 
	session_start();
	$con = new mysqli('localhost','root','',$_SESSION['db-name']);
	if ($_POST['pilihTempatWisata'] == "") {
		$_SESSION['notif_input_gallery'] = $_SESSION['notif_input_gallery'] . '<script type="text/javascript">
											      $(document).ready(function(e){
											        notifyResult("pilihTempatWisata");
											      });
											    </script>';
		header('Location:../input_gallery');
	}else if($_POST && isset($_SESSION['admin'])){
		$idTempatWisata = $_POST['pilihTempatWisata'];

		

		$query_1 = $con->query("SELECT * FROM article WHERE id = '$idTempatWisata' ");
		while ($row_1 = $query_1->fetch_assoc()) {
		    $namaTempatWisata = $row_1['nama_wisata'];
		}

		$query_2 = $con->query("SELECT COUNT(*) FROM gallery WHERE id_artikel = '$idTempatWisata' ");
		$row_2 = $query_2->fetch_row();
		$jumlahGallery = $row_2[0];

		$lowerNamaTempatWisata = strtolower($namaTempatWisata);

		if(count($_FILES['isiGalleryWisata']['name']) > 0){
			for ($i = 0; $i < count($_FILES['isiGalleryWisata']['name']) ; $i++) {
				$tmpFilePath = $_FILES['isiGalleryWisata']['tmp_name'][$i];
				if ($tmpFilePath != "") {
                	$shortName = $_FILES['isiGalleryWisata']['name'][$i];
                	$checkFormatPic = explode("." , $shortName);
                	if (end($checkFormatPic) == "jpg" || end($checkFormatPic) == "png") {
                	$fileNamaTempatWisata = str_replace(' ', '-', $lowerNamaTempatWisata);
                	// mkdir("../images/".$fileNamaTempatWisata);

                	$filepath = '../images/img-gallery/' . $fileNamaTempatWisata .'/'.$fileNamaTempatWisata;

                	$resultPath[$i]['tmpFilePath'] = $tmpFilePath; 
                	$resultPath[$i]['filePath'] = $filepath . "-" . ($i+1+$jumlahGallery) . "." . end($checkFormatPic); 
                	$resultPath[$i]['pictureName'] = $fileNamaTempatWisata . "-" . ($i+1+$jumlahGallery) . "." . end($checkFormatPic);

                	}else{
                	$_SESSION['notif_input_gallery'] = $_SESSION['notif_input_gallery'] . '<script type="text/javascript">
												      $(document).ready(function(e){
												        notifyResult("formatGambarSalah");
												      });
												    </script>';
					header('Location:../input_gallery');
                	}
                	
				}
			}
		}

		$resultPathEncoded = json_encode($resultPath);
		$resultPathDecoded = json_decode($resultPathEncoded);

		foreach ($resultPathDecoded as $value) {

			move_uploaded_file($value->tmpFilePath , $value->filePath);
			$lokasiGallery = $value->pictureName;
			$query_3 = $con->query("INSERT INTO gallery (id_artikel , lokasi_gallery) VALUES ('$idTempatWisata' , '$lokasiGallery') ");
		}


		$_SESSION['notif_input_gallery'] = $_SESSION['notif_input_gallery'] . '<script type="text/javascript">
												      $(document).ready(function(e){
												        notifyResult("success" , "' . $namaTempatWisata . '");
												      });
												    </script>';

		header('Location:../input_gallery');
		
	}else{
		header('Location:../login');
	}

?>