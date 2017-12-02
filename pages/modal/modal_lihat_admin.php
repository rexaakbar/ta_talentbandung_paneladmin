<?php 
    session_start();
    $con = new mysqli('localhost','root','',$_SESSION['db-name']);
    $id = $_GET['modal_id'];
    $query_1 = $con->query("SELECT * FROM admin_account WHERE id = '$id' ");
    while ($row_1 = $query_1->fetch_assoc()) {
        $namaLengkap = $row_1['nama_lengkap'];
        $username = $row_1['username'];
        $photo = $row_1['photo'];
        $email = $row_1['email'];
        $noHp = $row_1['no_hp'];
    }

 ?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Lihat Data Admin</h4>
        </div>

        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <img src='images/admin-photo/<?php echo $photo; ?>' class="img-circle profile_img">
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <p class="form-control-static"><b>Nama Lengkap </b> : <?php echo $namaLengkap; ?>
                        </p>
                        <p class="form-control-static"><b>Username </b> : <?php echo $username; ?>
                        </p>
                        <p class="form-control-static"><b>Email </b> : <?php echo $email; ?>
                        </p>
                        <p class="form-control-static"><b>No Handhpone </b> : <?php echo $noHp; ?>
                        </p>
                    </div>
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