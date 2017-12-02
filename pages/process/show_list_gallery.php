<?php 
  session_start();
  $idWisata = $_POST['tempatWisata'];
  $con = new mysqli('localhost','root','',$_SESSION['db-name']);

  if ($idWisata == "") {
    $query_1 = $con->query("SELECT * FROM gallery");
    $i = 0;
    while ($row_1 = $query_1->fetch_assoc()) {
        $resultData[$i]['lokasi_gallery'] = $row_1['lokasi_gallery'];
        $i = $i + 1;
    }
  }else{
    $query_2 = $con->query("SELECT * FROM gallery WHERE id_artikel = '$idWisata' ");
    $i = 0;
    while ($row_2 = $query_2->fetch_assoc()) {
        $resultData[$i]['lokasi_gallery'] = $row_2['lokasi_gallery'];
        $i = $i + 1;
    }
  }
  $resultEncoded = json_encode($resultData);
  $resultDecoded = json_decode($resultEncoded);
  $query_3 = $con->query("SELECT nama_wisata FROM article WHERE id = '$idWisata' ");
  $row_3 = $query_3->fetch_row();
  $namaTempatWisata = strtolower($row_3[0]);
  $namaFolder = str_replace(" " , "-" , $namaTempatWisata);

  foreach ($resultDecoded as $showPhoto) {
    $urlResult = 'images/img-gallery/' . $namaFolder . '/' . $showPhoto->lokasi_gallery;
    ?>
  <div class="col-md-55">
    <div class="thumbnail">
      <div class="image view view-first">
        <img style="width: 100%; display: block;" src="<?php echo $urlResult; ?>" alt="image" />
        <div class="mask">
        </div>
      </div>
    </div>
  </div>
<?php
  }
?>