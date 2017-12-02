<?php 
	session_start();
  $con = new mysqli('localhost','root','',$_SESSION['db-name']);

	class content{
    function panel_admin(){
      return '<a href="index" class="site_title"><i class="fa fa-users"></i> Panel Admin</span></a>' ;
    }
		function menu(){
			return '<!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-file-text-o"></i> Tempat Wisata <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="list_article">Lihat List Tempat Wisata</a></li>
                      <li><a href="input_article">Tambah Tempat Wisata</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-comments"></i> Komentar <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="list_comment">Lihat Kumpulan Komentar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Admin <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="list_admin">Lihat List Admin</a></li>
                      <li><a href="input_admin">Tambah Admin</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-image"></i> Gallery <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="list_gallery">Lihat List Gallery</a></li>
                      <li><a href="input_gallery">Tambah Gambar Gallery</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->';
		}

    function menuProfile(){
      global $con;
      $usernameAdmin = $_SESSION['admin'];
      $query_1 = $con->query("SELECT * FROM admin_account WHERE username = '$usernameAdmin'");
      while($row_1 = $query_1->fetch_assoc()){
        $gambarAdmin = $row_1['photo'];
        $namaAdmin = $row_1['nama_lengkap'];
      }

      return '<div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/admin-photo/' . $gambarAdmin . '" alt="..." class="img-circle profile_img user-profile">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2>' . $namaAdmin . '</h2>
              </div>
            </div>';
    }

    function menuProfileDropDown(){
      global $con;
      $usernameAdmin = $_SESSION['admin'];
      $query_1 = $con->query("SELECT * FROM admin_account WHERE username = '$usernameAdmin' ");
      while ($row_1 = $query_1->fetch_assoc()) {
          $gambarAdmin = $row_1['photo'];
          $namaAdmin = $row_1['nama_lengkap'];
      }

      return '<ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/admin-photo/' . $gambarAdmin . '" alt="">' . $namaAdmin . '
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="process/process_logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>';
    }

    function footer(){
      return '<footer>
          <div class="pull-right">
            Copyright © 2017 by Rexa Akbar Malik and Koeda Studio , template by Colorlib
          </div>
          <div class="clearfix"></div>
        </footer>';
    }

		function css(){
			return '<!-- Bootstrap -->
				    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
				    <!-- Font Awesome -->
				    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
				    <!-- NProgress -->
				    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
				    <!-- iCheck -->
				    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
				    <!-- bootstrap-wysiwyg -->
				    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
				    <!-- Select2 -->
				    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
				    <!-- Switchery -->
				    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
				    <!-- starrr -->
				    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
				    <!-- bootstrap-daterangepicker -->
				    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
				    <!-- Dropzone.js -->
    				<link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
				    <!-- Custom Theme Style -->
				    <link href="../build/css/custom.min.css" rel="stylesheet">
				    <!-- Datatables -->
				    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
				    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
				    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
				    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
				    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
            <!-- PNotify -->
            <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
            <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
            <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">' ;
		}

		function js(){
			return '<!-- jQuery -->
				    <script src="../vendors/jquery/dist/jquery.min.js"></script>
				    <!-- Bootstrap -->
				    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
				    <!-- FastClick -->
            <script src="../vendors/fastclick/lib/fastclick.js"></script>
            <!-- NProgress -->
            <script src="../vendors/nprogress/nprogress.js"></script>
            <!-- bootstrap-progressbar -->
            <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
            <!-- iCheck -->
            <script src="../vendors/iCheck/icheck.min.js"></script>
            <!-- bootstrap-daterangepicker -->
            <script src="../vendors/moment/min/moment.min.js"></script>
            <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
            <!-- bootstrap-wysiwyg -->
            <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
            <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
            <script src="../vendors/google-code-prettify/src/prettify.js"></script>
            <!-- jQuery Tags Input -->
            <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
            <!-- Switchery -->
            <script src="../vendors/switchery/dist/switchery.min.js"></script>
            <!-- Select2 -->
            <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
            <!-- Parsley -->
            <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
            <!-- Autosize -->
            <script src="../vendors/autosize/dist/autosize.min.js"></script>
            <!-- jQuery autocomplete -->
            <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
            <!-- starrr -->
            <script src="../vendors/starrr/dist/starrr.js"></script>
            <!-- Dropzone.js -->
            <script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>
            <!-- Custom Theme Scripts -->
            <script src="../build/js/custom.js"></script>
            <!-- Datatables -->
            <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
            <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
            <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
            <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
            <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
            <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
            <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
            <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
            <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
            <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
            <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
            <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
            <script src="../vendors/jszip/dist/jszip.min.js"></script>
            <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
            <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
            <!-- PNotify -->
            <script src="../vendors/pnotify/dist/pnotify.js"></script>
            <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
            <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>
            ' ;
		}

	}

	$content = new content();
?>