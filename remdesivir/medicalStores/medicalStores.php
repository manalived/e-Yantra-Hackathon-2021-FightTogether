<?php
	include('../../header.php');
	require('../../connection.php');
	// search functionality
	if(isset($_POST['valueToSearch'])){
		$valueToSearch = $_POST['valueToSearch'];
		// search in all table columns using concat mysql function
		$query = "SELECT * FROM medicalStores WHERE CONCAT(`medicalStoreName`, `contactNo`, `city`, `state`, `pincode`) LIKE '%".$valueToSearch."%'";
		$result = $conn->query($query);	
	}
	else {
		if($_SESSION['loginAs'] == 'medicalStore'){
			$medicalStoreId2 = $_SESSION['id'];
			$query = "SELECT * FROM medicalStores where medicalStoreId != $medicalStoreId2 order by medicalStoreName asc";
		}
		else	$query = "SELECT * FROM medicalStores order by medicalStoreName asc";
		$result = $conn->query($query);
	}	
	// receive total number of beds without ventilator and oxygen
	$sql = "SELECT SUM(availableRemdesivir) FROM medicalStores";
	$tempResult = ($conn->query($sql))->fetch_assoc();
	$availableRemdesivir = $tempResult["SUM(availableRemdesivir)"];
?>
	<h3 style = "color: white">Medical Stores List</h3>
	<?php
		if(isset($_SESSION['username']))
		{
			?>
			<a href="../../logout.php">
				<button type="button" class="btn btn-danger">Logout</button>
			</a>
		<?php	
		} 
		else{
			?>
			<a href="../../login.php">
				<button type="button" class="btn btn-success">Login/Register</button>
			</a>
		<?php
		}
	?>
	</nav>
</div>
<div class="container pt-3">
	<div class="row" style="margin-left: 0px">
		<h4 style="text-align: center">Total Available Remdesivir : <?=$availableRemdesivir?></h4>
	</div>
	<form action="/" method="post">
		<div class="searchForm">
			<input type="text" name="valueToSearch" class="inputForm" placeholder="Search hospitals">
			<input type="submit" name="search" class="btnclass " value="Search"> 
		</div>
	</form>	
	<?php
		if($_SESSION['loginAs'] == 'medicalStore'){
			$count=1;
			$medicalStoreId1 = $_SESSION['id'];
			$sql3 = "SELECT * FROM medicalStores where medicalStoreId = $medicalStoreId1";
			$result3 = $conn->query($sql3);
			$row3 = $result3->fetch_assoc();
			?>	
				<div class="row">
					<div class="col-lg-12">
						<table id="myTable" class="table table-hover"  style="box-shadow: 3px 1px 18px #ff8800 inset, -3px -1px 18px #00bc8c; padding: 3px 4px;">
						   <thead>
							 <tr class="table-dark" style="color: #212121;">
							   <th scope="col">No </th>
							   <th scope="col">Store name </th>
							   <th scope="col">Contact No.</th>
							   <th scope="col">City </th>
							   <th scope="col">State </th>
							   <th scope="col">Pincode</th>					  
							   <th scope="col">Available Remdesivir</th>
							   <th scope="col">Action</th>
							 </tr>
							</thead>
							<tbody>
								<tr>
								<td scope="row"><?=$count++?></td>
								<td><?=$row3['medicalStoreName']?></td>
								<td><?=$row3['contactNo']?></td>
								<td><?=$row3['city']?></td>
								<td><?=$row3['state']?></td>
								<td><?=$row3['pincode']?></td>
								<td><center><?php if($row3['availableRemdesivir'] > 0) { ?>
										<i class="fa fa-check-circle" style="color: green; font-size: 35px"></i>
									<?php } else { ?>
										<i class="fa fa-times" style="color: red; font-size: 35px">
									<?php } ?></center>
								</td>
								<td><a class="btn btn-warning" style="margin: 0px 5px;"  
										href="medicalStoreInfo.php?id=<?=$row3['medicalStoreId']?>" >Details
									</a> 
								</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>	
			<?php
		}
	?>	
	<div class="row">
		<div class="col-lg-12">
		    <table id="myTable" class="table table-hover"  style="box-shadow: 3px 1px 18px #ff8800 inset, -3px -1px 18px #00bc8c; padding: 3px 4px;">
               <thead>
                 <tr class="table-dark" style="color: #212121;">
                   <th scope="col">No </th>
                   <th onclick="sortTable(1)" scope="col">Hospital &#9650 &#9660 </th>
                   <th scope="col">Contact No.</th>
                   <th onclick="sortTable(2)" scope="col">City &#9650 &#9660 </th>
                   <th onclick="sortTable(3)" scope="col">State &#9650 &#9660 </th>
                   <th scope="col">Pincode</th>
                   <th onclick="sortTable(4)" scope="col">Available Remdesivir &#9650 &#9660 </th>
				   <th scope="col">Action</th>
                 </tr>
				</thead>
				<tbody>
				<?php
					//$sql = "SELECT * FROM hospitals order by hospitalName asc";
					//$result = $conn->query($sql);
					$count=1;
					while($row = $result->fetch_assoc()){
						?> 
						 <tr>
							<td scope="row"><?=$count++?></td>
							<td><?=$row['medicalStoreName']?></td>
							<td><?=$row['contactNo']?></td>
							<td><?=$row['city']?></td>
							<td><?=$row['state']?></td>
							<td><?=$row['pincode']?></td>
							<td><?php if($row['availableRemdesivir'] > 0) { ?>
								<center><i class="fa fa-check-circle" style="color: green; font-size: 35px"></i></center>
							<?php } else { ?>
								<center><i class="fa fa-times" style="color: red; font-size: 35px"></center>
							<?php } ?>
						</td>
							<td><a class="btn btn-warning" style="margin: 0px 5px;" 
									href="medicalStoreInfo.php?id=<?=$row['medicalStoreId']?>" >Details
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
// function for column sorting
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}

// functions for progress bar
$(function() {
  var current_progress = 0;
  var interval = setInterval(function() {
      current_progress += 1;
      $("#dynamic1")
      .css("width", current_progress + "%")
      .attr("aria-valuenow", current_progress)
      .text(current_progress + "%");
      if (current_progress >= <?php echo ($availableBedWV / $totalBedWV) * 100 ?>)
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
      if (current_progress >= <?php echo ($availableOxygenKits / $totalOxygenKits) * 100 ?>)
          clearInterval(interval);
  });
});
</script>
</body>
</html>