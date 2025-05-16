<?php
	// Count Pengguna
	$sql = $koneksi->query("SELECT count(id_pengguna) as agt from tb_pengguna");
	while ($data= $sql->fetch_assoc()) {
		$countpengguna=$data['agt'];
	}
	// Count Siswa 
	$sql = $koneksi->query("SELECT count(id_siswa) as agt from tb_siswa");
	while ($data= $sql->fetch_assoc()) {
		$countsiswa=$data['agt'];
	}
	// Count Siswa Done pretest and posttest
	$sql = $koneksi->query("SELECT count(id_siswa) as agt from tb_nilai where nilai_pretest != 0 and nilai_posttest != 0");
	while ($data= $sql->fetch_assoc()) {
		$countnilaisiswa=$data['agt'];
	}
	
	// Get tb_nilai Data or Doughnut Chart
	$sql = $koneksi->query("SELECT count(id_siswa) as agt from tb_nilai where nilai_pretest = 0 and nilai_posttest = 0");
	while ($data= $sql->fetch_assoc()) {
		$count_status_undone=$data['agt'];
	}
	$sql = $koneksi->query("SELECT count(id_siswa) as agt from tb_nilai where nilai_pretest != 0 and nilai_posttest = 0");
	while ($data= $sql->fetch_assoc()) {
		$count_status_halfdone=$data['agt'];
	}
	$sql = $koneksi->query("SELECT count(id_siswa) as agt from tb_nilai where nilai_pretest != 0 and nilai_posttest != 0");
	while ($data= $sql->fetch_assoc()) {
		$count_status_done=$data['agt'];
	}

	// Get tb_nilai Data or Doughnut Chart
	$siswaname = [];
	$siswagrade = [];
	$sql = $koneksi->query(
		"SELECT s.nama_siswa as nama, n.summary as grade
		FROM tb_nilai n JOIN tb_siswa s
		WHERE n.id_siswa = s.id_siswa"
	);
	while ($data= $sql->fetch_assoc()) {
		array_push($siswaname, $data['nama']);
		array_push($siswagrade, $data['grade']);
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
						Total Pengguna
					</h4>

					<p><?= "$countpengguna"?> Pengguna</p>
				</div>
				<div class="icon">
					<i class="fa fa-user"></i>
				</div>
				<a href="?page=pengguna" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h4>
						Total Siswa
					</h4>

					<p><?= $countsiswa; ?> Siswa</p>
				</div>
				<div class="icon">
					<i class="fa fa-graduation-cap"></i>
				</div>
				<a href="?page=siswa" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h4>
						Siswa Telah Selesai
					</h4>

					<p><?= $countnilaisiswa ?> Siswa</p>
				</div>
				<div class="icon">
					<i class="fa fa-pencil-square-o"></i>
				</div>
				<a href="?page=nilai" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-8 col-xs-16 barchart">
			<canvas id="nilaiChart"></canvas>
		</div>

		<div class="col-lg-4 col-xs-8 doughnutbar">
			<canvas id="statusChart"></canvas>
		</div>

		<!-- Chart js -->
		<script src="dist/js/chart/dist/chart.umd.js"></script>

		<script>
			const nilaichart = document.getElementById('nilaiChart');

			new Chart(nilaichart, {
				type: 'bar',
				data: {
				labels: <?php echo json_encode($siswaname);?>,
				datasets: [{
					label: 'Nilai Akhir Siswa',
					// categoryPercentage : 100,
					data: <?php echo json_encode($siswagrade);?>,
					borderWidth: 1,
					backgroundColor : '#0073b7',
					borderColor : '#36A2EB'
				}]
				},
				options: {
				scales: {
					y: {
						beginAtZero: true,
						// grid: {
						// 	offset: true
						// }
					}
				}
				}
			});

			// Pretest Posttest Status Siswa
			const statusChart = document.getElementById('statusChart');

			new Chart(statusChart, {
				type: 'doughnut',
				data: {
				labels: ['Belum Sama Sekali', 'Hanya Pretest', 'Sudah Pretest dan Posttest'],
				datasets: [{
					data: [<?=$count_status_undone?>, <?=$count_status_halfdone?>, <?=$count_status_done?>],
					// borderWidth: 1,
					backgroundColor : [
						'#dd4b39',
						'#f39c12',
						'#00a65a'
					],
					borderColor : '#36A2EB',
					hoverOffset: 4
				}]
				},
				options: {
				scales: {
					y: {
					beginAtZero: true
					}
				}
				}
			});
		</script>
		