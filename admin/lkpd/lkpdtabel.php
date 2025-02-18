<section class="content-header">
	<h1 style="font-size: 32px; text-align:center;">
		LKPD
	</h1>
	<ol class="breadcrumb">
		<!-- <li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>Dashboard</b>
			</a>
		</li> -->
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<style>
		table, thead, th, td{
			border: 1px solid black;
		}
		th{
			background-color: #ECF0F5;
		}
		td{
			text-align: center;
			align-content: center;
		}
		textarea{
			resize: none;
			border: none;
			/* background-color: #ECF0F5; */
		}
	</style>
	<?php $file = fopen("dist/file/materihardware.csv","r"); ?>
	<div class="box box-primary" style="padding: 50px;">
	<form action="/admin/nilai/nilailkpd.php" method="post">
		<br> <p> 1.  Dari bentuk dan ciri benda berikut, kategorikan perangkat keras tersebut dalam kelompok input, processor, output, atau storage.:</p> <br>
		<table class="table table-hover" style="font-size: 16px;">
			<!-- <thead> -->
				<tr>
					<th class="text-center" scope="col">Nomer</th>
					<th class="text-center" scope="col">Gambar</th>
					<th class="text-center" scope="col">Nama Perangkat</th>
					<th class="text-center" scope="col">Input Device</th>
					<th class="text-center" scope="col">Process Device</th>
					<th class="text-center" scope="col">Output Device</th>
					<th class="text-center" scope="col">Storage Device</th>
				</tr>
			<!-- </thead>
			<tbody> -->
				<?php 
					$row = 0;
					while (($line = fgetcsv($file)) !== false) { 
						// $line = fgetcsv($file); var_dump($line); 
						$row += 1;?>
					<tr>
						<td class="text-center" scope="row"><b><?= $row?></b></t>
						<td style="width: 250px;">
							<img style="width: 50%; height: 50%;" alt="Gambar device" src="<?= $line[2]?>">
						</t>
						<td>
							<!-- <input style="width: 100%; height: 100%;" type="text" name="name" id="name"> -->
							<textarea name="devicename" id="divicename" rows="6" cols="30" placeholder="Isi Nama Perangkat"></textarea>
						</td>
						<?php
							for ($i = 0; $i < 4; $i++) { ?>
								<td> <input type='radio' name='<?= "devicetype".strval($row) ?>' id="<?= "device".strval($row) ?>"> </td>
						<?php } ?>
					</tr>
				<?php } ?>
			<!-- </tbody> -->
		</table>
		<!-- Add another file --> 
		<?php include "lkpdspek.php"; ?>
	</form>
	</div>
</section>