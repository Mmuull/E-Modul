
<!-- Main content -->
<section class="content">
	<style>
		table, th, td{
			border: 1px solid black;
		}
		form{
			/* margin-top: 5%; */
			margin-left: 15%;
			margin-right: 15%;
		}
		/* td{ 
			text-align: center;
			align-content: center;
		} */
		input{
			resize: none;
			border: none;
			/* background-color: #ECF0F5; */
			width: 100%;
		}
		p{
			font-size: 16px;
		}
	</style>
	<?php $file = fopen("dist/file/lkpdspek.csv","r"); ?>
	<!-- <div class="box box-primary" style="padding: 50px;"> -->
	<br> <p> 2. Lihatlah spesifikasi komputer yang kalian gunakan, kemudian isilah lembar kerja siswa berikut:</p> <br>
	<form action="/admin/nilai/nilailkpd.php" method="post">
		<table class="table table-hover" style="font-size: 16px;">
			<!-- <thead> -->
				<tr>
					<th class="text-center" scope="col">Nomer</th>
					<th class="text-center" scope="col">Spesifikasi Hardware</th>
					<th class="text-center" scope="col">Spesifikasi</th>
				</tr>
			<!-- </thead>
			<tbody> -->
				<?php
				while (($line = fgetcsv($file)) !== false) { 
					// $line = fgetcsv($file); var_dump($line); ?>
				<tr>
					<td class="text-center" scope="row"><b><?= $line[0]?></b></t>
					<td style="text-align: left;"><?= $line[1]?> </td>
					<td> <input type="text" name="<?= $line[2]?>" id="<?= $line[2]?>" placeholder="Isi Spesifikasi"> </td>
				</tr>
				<?php } ?>
				<tr>
					<td class="text-center" scope="row"><b>8</b></t>
					<td> <input type="text" name="blankdevice1" id="blankdevice1" placeholder="Isi Kategori"> </td>
					<td> <input type="text" name="blankspec1" id="blankspec1" placeholder="Isi Spesifikasi"> </td>
				</tr>
				<tr>
					<td class="text-center" scope="row"><b>9</b></t>
					<td> <input type="text" name="blankdevice2" id="blankdevice2" placeholder="Isi Kategori"> </td>
					<td> <input type="text" name="blankspec2" id="blankspec2" placeholder="Isi Spesifikasi"> </td>
				</tr>
			<!-- </tbody> -->

		</table>
	</form>
	<!-- </div> -->
</section>