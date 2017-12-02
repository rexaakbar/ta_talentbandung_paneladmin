<?php 
	session_start();
	$con = new mysqli('localhost','root','',$_SESSION['db-name']);

	if($_POST && isset($_SESSION['admin'])){
		$namaTempatWisata = $_POST['namaTempatWisata'];
		$alamatTempatWisata = $_POST['alamatTempatWisata'];
		$latWisata = $_POST['latWisata'];
		$lngWisata = $_POST['lngWisata'];
		$isiKontenWisata = $_POST['isiKontenWisata'];	
		$lowerNamaTempatWisata = strtolower($namaTempatWisata);
		$query_1 = $con->query("SELECT nama_wisata FROM article ");
		while ($row_1 = $query_1->fetch_assoc()) {
		    if (strtolower($row_1['nama_wisata']) == $lowerNamaTempatWisata) {
		    	$_SESSION['notif_input_article'] = $_SESSION['notif_input_article'] . '<script type="text/javascript">
												      $(document).ready(function(e){
												        notifyResult("judulSudahAda","' . $namaTempatWisata .'");
												      });
												    </script>';
		    }
		}
		if($_SESSION['notif_input_article'] == ""){
        $fileNamaTempatWisata = str_replace(' ', '-', $lowerNamaTempatWisata);
        $forFilePathAdmin = '../images/img-gallery/'.$fileNamaTempatWisata;
        $forFilePathGuest = '../../../guest/images/img-gallery/'.$fileNamaTempatWisata;
        mkdir($forFilePathAdmin);
        mkdir($forFilePathGuest);
		if(count($_FILES['isiGalleryWisata']['name']) > 0){
			for ($i = 0; $i < count($_FILES['isiGalleryWisata']['name']) ; $i++) {
				$tmpFilePath = $_FILES['isiGalleryWisata']['tmp_name'][$i];
				if ($tmpFilePath != "") {
                	$shortName = $_FILES['isiGalleryWisata']['name'][$i];
                	$checkFormatPic = explode("." , $shortName);
                	if (end($checkFormatPic) == "jpg" || end($checkFormatPic) == "png") {
                	$fileNamaTempatWisata = str_replace(' ', '-', $lowerNamaTempatWisata);

                	$filepathAdmin = $forFilePathAdmin.'/'.$fileNamaTempatWisata;
                	$filepathGuest = $forFilePathGuest.'/'.$fileNamaTempatWisata;

                	$resultPath[$i]['tmpFilePath'] = $tmpFilePath; 
                	$resultPath[$i]['filePathAdmin'] = $filepathAdmin . "-" . ($i+1) . "." . end($checkFormatPic); 
                	$resultPath[$i]['filePathGuest'] = $filepathGuest . "-" . ($i+1) . "." . end($checkFormatPic); 
                	$resultPath[$i]['filePath'] = $fileNamaTempatWisata . "-" . ($i+1) . "." . end($checkFormatPic); 

                	}else{
                	$_SESSION['notif_input_article'] = $_SESSION['notif_input_article'] . '<script type="text/javascript">
												      $(document).ready(function(e){
												        notifyResult("formatGambarSalah");
												      });
												    </script>';
					header('Location:../input_article');
                	}
                	
				}
			}
		}

		$resultPathEncoded = json_encode($resultPath);
		$resultPathDecoded = json_decode($resultPathEncoded);

		$query_2 = $con->query("INSERT INTO article (nama_wisata , alamat_wisata , lat , lng , isi_konten ) VALUES ('$namaTempatWisata' , '$alamatTempatWisata' , '$latWisata' , '$lngWisata' , '$isiKontenWisata') ");

		$query_3 = $con->query("SELECT * FROM article WHERE nama_wisata = '$namaTempatWisata' ");

		while ($row_2 = $query_3->fetch_assoc()) {
		    $idArticle = $row_2['id'];
		}

		foreach ($resultPathDecoded as $value) {

			move_uploaded_file($value->tmpFilePath , $value->filePathAdmin);
			move_uploaded_file($value->tmpFilePath , $value->filePathGuest);
			$lokasiGallery = $value->filePath;
			$query_4 = $con->query("INSERT INTO gallery (id_artikel , lokasi_gallery) VALUES ('$idArticle' , '$lokasiGallery') ");
		}

		$_SESSION['notif_input_article'] = $_SESSION['notif_input_article'] . '<script type="text/javascript">
												      $(document).ready(function(e){
												        notifyResult("success" , "' . $namaTempatWisata . '");
												      });
												    </script>';
		}
		header('Location:../input_article');
		
	}else{
		header('Location:../login');
	}

?>