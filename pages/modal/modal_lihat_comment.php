<?php 
    session_start();
    $con = new mysqli('localhost','root','',$_SESSION['db-name']);
    $id = $_GET['modal_id'];
    $query_1 = $con->query("SELECT * FROM comment WHERE id = '$id' ");
    while ($row_1 = $query_1->fetch_assoc()) {
        $idArticle = $row_1['id_article'];
        $username = $row_1['username'];
        $isiKomentar = $row_1['isi_komentar'];
        $rate = $row_1['rate'];
        $created = $row_1['created_at'];
    }
    $query_2 = $con->query("SELECT * FROM article WHERE id = '$idArticle' ");
    while ($row_2 = $query_2->fetch_assoc()) {
            $namaWisata = $row_2['nama_wisata'];
        }

 ?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Lihat Komentar</h4>
        </div>

        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <p class="form-static-control"><h3><?php echo $namaWisata; ?></h3></p>
                </div>
                <div class="col-md-12">
                    <p class="form-static-control">Oleh : <?php echo $username . " , " . $created; ?></p>
                </div>
                <div class="col-md-12">
                    <p class="form-static-control">
                        <?php 
                            for ($i = 0; $i < $rate ; $i++) {
                                echo '<i class="fa fa-star fa-fw"></i>';
                            }
                        ?>
                    </p>
                </div>
                <div class="col-md-12">
                    <p class="form-static-control"><h2><?php echo $isiKomentar; ?></h2></p>
                </div>
            </div>
        </div>
        <div class="modal-footer">
                    <button type="reset" class="btn btn-default"  data-dismiss="modal" aria-hidden="true">
                        Kembali
                    </button>
                </div>
    </div>
</div>