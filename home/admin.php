<?php
	$sql = $koneksi->query("SELECT count(id_siswa) as agt from tb_siswa");
	while ($data= $sql->fetch_assoc()) {
	
		$agt=$data['agt'];
	}
?>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Dashboard  <?=ucfirst($_SESSION['ses_level'])?>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-blue">
				<div class="inner">
					<h4>
						<?= "1";?>
					</h4>

					<p>Jadwal Kelas</p>
				</div>
				<div class="icon">
					<i class="fa fa-calendar"></i>
				</div>
				<a href="?page=#" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h4>
						<?= "2"; ?>
					</h4>

					<p>Nilai</p>
				</div>
				<div class="icon">
					<i class="fa fa-graduation-cap"></i>
				</div>
				<a href="?page=#" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h4>
						<?= "3"; ?>
					</h4>

					<p>Pretest Posttest</p>
				</div>
				<div class="icon">
					<i class="fa fa-pencil-square-o"></i>
				</div>
				<a href="?page=#" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h4>
						<?= "4"; ?>
					</h4>

					<p>Uraian Materi</p>
				</div>
				<div class="icon">
					<i class="fa fa-book"></i>
				</div>
				<a href="?page=materi" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>