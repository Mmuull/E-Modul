<section class="content-header">
	<h1 style="font-size: 32px; text-align:center;">
		Perangkat Keras Komputer
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
	<?php 
		$section_materi = ['input',  'process', 'output', 'storage'];
	?>
	<div class="box box-primary" style="padding: 50px;">
		<!-- /.box-header -->
		<p style="font-size: 18px; text-align: justify">
			Perangkat keras komputer adalah perangkat pada komputer yang memiliki bentuk fisik secara nyata dan
			dapat diraba dan dilihat. Perangkat keras dibagi berdasarkan fungsinya yaitu sebagai perangkat masukan
			(<i>input</i>), pemroses (<i>processor</i>), keluaran (<i>output</i>), memori dan penyimpan (<i>storage</i>).
		</p>

		<?php 
		foreach ($section_materi as $section) { 
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
		</div>
		</section>
		<?php } ?>
		

		<section id="spesification"><br>
		<h4 style="font-size: 18px;font-weight: bold;">Spesifikasi Perangkat Keras</h4>
		<div class="box-body">
			<p style="font-size: 18px; text-align: justify">
				Sebuah komputer dengan sistem operasi Windows 8.1 memiliki spesifikasi berikut, 
				spesifikasi tersebut dapat dilihat dari menu <b>Control Panel > System and Security > System</b>
			</p>
			<br>
			<!-- <img src="/images/materi/spesifikasi1.png" alt="Spesifikasi 1"> -->
			<img 
				style="width: 500px; display: block; margin-left: auto; margin-right: auto" 
				src="https://www.faqforge.com/wp-content/uploads/2013/03/Screenshot-1.png" 
				alt="Spesifikasi 1">
			<br><br>
			<p style="font-size: 18px; text-align: justify">
				Untuk melihat perangkat keras lain, pilih <b>Device Manager</b>
			</p>
			<br>
			<!-- <img src="/images/materi/spesifikasi2.png" alt="Spesifikasi 2"> -->
			<img 
				style="width: 500px; display: block; margin-left: auto; margin-right: auto" 
				src="https://www.lifewire.com/thmb/k0GOy08godE1toW7UmwD4Utaf5Q=/960x640/filters:fill(auto,1)/devicemanager-48e8801275af43cc85073061b329ccd7.jpg" 
				alt="Spesifikasi 2">
			<br>
		</div>
		</section>

	</div>
</section>