<?php 
	include("../header.php");
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
		<a class="navbar-brand" href="#">Registration Form</a>
		<a href="../index.php">
			<button type="button" class="btn btn-warning">Home</button>
		</a>
    </nav>
	<div class="container pt-3">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
		     <center><h2 style="color:#00bc8c">Registration Form for Patient</h2></center>
			 <form action="registerPatientManage.php" method="POST" style="margin-bottom:100px;box-shadow: 3px 1px 18px #ff8800 inset, -3px -1px 18px #00bc8c; margin: 20px; padding: 30px 40px;">
					<input type="hidden" name="id" value="<?=$id?>">
					<div class="form-group">
						<label>First Name</label>   
						<input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter First Name" required>
					</div>
					<div class="form-group">
						<label>Last Name</label>   
						<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter Last Name" required>
					</div>
					<div class="form-group">
						<label for="email">Username</label>
						<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
						<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
					</div>
					<div class="form-group">
						<label for="Confirm_Password">Confirm Password</label>
						<input type="password" class="form-control" id="Confirm_Password" placeholder="Confirm Password" required>
						<div class="registrationFormAlert" style="color:#20c997;" id="CheckPasswordMatch"></div> 
					</div>
					<div class="form-group">
						<label>Contact No.</label>   
						<input type="number" class="form-control" id="contactNo" name="contactNo" placeholder="Enter Contact Number" required>
					</div>
					<div class="form-group">
						<label for="Address">Address </label>
                        <input type="text" id="address" name="address" placeholder="Enter your address" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="city">City </label>
                        <input type="text" id="city" name="city" placeholder="Enter city" class="form-control" required>
					</div>
					
					<div class="form-group">
						<label for="state">State </label>
                        <input type="text" id="state" name="state" placeholder="Enter state" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="pincode">Pin Code </label>
                        <input type="text" id="pincode" name="pincode" placeholder="Enter pincode" class="form-control" required>
					</div>
					
					<button type="submit" class="btn btn-outline-warning" id="btnvalidation" style="border-color:#f80">Submit</button>
					<!--<a href="index.php" style="color:#00bc8c">&nbsp;&nbsp;&nbsp; Now You Can Login.</a>-->
				</form>
			</div>
			<div class="col-lg-2">
				<a href="http://fighttogether.epizy.com/hospital/registerHospital.php">
					<button type="button" class="btn btn-success">Register Hospital</button>
				</a>
				<a href="http://fighttogether.epizy.com/medicalStore/registerMedicalStore.php">
					<button type="button" style="margin-top:10px" class="btn btn-success">Register Medical Store</button>
				</a>
			</div>
		</div>
	</div>
</body>
</html>