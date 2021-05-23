<?php
	include('../../header.php');
	require('../../connection.php');
?>
	
	<h3 style = "color: white">Medical Store Information</h3>
	<?php
		if(isset($_SESSION['username'])){
			?> 
			<a href="http://fighttogether.epizy.com/logout.php">
				<button type="button" class="btn btn-danger">Logout</button>
			</a>
		<?php	
		} 
		else{
			?>
			<a href="http://fighttogether.epizy.com/login.php">
				<button type="button" class="btn btn-success">Login/Register</button>
			</a>
		<?php
		}
	?>
	</nav>
</div>
<?php
	$id = $_GET['id'];
	$sql = "SELECT * FROM medicalStores where medicalStoreId = $id";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
?>
<h2 style="margin-top:10px"><center>Welcome to <?=$row['medicalStoreName']?>!
		<?php if($_SESSION['loginAs'] == 'medicalStore') { ?>
			<a href="/editMedicalStoreInfo.php?id=<?=$id?>" style="float:right">
				<button type="button" class="btnclass3">Edit details</button></a> <?php } ?>
	</center></h2>
<div class="container">
	<div class="timeClass">
		<?php 	//$updateTime = $row['updatedTime'];
				//$date = new DateTime($updateTime.' +00', new DateTimeZone('UCT')); 
				//$date->setTimezone(new DateTimeZone('Asia/Kolkata')); 
				//echo $date->format('Y-m-d H:i:s a');
				//$datte = new DateTime('$updateTime', new DateTimeZone('GMT')); 
				//$datte->setTimezone(new DateTimeZone('Asia/Kolkata')); 
				//$hi = $datte->format('Y-m-d H:i:s'); 
				//echo $hi;
		?>Updated Time : <?=$row['updatedTime']?></div>
	<div class="row">
		<div class="col-lg-6">
			<div class="card card-custom">
				<img src="<?=$row['medicalStoreProfile']?>" class="card-img-top" alt="Image will be here" style="height: auto; width: auto; margin:10px">
				<div class="card-body">
					<h5 class="card-title"><?=$row['medicalStoreName']?></h5>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="container" style="margin-top:25px">
				<h3>Remdesivir</h3>
				<i class="fa fa-medkit" style="font-size:30px">   <?=$row['availableRemdesivir']?></i>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<div class="container" style="margin-top:25px">
				<h3>Name</h3>
				<i class="fa fa-hospital-o" style="padding-right:10px; font-size:20px">  <?=$row['medicalStoreName']?></i><hr>
				<h3>Email</h3>
				<i class="fa fa-envelope"></i>  <?=$row['email']?></i><hr>
				<h3>Address</h3>
				<i class="fa fa-address-card">  <?=$row['address']?></i><hr>
				<h3>City</h3>
				<i class="fas fa-city"></i><p><?=$row['city']?></p><hr>
				<h3>State</h3>
				<i class="fa fa-state"></i><p><?=$row['state']?></p><hr>
				<h3>Pin-Code</h3>
				<i class="fa fa-map-pin">  <?=$row['pincode']?></i><hr>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card card-custom">
				<img src="<?=$row['medicalStoreLicense']?>" class="card-img-top" alt="Image will be here" style="height: 700px; width: auto; margin:10px">
				<div class="card-body">
					<h5 class="card-title">Hospital Unique ID : <?=$row['medicalStoreUid']?></h5>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
function formatTime($updatedatetime) {
   date_default_timezone_set('Asia/Kolkata'); //<--This will set the timezone to IST
   $str = strtotime($updatedatetime);
   return date('Y-m-d H:i:s', $str);
}

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