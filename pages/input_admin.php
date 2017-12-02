<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tambah Admin</title>
    <link rel="icon" href="images/icon.png">
    <?php 
      include "content/menu.php";
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
                    <h2>Input Admin Baru</h2>
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
                      <form action="process/p_input_admin.php" class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST" data-parsley-validate>
                        <div class="form-group">
                          <label class="control-label col-md-3" for="nama-lengkap">Nama Lengkap <span class="required">*</span> : 
                          </label>
                          <div class="col-md-6">
                            <input name="namaLengkap" type="text" id="nama-lengkap" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nama Lengkap">
                          </div>
                        </div> 

                        <div class="form-group">
                          <label class="control-label col-md-3" for="username">Username <span class="required">*</span> : 
                          </label>
                          <div class="col-md-6">
                            <input name="username" type="text" id="username" required="required" class="form-control col-md-7 col-xs-12" placeholder="Username Admin">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3" for="password">Password <span class="required">*</span> : 
                          </label>
                          <div class="col-md-6">
                            <input name="password" type="password" id="password" required="required" class="form-control col-md-7 col-xs-12" placeholder="8 - 16 Karakter">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label col-md-3" for="email">Email <span class="required">*</span> : 
                          </label>
                          <div class="col-md-6">
                            <input name="email" type="email" id="email" required="required" class="form-control col-md-7 col-xs-12" placeholder="example@example.com">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3" for="no-hp">No. Handphone <span class="required">*</span> : 
                          </label>
                          <div class="col-md-6">
                            <input name="noHp" type="text" id="no-hp" required="required" class="form-control col-md-7 col-xs-12" placeholder="08XXXXXXXXXX">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3" for="photo">Photo Profile <span class="required">*</span> : 
                          </label>
                          <div class="col-md-6">
                            <input name="photo" type="file" id="photo" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <hr>
                        
                        <div class="form-group">
                          <div class="col-lg-3 col-lg-offset-9">
                            <input name="submit" type="submit" class="btn btn-info" value="Tambahkan Admin">
                          </div>
                        </div>
                      </form>
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

    <?php echo $content->js(); ?>

    <script type="text/javascript">
        function notifyResult(message = "" , judul = "asd"){
          if (message == "usernameSudahAda"){
            new PNotify({
              title : 'Input Gagal',
              text  : 'Username ' + judul +' sudah ada , tolong berikan username yang lain. ',
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
              text  : 'Username ' + judul + ' berhasil di masukan ke database ',
              styling : 'bootstrap3',
              type : 'success',
              hide : true
            });
          }else{

          }
        }
    </script>

    <?php echo $_SESSION['notif_input_admin']; $_SESSION['notif_input_admin'] = ""; ?>

  </body>
</html>
