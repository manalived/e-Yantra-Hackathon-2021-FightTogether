<?php
	include('header.php');
	require('connection.php');
	//For Pending Appointment
	if($_GET['id']){
		$id = $_GET['id'];
		$sql = "select * from  pendingAppointments where id = $id";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
	}
	//For Approved Appointment
	if($_GET['id1']){
		$id = $_GET['id1'];
		$sql = "select * from  approvedAppointments where id = $id";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
	}
?>
<h3 style = "color: white">Appointment Details</h3>
	<?php
		if(isset($_SESSION['username']))
		{
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
<!--Details of Appointment-->
<div class="container pt-3">
	<div class="col-lg-12">
		<button onclick="generatePdf()" style="float: right" class="btn btn-success">Download Appointment PDF</button>
	</div>
</div>
<div id="mainClass" class="container pt-3">	
	<div class="row">
		<div class="col-lg-6">
			<p>Appointment Date : <?php $updateTime = $row['appointmentDate']; echo date("Y-m-d",strtotime($updateTime));?></p>
		</div>
		<div class="col-lg-6">
			<p style="float: right">Appointment Number : <?=$row['appointmentNo']?></p>
		</div>
	</div>
	<table border="2" class="table table-hover" style="border:2px solid #ff8800; box-shadow: 3px 1px 18px #ff8800 inset, -3px -1px 18px #00bc8c;">
		<thead>
			<tr class="table-dark">
				<th width="140px" scope="col" style="color: #212121; text-align:center">Category</th>
				<th style="color: #212121; text-align:center" scope="col">Details</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Patient Name</td>
				<td><?=$row['patientName']?></td>
			</tr>
			<tr>
				<td>Category</td>
				<td><?=$row['category']?></td>
			</tr>
			<tr>
				<td>Registered Name</td>
				<td><?php echo $row['userFName'].' '.$row['userLName']?></td>
			</tr>
			<tr>
				<td>User's Email</td>
				<td><?=$row['userEmail']?></td>
			</tr>
			<tr>
				<td>User's Contact No.</td>
				<td><?=$row['userContactNo']?></td>
			</tr>
			<tr>
				<td>User's Address</td>
				<td><?=$row['userAddress']?></td>
			</tr>
			<tr>
				<td>User's City</td>
				<td><?=$row['userCity']?></td>
			</tr>
			<tr>
				<td>User's Pincode</td>
				<td><?=$row['userPincode']?></td>
			</tr>
			<tr>
				<td>Hospital Name</td>
				<td><?=$row['hospitalName']?></td>
			</tr>
			<tr>
				<td>Hospital Email</td>
				<td><?=$row['hospitalEmail']?></td>
			</tr>
			<tr>
				<td>Hospital Address</td>
				<td><?=$row['hospitalAddress']?></td>
			</tr>
			<tr>
				<td>Hospital City</td>
				<td><?=$row['hospitalCity']?></td>
			</tr>
			<tr>
				<td>Hospital State</td>
				<td><?=$row['hospitalState']?></td>
			</tr>
			<tr>
				<td>Hospital Pincode</td>
				<td><?=$row['hospitalPincode']?></td>
			</tr>
			<tr>
				<td>Hospital Unique ID</td>
				<td><?=$row['hospitalUid']?></td>
			</tr>
		  </tbody>
	</table>
</div>
</body>
</html>