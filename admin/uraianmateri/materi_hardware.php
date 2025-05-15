<!-- Main content -->
<section class="content">
	<style>
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
	<div class="box box-primary" style="padding: 2% 5% 2%;">
		<div class="content-header">
			<a href="?page=materi" class="btn btn-lg btn-primary" title="Kembali"><i class="fa fa-arrow-left"></i></a>
		</div>
		<h3 style="font-size: 32px; text-align:center;">
			Perangkat Keras Komputer
		</h3>
		<br>
		<!-- /.box-header -->
		<p style="font-size: 18px; text-align: justify">
			Perangkat keras komputer adalah perangkat pada komputer yang memiliki bentuk fisik secara nyata dan
			dapat diraba dan dilihat. Perangkat keras dibagi berdasarkan fungsinya yaitu sebagai perangkat masukan
			(<i>input</i>), pemroses (<i>processor</i>), keluaran (<i>output</i>), memori dan penyimpan (<i>storage</i>).
		</p>

		<?php 
		$section = $_GET['hardware'];
		$section_materi = ['input',  'process', 'output', 'storage'];
		$section_index = array_search($section, $section_materi);
		
		$file = fopen("dist/file/materihardware.csv","r"); ?>
		<section id="<?php echo $section?>"><br>
		<h4 style="font-weight: bold; font-size: 18px;">Perangkat <?php echo ucfirst($section) ?></h4>
		<div class="box-body">
			<div class="table-responsive">
				<table id="materi" class="table table-striped">
				<thead>
					<tr>
						<th class="text-center" style=" font-size: 18px; width: 40%;">Gambar</th>
						<th class="text-center" style=" font-size: 18px;">Penjelasan</th>
					</tr>
				</thead>
				<tbody>
					<?php while (($line = fgetcsv($file)) !== false) { 
						// $line = fgetcsv($file); var_dump($line);
						if ($line[1] == $section){ ?>
						<tr>
							<td style="text-align: center; padding: 40px;">
								<img src="<?php echo $line[2]?>" alt="No Image">
							</td>
							<td style="padding: 40px; font-size: 18px; text-align: justify">
								<p> <?php echo $line[3]?> </p>
								<p> Fungsi dari <?php echo strtolower($line[0])?> diantaranya: </p>
								<ol>
									<?php $fungsi = array_slice($line,4);
									for ($i = 0; $i < count($fungsi); $i+=2) {
										echo "<li>".$fungsi[$i]."</li>";
										echo "<p>".$fungsi[$i+1]."</p>";
									} ?>
								</ol>
							</td>
						</tr>
					<?php }} ?>
				</tbody>
				</table>
			</div>
			<div class="content-footer">
				<?php if ($section_index != 0) {?>
				<a href="?page=materihardware&hardware=<?= $section_materi[$section_index - 1] ?>" class="btn btn-lg btn-primary btn-left" title="Kembali">
					<i class="fa fa-arrow-left"> </i>
					<span style="font-family: Arial, Helvetica, sans-serif;">Perangkat <?= ucfirst($section_materi[$section_index - 1]) ?></span>
				</a>
				<?php } if ($section_index != count($section_materi)- 1) {?>
				<a href="?page=materihardware&hardware=<?= $section_materi[$section_index + 1] ?>" class="btn btn-lg btn-primary btn-right" title="Selanjutnya">
					<span style="font-family: Arial, Helvetica, sans-serif;">Perangkat <?= ucfirst($section_materi[$section_index + 1]) ?></span>
					<i class="fa fa-arrow-right"> </i>
				</a>
				<?php } else {?>
				<a href="?page=materispesifikasi" class="btn btn-lg btn-primary btn-right" title="Selanjutnya">
					<span style="font-family: Arial, Helvetica, sans-serif;">Spesifikasi Komputer</span>
					<i class="fa fa-arrow-right"> </i>
				</a>
				<?php } ?>
			</div>
		</div>
		</section>
	</div>
</section>