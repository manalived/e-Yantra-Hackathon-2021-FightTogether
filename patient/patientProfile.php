<?php 
	include("../header.php");
	include("../connection.php");	
	if(!($_SESSION['loginAs'] == 'Patient')){
		header('location:/login.php');
	}	
	$patientId = $_SESSION['id'];
	$sql = "select * from patients where patientId = $patientId";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
?>
<script>
	   $(function () {
		  $('#firstname , #lastname').keydown(function (e) {
			  if (e.shiftKey || e.ctrlKey || e.altKey) {
				  e.preventDefault();
			  } else {
				  var key = e.keyCode;
				  if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
					  e.preventDefault();
				  }
			  }
		  });
		  $('#email').keydown(function (e) {
			  if (e.ctrlKey || e.altKey) {
				  e.preventDefault();
			  } else {
				  var key = e.keyCode;
				  if (!((key == 8) || (key == 46)|| (key == 190)|| (key == 110) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90)|| (key >= 48 && key <= 57)|| (key >= 96 && key <= 105))) {
					  e.preventDefault();
				  }
			  }
		  });
	  });
		function checkPasswordMatch() {
			var password = $("#password").val();
			var confirmPassword = $("#Confirm_Password").val();
			if (password != confirmPassword)
				$("#CheckPasswordMatch").html("Passwords does not match!");
			else
				$("#CheckPasswordMatch").html("Passwords match.");
		}
		$(document).ready(function () {
		   $("#Confirm_Password").keyup(checkPasswordMatch);
		});
</script>
		<a class="navbar-brand" href="#">Patient Profile</a>
		<a href="http://fighttogether.epizy.com/">
			<button type="button" class="btn btn-warning">Home</button>
		</a>
    </nav>
	<div class="container pt-3">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
		     <center><h2 style="color:#00bc8c">Patient Profile</h2></center>
			 <form action="registerPatientManage.php" method="POST" style="margin-bottom:100px;box-shadow: 3px 1px 18px #ff8800 inset, -3px -1px 18px #00bc8c; margin: 20px; padding: 30px 40px;">
					<input type="hidden" name="patientId" value="<?=$patientId?>">
					<div class="form-group">
						<label>First Name</label>   
						<input type="text" class="form-control" id="firstName" value="<?=$row['firstName']?>" name="firstName" placeholder="Enter First Name" required>
					</div>
					<div class="form-group">
						<label>Last Name</label>   
						<input type="text" class="form-control" id="lastName" value="<?=$row['lastName']?>" name="lastName" placeholder="Enter Last Name" required>
					</div>
					<div class="form-group">
						<label for="email">Username</label>
						<input type="email" class="form-control" id="email" value="<?=$row['email']?>" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
						<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" value="<?=$row['password']?>" name="password" placeholder="Password" required>
					</div>
					<div class="form-group">
						<label for="Confirm_Password">Confirm Password</label>
						<input type="password" class="form-control" id="Confirm_Password" value="<?=$row['password']?>" placeholder="Confirm Password" required>
						<div class="registrationFormAlert" style="color:#20c997;" id="CheckPasswordMatch"></div> 
					</div>
					<div class="form-group">
						<label>Contact No.</label>   
						<input type="number" class="form-control" id="contactNo" value="<?=$row['contactNo']?>" name="contactNo" placeholder="Enter Contact Number" required>
					</div>
					<div class="form-group">
						<label for="Address">Address </label>
                        <input type="text" id="address" value="<?=$row['address']?>" name="address" placeholder="Enter your address" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="city">City </label>
                        <input type="text" id="city" value="<?=$row['city']?>" name="city" placeholder="Enter city" class="form-control" required>
					</div>
					
					<div class="form-group">
						<label for="state">State </label>
                        <input type="text" id="state" value="<?=$row['state']?>" name="state" placeholder="Enter state" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="pincode">Pin Code </label>
                        <input type="text" id="pincode" value="<?=$row['pincode']?>" name="pincode" placeholder="Enter pincode" class="form-control" required>
					</div>
					
					<button type="submit" class="btn btn-outline-warning" id="btnvalidation" style="border-color:#f80">Submit</button>
					<!--<a href="index.php" style="color:#00bc8c">&nbsp;&nbsp;&nbsp; Now You Can Login.</a>-->
				</form>
			</div>
			<div class="col-lg-2"></div>
		</div>
	</div>
</body>
</html>