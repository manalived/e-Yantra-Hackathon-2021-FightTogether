<?php 
	include("../../header.php");
	include("../../connection.php");
	$medicalStoreId = $_SESSION['id'];	
	$sql = "select * from medicalStores where medicalStoreId = $medicalStoreId";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
?>
		<a class="navbar-brand" href="index.php">Medical Store Details</a>
		<a href="../../index.php">
			<button type="button" class="btn btn-warning">Home</button>
		</a>
    </nav>
	<div class="container pt-3">
	  <div class="row">
	       <div class="col-lg-2"></div>
			<div class="col-lg-8">
		     <center><h2 style="color:#00bc8c"> Medical Store Profile</h2></center>
			 <form action="medicalStoreInfoManage.php" method="POST" style="margin-bottom:100px;box-shadow: 3px 1px 18px #ff8800 inset, -3px -1px 18px #00bc8c; margin: 20px; padding: 30px 40px;">
					<input type="hidden" name="medicalStoreId" value="<?=$row['medicalStoreId']?>">
					<div class="form-group">
						<label for="availableRemdesivir">Available Remdesivir Dose</label>   
						<input type="number" class="form-control" id="availableRemdesivir" value="<?=$row['availableRemdesivir']?>" name="availableRemdesivir" placeholder="Enter Available Remdesivir" required>
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