<?php
//Mulai Sesion
session_start();
if (isset($_SESSION["ses_username"]) == "") {
	header("location: login.php");
} else {
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_level = $_SESSION["ses_level"];
}

//KONEKSI DB
include "inc/koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>E-MODUL</title>
	<link rel="icon" href="dist/img/logo.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/select2.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
	<!-- Custom -->
	<!-- <link rel="stylesheet" href="dist/css/Customskin.css"> -->

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body class="hold-transition skin-green sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="index.php" class="logo">
				<span class="logo-lg">
					<img src="dist/img/computer2.png" width="37px">
					<b>E-Modul</b>
				</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
			</nav>
		</header>

		<!-- =============================================== -->

		<!-- Left side column. contains the sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				</<b>
				<div class="user-panel">
					<div class="pull-left image">
						<img src="dist/img/avatar.png" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p>
							<?= $data_nama; ?>
						</p>
						<span class="label label-warning">
							<?= $data_level; ?>
						</span>
					</div>
				</div>
				</br>
				<!-- /.search form -->
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu">
					<!-- Level  -->
					<?php
					switch ($data_level) {
						case "Administrator": 
						case "Guru":?>
						<!-- ADMIN PRIVILEGE -->
							<li class="header">ADMIN</li>
							<li class="treeview">
								<a href="?page=admin">
									<i class="fa fa-dashboard"></i>
									<span>Dashboard</span>
									<span class="pull-right-container">
									</span>
								</a>
							</li>
							<li class="treeview">
								<a href="?page=pengguna">
									<i class="fa fa-user"></i>
									<span>Pengguna</span>
									<span class="pull-right-container">
									</span>
								</a>
							</li>

							<li class="treeview">
								<a href="?page=siswa">
								<!-- <a href="?page=siswa"> -->
									<i class="fa fa-users"></i>
									<span>Siswa</span>
									<span class="pull-right-container">
									</span>
								</a>
							</li>

							<li class="treeview">
								<a href="?page=nilai">
									<i class="fa fa-bar-chart"></i>
									<span>Nilai</span>
									<span class="pull-right-container">
									</span>
								</a>
							</li>
							
							<?php
						case "Student": ?>
							<li class="header">MAIN NAVIGATION</li>
							<li class="treeview">
								<a href="#">
									<i class="fa fa-bookmark"></i>
									<span>Pendahuluan</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<li class="treeview">
										<a href="?page=cp">
											<i class="fa fa-flag"></i>
											<span>Capaian Pembelajaran</span>
										</a>
									</li>	
									<li class="treeview">
										<a href="?page=tp">
											<i class="fa fa-bullseye"></i>
											<span>Tujuan Pembelajaran</span>
										</a>
									</li>

									<li class="treeview">
										<a href="?page=langkahpbl">
											<i class="fa fa-road"></i>
											<!-- <i class="fa fa-shoe-prints"></i> -->
											<span>Langkah Langkah PBL</span>
										</a>
									</li>
									
								</ul>
							</li>

							<li class="treeview">
								<a href="?page=pretest">
									<i class="fa fa-pencil"></i>
									<span>Pretest</span>
									<span class="pull-right-container">
									</span>
								</a>
							</li>

							<li class="treeview">
								<a href="?page=materi">
									<i class="fa fa-laptop"></i>
									<span>Uraian Materi</span>
									<span class="pull-right-container">
									</span>
								</a>
							</li>
							<li class="treeview">
								<a href="?page=materi_pdf">
									<i class="fa fa-laptop"></i>
									<span>Uraian Materi PDF</span>
									<span class="pull-right-container">
									</span>
								</a>
							</li>
							<li class="treeview">
								<a href="?page=lkpd">
									<i class="fa fa-book"></i>
									<span>LKPD</span>
									<span class="pull-right-container">
									</span>
								</a>
							</li>

							<li class="treeview">
								<a href="?page=posttest">
									<i class="fa fa-pencil-square-o"></i>
									<span>Posttest</span>
									<span class="pull-right-container">
									</span>
								</a>
							</li>

							

							<li class="header">SETTINGS</li>
							<li class="treeview">
								<a href="#">
									<i class="fa fa-question"></i>
									<span>Bantuan</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<li>
										<a href="?page=MyApp/data_pengguna">
											<i class="fa fa-user"></i>
											<span>Pengguna Sistem</span>
										</a>	
									</li>
								</ul>	
							</li>
							<?php }?>
					<li>
						<a href="logout.php" onclick="return confirm('Anda yakin keluar dari aplikasi ?')">
							<i class="fa fa-sign-out"></i>
							<span>Logout</span>
							<span class="pull-right-container"></span>
						</a>
					</li>


			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- =============================================== -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<!-- Main content -->
			<section class="content">
				<?php 
				if (isset($_GET['page'])) {
					switch ($_GET['page']) {
						// ADMIN or GURU
						case 'admin':
							include "home/admin.php";
							break;
						case 'nilai':
							include "admin/nilai/nilai_view.php";
							break;
						case 'pengguna': // It refers to table nama on database
						case 'siswa':
							include "admin/users/users_view.php";
							break;

						// SISWA AND PENGGUNA
						case 'cp':
							include "admin/cptp/capaianpembelajaran.php";
							break;
						case 'tp':
							include "admin/cptp/tujuanpembelajaran.php";
							break;
						case 'langkahpbl':
							include "admin/langkahpbl/langkahpbl.php";
							break;

						case 'materi':
							include "admin/uraianmateri/uraianmateri.php";
							break;
						case 'materi_pdf':
							include "admin/uraianmateri/uraianmateri_pdf.php";
							break;
						case 'lkpd':
							include "admin/lkpd/lkpdtabel.php";
							// include "admin/lkpd/lkpdspek.php";
							break;

						case 'pretest': // It refers to table nama on database
						case 'posttest':
							include "admin/preposttest/preposttest.php";
							break;

						/*
							//Pengguna
						case 'MyApp/data_pengguna':
							include "admin/pengguna/data_pengguna.php";
							break;
						case 'MyApp/add_pengguna':
							include "admin/pengguna/add_pengguna.php";
							break;
						case 'MyApp/edit_pengguna':
							include "admin/pengguna/edit_pengguna.php";
							break;
						case 'MyApp/del_pengguna':
							include "admin/pengguna/del_pengguna.php";
							break;


							//agt
						case 'MyApp/data_agt':
							include "admin/agt/data_agt.php";
							break;
						case 'MyApp/add_agt':
							include "admin/agt/add_agt.php";
							break;
						case 'MyApp/edit_agt':
							include "admin/agt/edit_agt.php";
							break;
						case 'MyApp/del_agt':
							include "admin/agt/del_agt.php";
							break;
						case 'MyApp/print_agt':
							include "admin/agt/print_agt.php";
							break;
						case 'MyApp/print_allagt':
							include "admin/agt/print_allagt.php";
							break;


							//buku
						case 'MyApp/data_buku':
							include "admin/buku/data_buku.php";
							break;
						case 'MyApp/add_buku':
							include "admin/buku/add_buku.php";
							break;
						case 'MyApp/edit_buku':
							include "admin/buku/edit_buku.php";
							break;
						case 'MyApp/del_buku':
							include "admin/buku/del_buku.php";
							break;

							//sirkul
						case 'data_sirkul':
							include "admin/sirkul/data_sirkul.php";
							break;
						case 'add_sirkul':
							include "admin/sirkul/add_sirkul.php";
							break;
						case 'panjang':
							include "admin/sirkul/panjang.php";
							break;
						case 'kembali':
							include "admin/sirkul/kembali.php";
							break;

							//log
						case 'log_pinjam':
							include "admin/log/log_pinjam.php";
							break;
						case 'log_kembali':
							include "admin/log/log_kembali.php";
							break;

							//laporan
						case 'laporan_sirkulasi':
							include "admin/laporan/laporan_sirkulasi.php";
							break;
						case 'MyApp/print_laporan':
							include "admin/laporan/print_laporan.php";
							break;
						*/


							//default
						default:
							echo "<center><br><br><br><br><br><br><br><br><br>
				  <h1> Halaman tidak ditemukan !</h1></center>";
							break;
					}
				} else {
					// Auto Halaman Home Pengguna
					if ($data_level == "Administrator" || $data_level == "Guru") {
						include "home/admin.php";
					} elseif ($data_level == "Student") {
						include "admin/cptp/capaianpembelajaran.php";
					}
				} 
				?>



			</section>
			<!-- /.content -->
		</div>

		<!-- /.content-wrapper 

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
			</div>
			<strong>Copyright &copy;
				<a href="https://www.facebook.com/">Muhammad Ivan Setiawan</a>.</strong> All rights reserved.
		</footer>
		<div class="control-sidebar-bg"></div>
		-->

		<!-- ./wrapper -->

		<!-- jQuery 2.2.3 -->
		<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
			 
		<!--Bootstrap 3.3.6 -->
			
		<script src = "bootstrap/js/bootstrap.min.js"></script>
		

		<script src="plugins/select2/select2.full.min.js"></script>
		<!-- DataTables -->
		<script src="plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

		<!-- AdminLTE App -->
		<script src="dist/js/app.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="dist/js/demo.js"></script>
		<!-- page script -->


		<script>
			$(function() {
				$("#example1").DataTable({
					columnDefs: [{
						"defaultContent": "-",
						"targets": "_all"
					}]
				});
				$('#example2').DataTable({
					"paging": true,
					"lengthChange": false,
					"searching": false,
					"ordering": true,
					"info": true,
					"autoWidth": false
				});
			});
		</script>

		<script>
			$(function() {
				//Initialize Select2 Elements
				$(".select2").select2();
			});
		</script>
</body>

</html>
