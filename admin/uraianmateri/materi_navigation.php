<section class="content-header">
	<style>
		.content-main{
			margin: 0 10% 0;
		}
		.card-container{
			display: flex;
			justify-content: center;
		}
		.card{
			border: 2px black solid;
			margin: 1% 1.5% 1%;

			height: 200px;

			border-radius: 10%;
			text-align: center;
		}
		.card-blue{
			background-color: dodgerblue;
		}
		.card-icon{
			display: flex;
			justify-content: center;
			align-items: center;
			padding-top: 20%;

			/* background-color: white; */
			height: 60%;
			font-size: 75px;
			transition: all 0.3s linear;

		}
		.card-icon:hover{
			font-size: 95px;
		}
		.card-label{
			font-size: 20px;
			font-weight: normal;

			width: 100%;
		}
		div.content-header{
			font-size: 32px;
			text-align:center;
		}
		div.content-header p{
			font-size: 18px;
		}
	</style>
	<div class="content-header">
		<div class="content-main">
			<h1>
				Uraian Materi
			</h1>
			<p>
				Lorem Ipsum is a widely used placeholder text in design and publishing, originating from a work by Cicero, and is often generated for use in layouts and mockups.
			</p>
		</div>
	</div>
</section>
<!-- Main content -->
<section class="content content-main">

	<!-- Info boxes (Stat box) -->
	<div class="row card-container">
		<div class="card col-lg-2 col-xs-6 bg-light-blue" style="border: 4px #0073b7 solid">
			<a class="navi bg-light-blue" href="?page=materihardware&hardware=input">
				<div class="card-icon">
					<i class="fa fa-download"></i>
				</div>
				<div>
					<span class="card-label">Perangkat Input</span>
				</div>
			</a>
		</div>
		<div class="card col-lg-2 col-xs-6 bg-lime" style="border: 4px #00a65a solid">
			<a class="navi bg-lime" href="?page=materihardware&hardware=process">
				<div class="card-icon">
					<i class="fa fa-cogs"></i>
				</div>
				<div>
					<span class="card-label" >Perangkat Proses</span>
				</div>
			</a>
		</div>
		<div class="card col-lg-2 col-xs-6 bg-orange" style="border: 4px #dd4b39  solid">
			<a class="navi bg-orange" href="?page=materihardware&hardware=output">
				<div class="card-icon">
					<i class="fa fa-cloud-upload"></i>
				</div>
				<div>
					<span class="card-label" >Perangkat Output</span>
				</div>
			</a>
		</div>
		<div class="card col-lg-2 col-xs-6 bg-red" style="border: 4px #d33724 solid">
			<a class="navi bg-red" href="?page=materihardware&hardware=storage">
				<div class="card-icon">
					<i class="fa fa-archive"></i>
				</div>
				<div>
					<span class="card-label" >Perangkat Storage</span>
				</div>
			</a>
		</div>
	</div>
	<div class="row card-container">
		<div class="card col-lg-2 col-xs-6 bg-teal" style="border: 4px #00c0ef solid">
			<a class="navi bg-teal" href="?page=materispesifikasi">
				<div class="card-icon">
					<i class="fa fa-desktop"></i>
				</div>
				<div>
					<span class="card-label" >Spesifikasi Komputer</span>
				</div>
			</a>
		</div>
		<div class="card col-lg-2 col-xs-6 bg-yellow" style="border: 4px #ff851b solid">
			<a class="navi bg-yellow" href="?page=materiproses">
				<div class="card-icon">
					<i class="fa fa-spinner"></i>
				</div>
				<div>
					<span class="card-label" >Proses Komputer</span>
				</div>
			</a>
		</div>
	</div>
</section>