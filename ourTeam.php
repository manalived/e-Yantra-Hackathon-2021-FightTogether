<?php
	include('header.php');
	require('connection.php');
?>
	
	<h3 style = "color: white">Our Team</h3>
	<?php
		if(isset($_SESSION['username'])){
			?> 
			<a href="../logout.php">
				<button type="button" class="btn btn-danger">Logout</button>
			</a>
		<?php	
		} 
		else{
			?>
			<a href="../login.php">
				<button type="button" class="btn btn-success">Login/Register</button>
			</a>
		<?php
		}
	?>
	</nav>
</div>
<!-- Team Details-->
<div class="container">
	<div class="row">
	<center>
		<p style="font-size:20px">We as a team, with an intention of servicing our nation, have developed this platform. In such a pandemic days and in an extreme 
			fighting situation against covid, we would be delighted if we are able to help the fellow citizens of our nation!
		</p>
	</center>
		<div class="col-lg-3">
			<div class="card card-custom">
				<img src="assets/img/neha.jpg" class="card-img-top" alt="Image will be here" style="height: auto; width: auto; margin:10px">
				<div class="social">
					<a href=""><i class="fa fa-github"></i></a>
					<a href="https://www.linkedin.com/in/neha-mandani-9758aa1b5"><i class="fa fa-linkedin"></i></a>
				</div>	
				<div class="card-body">
					<h5 class="card-title">Neha Mandani</h5>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="card card-custom">
				<img src="assets/img/harsh.jpg" class="card-img-top" alt="Image will be here" style="height: auto; width: auto; margin:10px">
				<div class="social">
					<a href="https://github.com/harshved"><i class="fa fa-github"></i></a>
					<a href="https://www.linkedin.com/in/harsh-v-197480128/"><i class="fa fa-linkedin"></i></a>
				</div>
				<div class="card-body">
					<h5 class="card-title">Harsh Ved</h5>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="card card-custom">
				<img src="assets/img/shrey.jpg" class="card-img-top" alt="Image will be here" style="height: auto; width: auto; margin:10px">
				<div class="social">
					<a href="https://github.com/sdoshi983"><i class="fa fa-github"></i></a>
					<a href="https://www.linkedin.com/in/shrey-doshi-664425190/"><i class="fa fa-linkedin"></i></a>
				</div>
				<div class="card-body">
					<h5 class="card-title">Shrey Doshi</h5>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="card card-custom">
				<img src="assets/img/harshB.jpg" class="card-img-top" alt="Image will be here" style="height: auto; width: auto; margin:10px">
				<div class="social">
					<a href="https://github.com/hbhatt1801"><i class="fa fa-github"></i></a>
					<a href="https://www.linkedin.com/in/harsh-bhatt-241207201"><i class="fa fa-linkedin"></i></a>
				</div>
				<div class="card-body">
					<h5 class="card-title">Harsh Bhatt</h5>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>