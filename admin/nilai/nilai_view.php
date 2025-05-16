<section class="content-header">
	<h1>
		Nilai Siswa
		<!-- <small>Buku</small> -->
	</h1>
	<ol class="breadcrumb">
		<!-- <li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>Si Perpustakaan</b>
			</a>
		</li> -->
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<!-- <div class="box-header with-border">
			<a href="?page=add_sirkul" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
		</div> -->
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive" style="overflow-x: hidden;">
				<?php 
					$query = "SELECT n.id_nilai, n.id_siswa, s.nama_siswa, s.kelas, n.nilai_pretest, n.nilai_posttest, n.summary 
					FROM tb_nilai n JOIN tb_siswa s 
					ON n.id_siswa = s.id_siswa";
					$sql = $koneksi->query($query);
					$_SESSION['id_siswa'] = [];
				?>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Siswa</th>
							<th>Kelas</th>
							<th>Nilai Pretest</th>
							<th>Nilai Posttest</th>
							<th>Summary</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
						<?php
							$no = 1;
							while ($data = $sql->fetch_assoc()) {
								array_push($_SESSION['id_siswa'], $data['id_siswa']);

								echo "<td>$no</td>";
								$attribute_key = 0;
								foreach ($data as $key => $value) {
									if ($attribute_key < 2) { $attribute_key++; continue; }
									echo "<td>$value</td>";
								}
						?>
							<td>
								<button class="btn btn-danger" title="Cek Pretest" onclick="deleteData(<?= $data['id_siswa']?>)">
									<i class="glyphicon glyphicon-remove-sign"></i></button>

								<!-- <a href="index.php?page=pretest&mode=check&order=<?= "" //$no ?>" title="Cek Pretest" class="btn btn-warning">
									<i class="glyphicon glyphicon-upload"></i></a> -->
							</td>
						</tr>
						<?php $no++; } ?>
					</tbody>
				</table>
			</div>
			<span style="color: red;">* Nilai akan dibuat ketika Siswa baru dibuat</span><br>
			<span style="color: red;">** Data nilai otomatis diperbarui saat Siswa selesai mengerjakan tes</span>
		</div>
	</div>

	<script>
		function deleteData(no){
			if (confirm("Yakin akan atur ulang nilai siswa?")){
				window.location.href = `admin/nilai/nilaipreposttest.php?mode=delete&id=${no}`
			}
		}
	</script>

</section>