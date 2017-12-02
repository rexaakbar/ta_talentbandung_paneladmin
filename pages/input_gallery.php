<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tambah Gallery</title>
    <link rel="icon" href="images/icon.png">
    <?php 
      include "content/menu.php";
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
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Input Gallery</h2>
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
                      <form action="process/p_input_gallery.php" class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST" data-parsley-validate> 
                        <div class="form-group control-group">
                          <label class="control-label col-md-3" for="pilih-tempat-wisata">Pilih Tempat Wisata <span class="required">*</span> : 
                          </label>
                          <div class="col-md-6">
                            <select name="pilihTempatWisata" class="form-control" id="pilihTempatWisata">
                              <option value="">Pilih Tempat Wisata..</option>
                              <?php foreach($data->data_pilih_tempat_wisata() as $dataTempatWisata){ ?>
                                <option value="<?php echo $dataTempatWisata->id; ?>"><?php echo $dataTempatWisata->nama_wisata; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group control-group after-add-more">
                          <label class="control-label col-md-3" for="isi-gallery">Isi Gallery <span class="required">*</span> : 
                          </label>
                          <div class="col-md-7">
                            <div class="col-md-8">
                              <input name="isiGalleryWisata[]" type="file" id="isi-gallery" required="required" class="form-control">
                            </div>
                            <div class="input-group-btn col-md-4">
                              <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
                            </div>
                          </div>
                        </div>

                        <hr>
                        
                        <div class="form-group">
                          <div class="col-lg-3 col-lg-offset-9">
                            <input name="submit" type="submit" class="btn btn-info" value="Tambahkan">
                          </div>
                        </div>
                      </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="copy hide">
          <div class="form-group control-group">
            <label class="control-label col-md-3" for="isi-gallery"></label>
            <div class="col-md-7">
              <div class="col-md-8">
                <input name="isiGalleryWisata[]" type="file" id="isi-gallery" required="required" class="form-control">
              </div>
              <div class="input-group-btn col-md-4">
                <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Hapus</button>
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

    <?php echo $content->js(); ?>
    <script type="text/javascript">
      $(document).ready(function(){
          $(".add-more").click(function(){
              var html = $('.copy').html();
              $(".after-add-more").after(html);
          });
          $("body").on("click" , ".remove" , function(){
              $(this).parents(".control-group").remove();
          });
      });
    </script>

    <script type="text/javascript">
        function notifyResult(message = "" , judul = "asd"){
          if (message == "pilihTempatWisata"){
            new PNotify({
              title : 'Input Gagal',
              text  : 'Tolong pilih tempat wisata yang benar.',
              styling : 'bootstrap3',
              type : 'error',
              hide : true,
              
            });
          }else if (message == "formatGambarSalah"){
            new PNotify({
              title : 'Input Gagal',
              text  : 'Format gambar yang anda masukan salah , silakan di cek kembali. ',
              styling : 'bootstrap3',
              type : 'error',
              hide : true,
              
            });
          }else if(message == "success"){
            new PNotify({
              title : 'Berhasil',
              text  : 'Gallery untuk ' + judul + ' berhasil di tambahkan. ',
              styling : 'bootstrap3',
              type : 'success',
              hide : true
            });
          }else{

          }
        }
    </script>

    <?php echo $_SESSION['notif_input_gallery']; $_SESSION['notif_input_gallery'] = ""; ?>

  </body>
</html>
