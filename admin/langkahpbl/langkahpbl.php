<section class="content-header">
	<h1 style="font-size: 32px; text-align:center;">
		Langkah-langkah PBL
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
	<div class="box box-primary" style="padding: 50px;">
		<!-- /.box-header -->

		<?php $file = fopen("dist/file/langkahpbl.csv","r"); ?>
		<table id="materi" class="table table-striped" style="font-size: 16px">
			<?php while (($line = fgetcsv($file)) !== false) { 
				// $line = fgetcsv($file); var_dump($line);
				echo '<tr>';
				foreach ($line as $cell){ 
					echo '<td style="text-align: center; padding: 40px;">'.htmlspecialchars($cell).'</td>';
				}
				echo '</tr>';
			} ?>
		</table>
	</div>
</section>