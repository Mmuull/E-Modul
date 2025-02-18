<section class="content-header">
	<h1 style="font-size: 32px; text-align:center;">
		<?= ucfirst($_GET['page'])?>
	</h1>
	<ol class="breadcrumb">
		<!-- <li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>Dashboard</b>
			</a>
		</li> -->
	</ol>
	<!-- Main content -->
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
		section.content-wrapper{
			padding-top: 3%;
			padding-left: 15%;
			padding-right: 15%;
		}
		div.content{
			padding: 5% 15% 5%;
		}
		div.choices{
			padding: 5%;
			/* width: 100%; */
		}
		span.question{
			font-size: 21px;
		}
		button.btn{
			margin: 1%;
			border: none;
			outline: none;
			/* color: white; */
			/* pointer-events: none; */
		}
		button.disabled{
			pointer-events: none;
		}
		img.answer{
			width: 25px;
			height: 25px;
		}
	</style>
	<?php 
		// Initialize
		$testtype = $_GET['page'];
		$index = 0; // Get ABCD answer

		// Reset button for Admin
		if(isset($_POST['reset'])) {
            $_POST['reset'] = NULL;
			$_SESSION[$testtype.'result'] = NULL;
        }
		
		$file = fopen("dist/file/$testtype.csv","r"); 
		$isDissabled = isset($_SESSION[$testtype.'result']) ? "disabled" : "";
		$result = isset($_SESSION[$testtype.'result']) ? $_SESSION[$testtype.'result'] : NULL; // Set result to NULL if not checking. Get result from test array
	?>
	<div class="content">
		<?php while (($line = fgetcsv($file)) !== false) { ?>
		<div class="box box-primary choices">
			<span class="question"> <?= $line[0].". ".$line[1]?></span>
			<?php $line[0] = $line[0] == 10 ? "X" : $line[0] // Change 10 to X.?> 
			<div class="box-header with-border">
				<?php 
					$csvindex = 2; // Get csv index for display multiple choises
					foreach (['A', 'B', 'C', 'D'] as $key) {
						// Set color button if student has already 
						if (isset($_SESSION[$testtype.'result']) && isset($result)){ 
							if ($line[6] != $key) { $color = "primary";}
							if ($line[6] == $key){$color = "success";} 
							if ($result[$index*2+1] == $key && $result[$index*2+1] != $line[6]) {$color = "danger";}
						} else{ $color = "primary";} ?> 
						<button class="btn btn-lg btn-<?= $color ?> <?= $isDissabled?>" name="<?= "btn".$line[0]?>" id="<?= $line[0].$key?>" onclick="checkClass(this)"><?= $key.". ".$line[$csvindex]?></button>
						<?php 	if ($color == "success"){?><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgocTyVpIy46tZlR9nbhz11n7S3EsrnSYPSg&s" class="answer" alt="Correct Answer"><?php }
								elseif ($color == "danger"){?><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRL21HutellZS8TzF-_I1AeL1EtayJ2aHNxMQ&s" class="answer" alt="Wrong Image"><?php }?>
						<br>
				<?php 	$csvindex++; } $index++; ?>
			</div>
		</div>
		<?php } ?>
		<form name="result" id="result" action="admin/nilai/nilaipreposttest.php" method="POST">
			<input type="hidden" name="student_id" id="student_id" value="<?= $_SESSION['ses_id']?>">
			<input type="hidden" name="answer" id="answer" value="null">
			<input type="hidden" name="testtype" id="testtype" value="<?= $testtype ?>">
		</form>
		<?php 
			if (!isset($_SESSION[$testtype.'result'])) {?>
				<!-- <input class="btn btn-lg btn-primary" type="submit" name="submit" value="Submit"> -->
				<button class="btn btn-lg btn-primary" onclick="submit()">Submit</button>
				<?php }
			if ($_SESSION['ses_level'] == 'Administrator' && isset($_SESSION[$testtype.'result'])) {?>
				<form method="post">
					<input class="btn btn-lg btn-primary" type="submit" name="reset" value="Reset">
				</form>
		<?php } ?>
	</div>

	<script>
		function checkClass(btn) {
			// Deselect all buttons
			var buttons = document.getElementsByName(btn.name)
			for (var i = 0; i < buttons.length; i++) {
				buttons[i].classList.remove("active")
			}
			if (!btn.classList.contains("disabled")){
				// Select the clicked button if no disabled
				btn.classList.add("active")
			}
		}

		function submit() {
			if (confirm("Sudah yakin dengan jawabannya?")){
				answers = ""
				var buttons = document.getElementsByClassName("btn")
				for (var i = 0; i < buttons.length; i++) {
					if (buttons[i].classList.contains("active")){
						answers = answers + buttons[i].id
					}
				}
				if (answers.length == 20){
					document.getElementById('answer').value = answers
					document.result.submit()
				}
				else{
					console.log(`Answer Length = ${answers.length}`)
					alert("Isi yang benar")
				}
			}	
		}
		
		// document.getElementsByName('options').addEventListener('click', 
		// function(event) {
		// 	event.preventDefault(); // Prevent form submission
		// 	// console.log('Form submission prevented');
		// });
	</script>
</section>