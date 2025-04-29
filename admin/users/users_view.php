<section class="content-header">
	<h1>
		<?= ucfirst($_GET['page'])?>
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
	<style>
		button{
			margin: 0 1% 0;
		}
		button.action{
			width: 100%;
			height: 100%;
		}
		input{
			border: 0;
			max-width: 120px;
			/* appearance: none;
			-webkit-appearance: none; */
		}
		.even{
			background-color: #FFFFFF;
		}
		.odd{
			background-color: #F9F9F9;
		}
	</style>
	<?php
		$table = $_GET['page'];
		$query = "SELECT * FROM tb_$table";
		$dataQuery = $koneksi->query($query);

		$query = "DESCRIBE tb_$table";
		$result = $koneksi->query($query);

		$tableAttributes = [];
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				// echo "Field: " . $row["Field"]. " - Type: " . $row["Type"]. "<br>";
				// echo $row["Field"]." : "; echo var_dump($row["Type"])."<br>"; // Check field name and type datatype
				array_push($tableAttributes, $row["Field"]);
			}
		} else {
			echo "0 results";
		}
	?>
	<div class="box box-primary">
		<div class="box-header with-border">
			<?php 

			if (!isset($_GET['tambah_user'])){?>
			<a href="index.php?page=<?= $table?>&tambah_user=true" title="Tambah User" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Tambah User</a>
			<?php } else {?>
			<a href="index.php?page=<?= $table?>" title="Batal" class="btn btn-danger">
				<i class="glyphicon glyphicon-minus"></i> Batal Tambah </a>
			<?php } ?>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<!-- Set all attribut as table header except id-->
							<th>No</th>
							<?php foreach ($tableAttributes as $index => $value) { if ($index != 0) {echo "<th>".ucwords($value)."</th>";} } ?>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						while ($userData = $dataQuery->fetch_assoc()) {
							$class = $no % 2 == 0 ? 'even' : 'odd'; // Set background color ?>
							<tr>
								<!-- Row Numbering -->
								<td><?=$no?></td>
								<?php 
								$attributetoskip = ["id_pengguna", "id_siswa"];
								foreach ($userData as $key => $value) {
									if (in_array(strtolower($key),$attributetoskip)) { continue; } // Skipping id display?> 
									<td>
										<!-- Level input -->
										<?php if($key == "level"){ ?>
											<input class="<?=$class?>" name="data<?=$no?>" id="<?= $userData['id_'.$table]?>" list="level" value="<?= $value?>" ondblclick="setToEdit(this)" readonly>
											<!-- Give level option  -->
											<datalist id="level"> 
												<?php switch ($table) {
													case 'pengguna':
														echo "<option value='Administrator'>";
														echo "<option value='Guru'>";
														break;
													case 'siswa':
														echo "<option value='Student'>";
														break;
													default:
														# code...
														break; } ?>
											</datalist>
										<!-- Default -->
										<?php } else { ?>
										<input class="<?=$class?>" name="data<?=$no?>" id="<?= $userData['id_'.$table]?>" type="text" value="<?= $value?>" ondblclick="setToEdit(this)" readonly>
										<span class="<?=$class?>" style="display: none;"><?= $value?></span>
										<?php } ?>
									</td>
								<?php } ?>
								<td>
									<!-- EDIT only visible when not add new user and input is doubleclicked-->
									<?php if (!isset($_GET['tambah_user'])){?>
										<button class="btn btn-warning" id="edit <?= $userData['id_'.$table]?>" title="Edit <?= $userData['nama_'.$table]?>" onclick="editData(<?= $userData['id_'.$table]?>, '<?='data'.$no?>')" style="visibility: hidden;">
										<i class="glyphicon glyphicon-pencil"></i></a>
									
									<!-- DELETE only visible when not their -->
									<?php if ($_SESSION['ses_id'] != $userData['id_'.$table] && $_SESSION['ses_level'] == 'Administrator'){?>
									<button class="btn btn-danger" id="hapus <?= $userData['id_'.$table]?>" title="Hapus <?= $userData['nama_'.$table]?>" onclick="deleteData(<?= $userData['id_'.$table]?>)">
										<i class="glyphicon glyphicon-remove-sign"></i></button>
									<?php }}?>
								</td>
							</tr> 
						<?php 	$no++;} ?>

						<?php if (isset($_GET['tambah_user'])){?>
						<tr>
							<form action="inc/module_users.php" method="post">
								<input type="hidden" value="<?=$table?>" name="table" id="table" required>
								<td> <?= $no ?> </td>
								<td>
									<input type="text" name="<?= $table?>_name" id="<?= $table?>_name" placeholder="Nama" max="35" required>
								</td>
								<td>
									<input type="text" name="<?= $table?>_username" id="<?= $table?>_username" placeholder="Username" max="20" required>
								</td>
								<td>
									<input type="password" name="<?= $table?>_password" id="<?= $table?>_password" placeholder="Password" max="35" required>
								</td>
								<?php if ($table == 'pengguna'){ ?>
								<td>
									<select name="<?= $table?>_level" id="<?= $table?>_level" required>
										<option value="Administrator">Administrator</option>
										<option value="Guru">Guru</option>
									</select>
								</td>
								<?php }if ($table == 'siswa'){ ?>
								<td>
									<select name="<?= $table?>_gender" id="<?= $table?>_jekel" required>
										<option value="Laki-laki">Laki-laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</td>
								<td>
									<input type="text" name="<?= $table?>_kelas" id="<?= $table?>kelas" placeholder="Kelas" max="35" required>
								</td>
								<td>
									<input type="email" name="<?= $table?>_email" id="<?= $table?>_email" placeholder="Email" max="35" required>
								</td>
								<td>
									<input type="text" name="<?= $table?>_level" id="<?= $table?>_level" placeholder="Level" max="35" value="Student" required readonly>
								</td>
								<?php }?>
								<td>
									<button class="btn btn-success action" title="Submit" onclick="addData()">
										<i class="glyphicon glyphicon-ok"></i></button>
								</td>
							</form>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script>
		function setToEdit(input){
			// Make it editable and set background orange
			input.removeAttribute('readonly');
			if (input.getAttribute('list')) {
				input.value = "";
				input.placeholder = "Klik pilih opsi";
			}
			input.style.backgroundColor = '#F39C12';
			input.parentNode.style.backgroundColor = '#F39C12';

			// Visible the button
			const button = document.getElementById(`edit ${input.id}`);
			button.style.visibility = 'visible';
		}

		function editData(userId, inputName){
			condition = confirm("Edit User?")
			
			if (condition){
				const datas = document.getElementsByName(inputName);
				userData = [];
				datas.forEach((data, index) => {
					userData.push(data.value);
				});
				// console.log(`UserData :`, userData);

				// JSON builder
				<?php 
				$array = [];
				foreach ($tableAttributes as $value) {
					$array["$value"] = "";
				}
				$json = json_encode($array); ?>;
				var jsObject = JSON.parse('<?=$json?>');
				index = 0;
				Object.entries(jsObject).forEach(([key, value]) => {
					// console.log(`Key: ${key} - Value: ${value}`);
					if (index == 0) {jsObject[`${key}`] = userId; jsObject[`table`] = '<?=$table?>';} 
					else {jsObject[`${key}`] = `${userData[index-1]}`;}
					index++;
				}); // console.log('jsObject After:', jsObject);

				// Validation and execution
				validOptions= [['Administrator', 'Guru'],['Student']]; // This doesn't need if input change by options
				pengguna = 0; siswa = 1;
				if (validOptions[<?=$table?>].includes(userData[3]) || validOptions[<?=$table?>].includes(userData[6])) {
					fetch('inc/module_users.php', {
						method: 'POST',
						headers: {
							'Content-Type': 'application/json'
						},
						body: JSON.stringify(jsObject)
					})
					.then(response => response.text())
					.then(data => {
						console.log('Response:', data);
						window.location.href = `index.php?page=<?=$table?>`;
						alert('User Data has been saved');
					})
					.catch(error => {
						console.error('Error:', error);
					});
				} else {
					// console.log('User Data 6:', userData[6]);
					switch (<?=$table?>) {
						case pengguna:
							message = "Level only Administrator or Guru";
							break;
						case siswa:
							message = "Level only Student";
							break;
						default:
							break;
					}
					alert(`${message}`);
				}
			}
		}

		function deleteData(userId){
			if (confirm("Yakin akan menghapus data?")){
				window.location.href = `inc/module_users.php?table=<?=$table?>&method=delete&id=${userId}`;
			}
		}

		function addData(){
			if (confirm("Tambahkan user?")){
				document.result.submit();
			}
		}
	</script>

</section>