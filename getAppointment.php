<?php
	include('header.php');
	require('connection.php');
	
	if(!($_SESSION['loginAs'] == 'Patient')){
		header('location:/login.php');
	}
	
	$id = $_GET['id'];
	$patientId = $_SESSION['id'];
	// if he/she has more than 1 appointments:
	$sqlCheck = "SELECT * FROM pendingAppointments where patientId = $patientId";
	$resultCheck = $conn->query($sqlCheck);
	$rowCount = mysqli_num_rows($resultCheck);
	if($rowCount == 1){
		header('Location:/index.php?status=limit');
	}
?>

	
	<h3 style="color: white">Get Appointment</h3>
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
<?php
	$sql = "SELECT * FROM hospitalDetails where hospitalId = $id";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	
	$sql2 = "SELECT * FROM hospitals where hospitalId = $id";
	$result2 = $conn->query($sql2);
	$row2 = $result2->fetch_assoc();
	
	$sql3 = "SELECT * FROM patients where patientId = $patientId";
	$result3 = $conn->query($sql3);
	$row3 = $result3->fetch_assoc();
?>
<!-- Take Appointment-->
<div class="container pt-3">
	<div class="row">
		<div class="col-lg-2"></div> 
		<div class="col-lg-8">
		    <center><h2 style="color:#00bc8c">Appointment</h2></center>
			<form action="appointmentManage.php" method="POST" style="margin-bottom:100px;box-shadow: 3px 1px 18px #ff8800 inset, -3px -1px 18px #00bc8c; margin: 20px; padding: 30px 40px;">
					<input type="hidden" name="hospitalId" value="<?=$id?>">
					<input type="hidden" name="patientId" value="<?=$patientId?>">
					<div class="form-group">
						<label>Patient Name</label>   
						<input type="text" class="form-control" id="patientName" value="<?=$patientName?>" name="patientName" placeholder="Enter Patient Name" required>
					</div>
					<div class="form-group">
						<label for="category">Category</label>
						<select class="form-control" id="category" name="category" required>
							<option>Select Category</option> 
							<option value="availableBedWoV" <?=$row["category"] == "availableBedWoV" ? "selected" : ""?>>Available Bed Without Ventilator</option>
							<option value="availableBedWV" <?=$row["category"] == "availableBedWV" ? "selected" : ""?>>Available Bed With Ventilator</option>
						</select>
					</div>
					<div class="form-group">
						<label>Registered First Name</label>   
						<input type="text" class="form-control" id="userFName" value="<?=$row3['firstName']?>" name="userFName" placeholder="Enter First Name" readonly>
					</div>
					<div class="form-group">
						<label>Registered Last Name</label>   
						<input type="text" class="form-control" id="userLName" value="<?=$row3['lastName']?>" name="userLName" placeholder="Enter Last Name" readonly>
					</div>
					<div class="form-group">
						<label for="email">Registered Username</label>
						<input type="email" class="form-control" id="userEmail" value="<?=$row3['email']?>" name="userEmail" aria-describedby="emailHelp" placeholder="Enter email" readonly>
						<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					</div>
					<div class="form-group">
						<label>Registered Contact No.</label>   
						<input type="number" class="form-control" id="userContactNo" value="<?=$row3['contactNo']?>" name="userContactNo" placeholder="Enter Contact Number" readonly>
					</div>
					<div class="form-group">
						<label for="Address">Registered Address</label>
                        <input type="text" id="userAddress" value="<?=$row3['address']?>" name="userAddress" placeholder="Enter your address" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label for="city"> Registered City</label>
                        <input type="text" id="userCity" value="<?=$row3['city']?>" name="userCity" placeholder="Enter city" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label for="pincode">Pin Code </label>
                        <input type="text" id="userPincode" value="<?=$row3['pincode']?>" name="userPincode" placeholder="Enter pincode" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Hospital Name</label>   
						<input type="text" class="form-control" id="hospitalName" value="<?=$row2['hospitalName']?>" name="hospitalName" placeholder="Enter Hospital Name" readonly>
					</div>
					<div class="form-group">
						<label for="email">Hospital Email</label>
						<input type="email" class="form-control" id="hospitalEmail" value="<?=$row2['email']?>" name="hospitalEmail" aria-describedby="emailHelp" placeholder="Enter email" readonly>
						<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					</div>
					<div class="form-group">
						<label for="Address">Hospital Address</label>
                        <input type="text" id="hospitalAddress" value="<?=$row2['address']?>" name="hospitalAddress" placeholder="Enter your address" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label for="city">Hospital City</label>
                        <input type="text" id="hospitalCity" value="<?=$row2['city']?>" name="hospitalCity" placeholder="Enter city" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label for="state">Hospital State</label>
                        <input type="text" id="hospitalState" value="<?=$row2['state']?>" name="hospitalState" placeholder="Enter state" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label for="pincode">Hospital Pin Code</label>
                        <input type="text" id="hospitalPincode" value="<?=$row2['pincode']?>" name="hospitalPincode" placeholder="Enter pincode" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label for="hospitalid">Hospital Unique Id </label>
                        <input type="text" id="hospitalUid" value="<?=$row2['hospitalUid']?>" name="hospitalUid" placeholder="Enter Hospital Unique id" class="form-control" readonly>
					</div>
					<button type="submit" class="btn btn-outline-warning" id="btnvalidation" style="border-color:#f80">Submit</button>
					<!--<a href="index.php" style="color:#00bc8c">&nbsp;&nbsp;&nbsp; Now You Can Login.</a>-->
			</form>
		</div>
		<div class="col-lg-2"></div>
	</div>
</div>