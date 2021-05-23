<?php 
	include("header.php");
?>

	<div class="text-center"><h3 style="color: white; text-align: center">Login</h3></div>
</nav>
</div>
	<div class="container pt-3"> 
		<div class="row"> 
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
		     <center><h3 style="margin:10px 0 30px 0; color:#00bc8c">Login Form</h3></center>
				<form action="validateuser.php" method="POST" style="box-shadow: 3px 1px 18px #ff8800 inset, -3px -1px 18px #00bc8c; margin: 20px; padding: 30px 40px;">
					<div class="form-group">
						<label for="loginAs" style="margin-right:40px">Login as</label>
						<input type="radio" name="loginAs" id="patient"  style="margin-right:5px" value="Patient" checked><label for="patient" style="margin-right:20px">Patient</label>
						<input type="radio" name="loginAs" id="hospital" style="margin-right:5px" value="Hospital"><label for="hospital" style="margin-right:20px">Hospital</label>
						<input type="radio" name="loginAs" id="medicalStore" style="margin-right:5px" value="medicalStore"><label for="medicalStore" style="margin-right:20px">Medical Store</label>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Email address</label>
						<input type="email" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
					</div> 
					<div class="form-group" style="margin-bottom:25px">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
					</div>
					<a href="patient/registerPatient.php" style="color: #343a40">Click here to Register</a><br>
					<button type="submit" class="btn btn-outline-warning" style="margin-top:20px">Login</button>
				</form>
			</div>
			<div class="col-lg-2"></div> 
		</div>
	</div>
</body>
</html>