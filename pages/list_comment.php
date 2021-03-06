<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>List Komentar</title>
    <link rel="icon" href="images/icon.png">
    <?php 
      include "content/menu.php";
      include "content/count.php";
      include "content/data.php";
      include "content/checksession.php";
    ?>

    <?php echo $content->css(); ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <?php echo $content->panel_admin(); ?>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <?php echo $content->menuProfile(); ?>
            <!-- /menu profile quick info -->

            <br />

            <?php echo $content->menu(); ?>

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <?php echo $content->menuProfileDropDown(); ?>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lihat List Komentar</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row col-lg-12">
                        <table id="datatable-view" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Username</th>
                              <th>Isi Komentar</th>
                              <th>Tanggal Komentar</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $i = 1; foreach($data->data_comment() as $dataComment){ ?>
                              <tr>
                                <td><?php echo $i;$i = $i + 1;              ?></td>
                                <td><?php echo $dataComment->username;   ?></td>
                                <td><?php echo $dataComment->isi_komentar; ?></td>
                                <td><?php echo $dataComment->created;    ?></td>
                                <td><a href="#" class="lihatComment" id="<?php echo $dataComment->id;  ?>"  ><div class="btn btn-info btn-sm"><i class="fa fa-eye fa-fw"></i></div></a>
                                  <a href="#" onclick="confirmDeleteComment('process/delete_data_comment.php?&commentId=<?php echo $dataComment->id; ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash-o fa-fw"></i></a></td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php echo $content->footer(); ?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- Modal Popup untuk delete--> 
    <div class="modal fade" id="modalDelete">
      <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" style="text-align:center;">Apakah anda yakin ingin menghapus data ini ?</h4>
          </div>
                    
          <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
            <a href="#" class="btn btn-danger" id="deleteLink">Hapus</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Popup untuk Lihat--> 
    <div id="modalLihatComment" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    </div>

     <?php echo $content->js(); ?>
     <script type="text/javascript">
       $(document).ready(function(){
          $("#datatable-view").DataTable({
            responsive : true
          });
       });
     </script>
     <script type="text/javascript">
        function confirmDeleteComment(delete_url)
        {
          $('#modalDelete').modal('show', {backdrop: 'static'});
          document.getElementById('deleteLink').setAttribute('href' , delete_url);
        }
        function notifyResult(message = "",judul = "")
        {
          if (message == "success") 
          {
            new PNotify({
              title : 'Berhasil',
              text  : 'Komentar dari username ' + judul +' berhasil di hapus. ',
              styling : 'bootstrap3',
              type : 'success',
              hide : true,
            });
          }
        }
     </script>
     <script type="text/javascript">
      $(document).ready(function () {
      $(".lihatComment").click(function(e) {
        var l = $(this).attr("id");
             $.ajax({
                     url: "modal/modal_lihat_comment.php",
                     type: "GET",
                     data : {modal_id: l,},
                     success: function (ajaxData){
                       $("#modalLihatComment").html(ajaxData);
                       $("#modalLihatComment").modal('show',{backdrop: 'true'});
                     }
                 });
          });
        });
      </script>
     <?php echo $_SESSION['notif_list_comment']; $_SESSION['notif_list_comment'] = ""; ?>
  </body>
</html>
