<?php
	include('../header.php');
	require('../connection.php');
	$patientId = $_SESSION['id'];
	if(!($_SESSION['loginAs'] == 'Patient')){
		header('location:/login.php');
	}
?>	
	<h3 style = "color: white">Appointments</h3>
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
<div class="container pt-3">
	<div class="row">
		<div class="col-lg-12">
		    <table class="table table-hover"  style="box-shadow: 3px 1px 18px #ff8800 inset, -3px -1px 18px #00bc8c;">
               <thead>
                 <tr class="table-dark" style="color: #212121;">
                   <th scope="col">No</th>
                   <th scope="col">Patient Name</th>
                   <th scope="col">Patient Contact No.</th>
                   <th scope="col">Patient Address</th>
                   <th scope="col">Patient City</th>
                   <th scope="col">Appointment Date</th>
				   <th scope="col">Action</th>
                 </tr>
				</thead>
				<tbody>
				<?php
					$sql = "SELECT * FROM pendingAppointments where patientId = $patientId";
					$result = $conn->query($sql);
					$count=1;
					while($row = $result->fetch_assoc()){
						$_SESSION["hospitalIdForDelete"] = $row["hospitalId"];
						?>
						 <tr>
							<th scope="row"><?=$count++?></th>
							<td><?=$row['patientName']?></td>
							<td><?=$row['userContactNo']?></td>
							<td><?=$row['userAddress']?></td>
							<td><?=$row['userCity']?></td>
							<td><?php $updateTime = $row['appointmentDate']; echo date("Y-m-d",strtotime($updateTime));?></td>
							<td id="myBtn">
								<a class="btn btn-info" style="margin: 0px 5px;"
									href="../appointmentDetails.php?id=<?=$row['id']?>">Details
								</a>
								<a class="btn btn-danger" style="margin: 0px 5px;"
									href="userAppointmentManage.php?id=<?=$row['id']?>&category=<?=$row['category']?>">Delete
								</a>
							</td>
						 </tr>
						<?php 
					} 
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<hr><h1 style="text-align:center;">Completed</h1><hr>
<div class="container pt-3">
	<div class="row">
		<div class="col-lg-12">
		    <table class="table table-hover"  style="box-shadow: 3px 1px 18px #ff8800 inset, -3px -1px 18px #00bc8c;">
               <thead>
                 <tr class="table-dark" style="color: #212121;">
                   <th scope="col">No</th>
                   <th scope="col">Patient Name</th>
                   <th scope="col">Patient Contact No.</th>
                   <th scope="col">Patient Address</th>
                   <th scope="col">Patient City</th>
                   <th scope="col">Appointment Date</th>
				   <th scope="col">Action</th>
                 </tr>
				</thead>
				<tbody>
				<?php
					$sql = "SELECT * FROM approvedAppointments where patientId = $patientId";
					$result = $conn->query($sql);
					$count=1;
					while($row = $result->fetch_assoc()){
						?>
						 <tr>
							<th scope="row"><?=$count++?></th>
							<td><?=$row['patientName']?></td>
							<td><?=$row['userContactNo']?></td>
							<td><?=$row['userAddress']?></td>
							<td><?=$row['userCity']?></td>
							<td><?php $updateTime = $row['appointmentDate']; echo date("Y-m-d",strtotime($updateTime));?></td>
							<td>
								<a class="btn btn-info" style="margin: 0px 5px;"
									href="../appointmentDetails.php?id1=<?=$row['id']?>" >Details
								</a>
							</td>
						 </tr>
						<?php 
					} 
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>