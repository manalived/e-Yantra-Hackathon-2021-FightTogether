<?php 
	include("../header.php");
	include("../connection.php");
	$hospitalId = $_SESSION['id'];	
	$sql = "select * from hospitalDetails where hospitalId = $hospitalId";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
?>
	<script>
	   $(function () {
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
	  // validation for available values <= total values
		function check() {
			var totalBedWoV = parseInt($("#totalBedWoV").val());
			var availableBedWoV = parseInt($("#availableBedWoV").val());  
			if (availableBedWoV > totalBedWoV){
				$("#CheckAvailableBedWoV").html("Available beds can't be greater than total beds");
				document.getElementById("availableBedWoV").value = "";
			}
			else	$("#CheckAvailableBedWoV").html("");
			
			var totalBedWV = parseInt($("#totalBedWV").val());
			var availableBedWV = parseInt($("#availableBedWV").val());       
			if (availableBedWV > totalBedWV){
				$("#CheckAvailableBedWV").html("Available beds can't be greater than total beds");
				document.getElementById("availableBedWV").value = "";
			}
			else	$("#CheckAvailableBedWV").html("");
			
			var totalOxygenKits = parseInt($("#totalOxygenKits").val());
			var availableOxygenKits = parseInt($("#availableOxygenKits").val());       
			if (availableOxygenKits > totalOxygenKits){
				$("#CheckAvailableOxygenKits").html("Available kits can't be greater than total kits");
				document.getElementById("availableOxygenKits").value = "";
			}
			else	$("#CheckAvailableOxygenKits").html("");
		}
		$(document).ready(function () {
		   $("#availableBedWoV").keyup(check);
		   $("#availableBedWV").keyup(check);
		   $("#availableOxygenKits").keyup(check);
		});
	</script>

		<a class="navbar-brand" href="index.php">Hospital Details</a>
		<a href="../index.php">
			<button type="button" class="btn btn-warning">Home</button>
		</a>
    </nav>
	<div class="container pt-3">
	  <div class="row">
	       <div class="col-lg-2"></div>
			<div class="col-lg-8">
		     <center><h2 style="color:#00bc8c"> Hospital Profile</h2></center>
			 <form action="hospitalProfileManage.php" method="POST" style="margin-bottom:100px;box-shadow: 3px 1px 18px #ff8800 inset, -3px -1px 18px #00bc8c; margin: 20px; padding: 30px 40px;">
					<input type="hidden" name="id" value="<?=$row['id']?>">
					<input type="hidden" id="hospitalId" name="hospitalId" value="<?=$hospitalId?>" >
					<div class="form-group">
						<label>Total Beds without Ventlator</label>   
						<input type="number" class="form-control" id="totalBedWoV" value="<?=$row['totalBedWoV']?>" name="totalBedWoV" placeholder="Enter Total beds without ventilator" required>
					</div>
					<div class="form-group">
						<label>Available Beds without Ventlator</label>   
						<input type="number" class="form-control" id="availableBedWoV" value="<?=$row['availableBedWoV']?>" name="availableBedWoV" placeholder="Enter Available beds without ventilator" required>
						<div class="registrationFormAlert" style="color:#20c997;" id="CheckAvailableBedWoV"></div> 
					</div>
					<div class="form-group">
						<label>Total Beds with Ventlator</label>   
						<input type="number" class="form-control" id="totalBedWV" value="<?=$row['totalBedWV']?>" name="totalBedWV" placeholder="Enter Total beds with ventilator" required>
					</div>
					<div class="form-group">
						<label>Available Beds with Ventlator</label>   
						<input type="number" class="form-control" id="availableBedWV" value="<?=$row['availableBedWV']?>" name="availableBedWV" placeholder="Enter Available beds with ventilator" required>
						<div class="registrationFormAlert" style="color:#20c997;" id="CheckAvailableBedWV"></div>
					</div>
					<div class="form-group">
						<label>Total Oxygen Kits</label>   
						<input type="number" class="form-control" id="totalOxygenKits" value="<?=$row['totalOxygenKits']?>" name="totalOxygenKits" placeholder="Enter Total Oxygen Kits" required>
					</div>
					<div class="form-group">
						<label>Available Oxygen Kits</label>   
						<input type="number" class="form-control" id="availableOxygenKits" value="<?=$row['availableOxygenKits']?>" name="availableOxygenKits" placeholder="Enter Available Oxygen Kits" required>
						<div class="registrationFormAlert" style="color:#20c997;" id="CheckAvailableOxygenKits"></div>
					</div>
					<div class="form-group">
						<label>Available Remdesivir Injection</label>   
						<input type="number" class="form-control" id="availableRemdesivir" value="<?=$row['availableRemdesivir']?>" name="availableRemdesivir" placeholder="Enter Available Remdesivir Injection" required>
					</div>
					<div class="form-group">
						<label>A +ve Blood group</label>   
						<input type="number" class="form-control" id="aPositive" value="<?=$row['aPositive']?>" name="aPositive" placeholder="Enter Available A +ve Blood group" required>
					</div>
		
					<div class="form-group">
						<label>A -ve Blood group</label>   
						<input type="number" class="form-control" id="aNegative" value="<?=$row['aNegative']?>" name="aNegative" placeholder="Enter Available A -ve Blood group" required>
					</div>
					<div class="form-group">
						<label>B +ve Blood group</label>   
						<input type="number" class="form-control" id="bPositive" value="<?=$row['bPositive']?>" name="bPositive" placeholder="Enter Available B +ve Blood group" required>
					</div>
					<div class="form-group">
						<label>B -ve Blood group</label>   
						<input type="number" class="form-control" id="bNegative" value="<?=$row['bNegative']?>" name="bNegative" placeholder="Enter Available B -ve Blood group" required>
					</div>
					<div class="form-group">
						<label>AB +ve Blood group</label>   
						<input type="number" class="form-control" id="abPositive" value="<?=$row['abPositive']?>" name="abPositive" placeholder="Enter Available AB +ve Blood group" required>
					</div>
					<div class="form-group">
						<label>AB -ve Blood group</label>   
						<input type="number" class="form-control" id="abNegative" value="<?=$row['abNegative']?>" name="abNegative" placeholder="Enter Available AB -ve Blood group" required>
					</div>
					<div class="form-group">
						<label>O +ve Blood group</label>   
						<input type="number" class="form-control" id="oPositive" value="<?=$row['oPositive']?>" name="oPositive" placeholder="Enter Available O +ve Blood group" required>
					</div>
					<div class="form-group">
						<label>O -ve Blood group</label>   
						<input type="number" class="form-control" id="oNegative" value="<?=$row['oNegative']?>" name="oNegative" placeholder="Enter Available O -ve Blood group" required>
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