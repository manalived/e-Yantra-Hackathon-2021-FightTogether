<?php
	include('header.php');
	require('connection.php');
?>
<script>
	function convertDateTimes($dateTime) {
    $fromTz1 = date_default_timezone_set('UTC');
    $dateTime1 = new DateTime($dateTime, $fromTz1);
    $toTz1 = date_default_timezone_set('Asia/Kolkata');
    $dateTime1 = date_default_timezone_set($toTz1);
    return $dateTime1;
}
</script>	
	<h3 style = "color: white">Hospital Information</h3>
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
	$id = $_GET['id'];
	$sql = "SELECT * FROM hospitalDetails where hospitalId = $id";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	
	$sql2 = "SELECT * FROM hospitals where hospitalId = $id";
	$result2 = $conn->query($sql2);
	$row2 = $result2->fetch_assoc();
?>
<h2 style="margin-top:10px"><center>Welcome to <?=$row2['hospitalName']?>!
		<?php if($_SESSION['loginAs'] == 'Patient') { ?>
			<a href="getAppointment.php?id=<?=$id?>" style="float:right">
				<button type="button" class="btnclass3">Get Appointment</button></a> <?php } ?>
		<?php if($_SESSION['loginAs'] == 'Hospital') { ?>
			<a href="hospital/editHospitalInfo.php?id=<?=$id?>" style="float:right">
				<button type="button" class="btnclass3">Edit details</button></a> <?php } ?>
	</center></h2>
<div class="container">
	<div class="timeClass">
		<?php 	
			$updateTime = $row['updatedTime'];
			$fromTz = 'EDT';
			$toTz = 'Asia/Kolkata';
			echo '
				<script type="text/javascript"> convertDateTimes("2020-10-05"); </script>
			'
		?>Updated Time : <?=$row['updatedTime']?>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="card card-custom">
				<img src="<?=$row2['hospitalProfile']?>" class="card-img-top" alt="Image will be here" style="height: auto; width: auto; margin:10px">
				<div class="card-body">
					<h5 class="card-title"><?=$row2['hospitalName']?></h5>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="container" style="margin-top:25px">
				<h3>Beds without ventilator</h3>
				<span class="skill">Total: 
					<i class="fa fa-bed"><span data-toggle="counter-up"><?=$row['totalBedWoV']?></span></i>
					<i class="val">Available: <i class="fa fa-bed"><?=$row['availableBedWoV']?></i></i>
				</span>
				<div class="progress">
					<div id="dynamic" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%; color: white;">
						<span id="current-progress"></span>
					</div>
				</div><hr>
				<h3>Beds with ventilator</h3>
				<span class="skill">Total: 
					<i class="fa fa-bed"><span data-toggle="counter-up"><?=$row['totalBedWV']?></span></i>
					<i class="val">Available: <i class="fa fa-bed"><?=$row['availableBedWV']?></i></i>
				</span>
				<div class="progress">
					<div id="dynamic2" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%; color: white;">
						<span id="current-progress"></span>
					</div>
				</div><hr>
				<h3>Oxygen Kits</h3>
				<span class="skill">Total: 
					<i class="fa fa-oxygen"><span data-toggle="counter-up"><?=$row['totalOxygenKits']?></span></i>
					<i class="val">Available: <i class="fa fa-bed"><?=$row['availableOxygenKits']?></i></i>
				</span>
				<div class="progress">
					<div id="dynamic3" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%; color: white;">
						<span id="current-progress"></span>
					</div>
				</div><hr>
				<h3>Remdesivir</h3>
				<h4><i class="fa fa-medkit">  <?=$row['availableRemdesivir']?></i></h4>
				<hr>
				<div class="row">
				<table id="myTable" border="1" class="table table-hover">
					<thead>
						<tr class="table-dark" style="color: #212121;">
							<th style="padding:.75rem; text-align:center" colspan=4 scope="col">Available Blood Bank </th>
						</tr>
					</thead>
					<tbody>
						<tr style="background-color: #d3d3d3; color: #212121;">
							<th style="padding:.75rem" scope="col">Blood </th>
							<th style="padding:.75rem" scope="col">Available</th>
							<th style="padding:.75rem" scope="col">Blood</th>
							<th style="padding:.75rem" scope="col">Available</th>
						</tr>
						<tr>
							<th style="padding:.75rem" scope="col">A+ </th>
							<th style="padding:.75rem" scope="col"><?=$row['aPositive']?></th>
							<th style="padding:.75rem" scope="col">A-</th>
							<th style="padding:.75rem" scope="col"><?=$row['aNegative']?></th>
						</tr>
						<tr>
							<th style="padding:.75rem" scope="col">B+ </th>
							<th style="padding:.75rem" scope="col"><?=$row['bPositive']?> </th>
							<th style="padding:.75rem" scope="col">B- </th>
							<th style="padding:.75rem" scope="col"><?=$row['bNegative']?> </th>
						</tr>
						<tr>
							<th style="padding:.75rem" scope="col">O+ </th>
							<th style="padding:.75rem" scope="col"><?=$row['oPositive']?></th>
							<th style="padding:.75rem" scope="col">O-</th>
							<th style="padding:.75rem" scope="col"><?=$row['oNegative']?></th>
						</tr>
						<tr>
							<th style="padding:.75rem" scope="col">AB+ </th>
							<th style="padding:.75rem" scope="col"><?=$row['abPositive']?></th>
							<th style="padding:.75rem" scope="col">AB-</th>
							<th style="padding:.75rem" scope="col"><?=$row['abNegative']?></th>
						</tr>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<div class="container" style="margin-top:25px">
				<h3>Name</h3>
				<i class="fa fa-hospital-o" style="padding-right:10px; font-size:20px">  <?=$row2['hospitalName']?></i><hr>
				<h3>Email</h3>
				<i class="fa fa-envelope" style="padding-right:10px; font-size:20px">  <?=$row2['email']?></i><hr>
				<h3>Address</h3>
				<i class="fa fa-address-card" style="padding-right:10px; font-size:20px">  <?=$row2['address']?></i><hr>
				<h3>City</h3>
				<i class="fas fa-city" style="padding-right:10px; font-size:20px">  <?=$row2['city']?></i><hr>
				<h3>State</h3>
				<i class="fa fa-state" style="padding-right:10px; font-size:20px">  <?=$row2['state']?></i><hr>
				<h3>Pin-Code</h3>
				<i class="fa fa-map-pin" style="padding-right:10px; font-size:20px">  <?=$row2['pincode']?></i><hr>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card card-custom">
				<img src="<?=$row2['license']?>" class="card-img-top" alt="Image will be here" style="height: 700px; width: auto; margin:10px">
				<div class="card-body">
					<h5 class="card-title">Hospital Unique ID : <?=$row2['hospitalUid']?></h5>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(function() {
  var current_progress = 0;
  var interval = setInterval(function() {
      current_progress += 1;
      $("#dynamic")
      .css("width", current_progress + "%")
      .attr("aria-valuenow", current_progress)
      .text(current_progress + "%");
      if (current_progress >= <?php echo ($row['availableBedWoV'] / $row['totalBedWoV']) * 100 ?>)
          clearInterval(interval);
  });
});
$(function() {
  var current_progress = 0;
  var interval = setInterval(function() {
      current_progress += 1;
      $("#dynamic2")
      .css("width", current_progress + "%")
      .attr("aria-valuenow", current_progress)
      .text(current_progress + "%");
      if (current_progress >= <?php echo ($row['availableBedWV'] / $row['totalBedWV']) * 100 ?>)
          clearInterval(interval);
  });
});
$(function() {
  var current_progress = 0;
  var interval = setInterval(function() {
      current_progress += 1;
      $("#dynamic3")
      .css("width", current_progress + "%")
      .attr("aria-valuenow", current_progress)
      .text(current_progress + "%");
      if (current_progress >= <?php echo ($row['availableOxygenKits'] / $row['totalOxygenKits']) * 100 ?>)
          clearInterval(interval);
  });
});
</script>
</body>
</html>