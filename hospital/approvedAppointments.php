<?php
	// shows all the approved appointments
	include('../header.php');
	require('../connection.php');
	$hospitalId = $_SESSION['id'];
	if(!($_SESSION['loginAs'] == 'Hospital')){
		header('location:/login.php');
	}	
	// search functionality
	if(isset($_POST['valueToSearch'])){
		$valueToSearch = $_POST['valueToSearch'];
		// search in all table columns using concat mysql function
		$query = "SELECT * FROM approvedAppointments WHERE hospitalId = $hospitalId AND CONCAT(`patientName`, `userContactNo`, `userAddress`, `userCity`, `appointmentDate`) LIKE '%".$valueToSearch."%'";
		$result = $conn->query($query);	
	}else{
		$sql = "SELECT * FROM approvedAppointments where hospitalId = $hospitalId";
		$result = $conn->query($sql);
	}
?>	
	<h3 style = "color: white">Approved Appointments</h3>
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
	<form action="approvedAppointments.php" method="post">
		<div class="searchForm">
			<input type="text" name="valueToSearch" class="inputForm" placeholder="Search hospitals">
			<input type="submit" name="search" class="btnclass " value="Search"> 
		</div>
	</form>
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
							<td id="myBtn">
								<a class="btn btn-info" style="margin: 0px 5px;"
									href="../appointmentDetails.php?id1=<?=$row['id']?>">Details
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
<script> 

	$(document).ready(function(){
		myFunction();
	});
	
	function myFunction() { 
	document.getElementById("myBtn").disabled = true; 
	setTimeout(function(){ 
		document.getElementById("myBtn").disabled = false; 
	}, 
	5000); 
} 
</script>

</body>
</html>