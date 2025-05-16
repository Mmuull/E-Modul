<!-- Main content -->
<section class="content">
	<style>
		h2{
			text-align: center;
		}
		div.process{
			margin: 5% 0 5%;
			display: flex;
			justify-content: center;
			align-items: center;
		}
		table.table-process{
			margin: 5% 5% 5%;
			width: 90%;
		}
		tr{
			padding: 5% 0 5%;
		}
		.rowProcess{
			font-size: 18px;
		}

		.content-header{
			font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
			align-items: center;
		}
		.content-footer{
			width: 100%;
			height: 50px;
		}
		.btn-left{
			float: left;
		}
		.btn-right{
			float: right;
		}
	</style>
	<div class="box box-primary" style="padding: 50px;">
		<div class="content-header">
			<a href="?page=materi" class="btn btn-lg btn-primary" title="Uraian Materi Menu"><i class="fa fa-arrow-left"></i></a>
		</div>
		<!-- /.box-header -->
		<?php 
		$file = fopen("dist/file/materiprocess.csv","r"); ?>
		<h2>Proses sistematika kerja komputer dari input ke proses ke output</h2>
		<div class="process">
			<img src="dist/img/pcprocess.png" alt="">
		</div>
		<table id="process" class="table table-hover table-process">
			<?php
			$no = 1;
			while (($line = fgetcsv($file)) !== false) { 
				if ($no == 1){$no++; continue;}?>	
				<tr>
					<td class="rowProcess" colspan="3"><?=$no-1,". ",$line[0]?></td>
				</tr>
				<tr>
					<td class="rowProcess"><b>Input</b></td>
					<td class="rowProcess">:</td>
					<td class="rowProcess"><?=$line[1]?></td>
				</tr>
				<tr>
					<td class="rowProcess"><b>Proses</b></td>
					<td class="rowProcess">:</td>
					<td class="rowProcess"><?=$line[2]?></td>
				</tr>
				<tr>
					<td class="rowProcess"><b>Output</b></td>
					<td class="rowProcess">:</td>
					<td class="rowProcess"><?=$line[3]?></td>
				</tr>
				<tr><td colspan="3"><span></span></td></tr>
			<?php $no++; }?>
		</table>
		<div class="content-footer">
			<a href="?page=materispesifikasi" class="btn btn-lg bg-teal btn-left" title="Kembali">
				<i class="fa fa-arrow-left"> </i>
				<span style="font-family: Arial, Helvetica, sans-serif;">Spesifikasi Komputer</span>
			</a>
		</div>
	</div>
</section>