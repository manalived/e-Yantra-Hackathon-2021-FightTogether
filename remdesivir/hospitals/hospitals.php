<?php
	include('../../header.php');
	require('../../connection.php');	
	// search functionality
	if(isset($_POST['valueToSearch'])){
		$valueToSearch = $_POST['valueToSearch'];
		// search in all table columns using concat mysql function
		$query = "SELECT * FROM hospitals WHERE CONCAT(`hospitalName`, `contactNo`, `city`, `state`, `pincode`) LIKE '%".$valueToSearch."%'";
		$result = $conn->query($query);	
	}
	else {
		
		/*if($_SESSION['loginAs'] == 'Hospital'){
			$hospitalId2 = $_SESSION['id'];
			$query = "SELECT * FROM hospitals where hospitalId != $hospitalId2 order by hospitalName asc";
			$result = $conn->query($query);
		}
		else{*/
			$query2 = "SELECT * FROM hospitals order by hospitalName asc";
			$result = $conn->query($query2);
		
		
	}	
	// receive total number of beds without ventilator and oxygen
	$sql = "SELECT SUM(availableRemdesivir) FROM hospitalDetails";
	$tempResult = ($conn->query($sql))->fetch_assoc();
	$availableRemdesivir = $tempResult["SUM(availableRemdesivir)"];
?>
	<h3 style = "color: white">Hospital List</h3>
	<?php
		if(isset($_SESSION['username']))
		{
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
		if($_SESSION['loginAs'] == 'Hospital'){
			$count=1;
			$hospitalId1 = $_SESSION['id'];
			$sql3 = "SELECT * FROM hospitals where hospitalId = $hospitalId1";
			$result3 = $conn->query($sql3);
			$row3 = $result3->fetch_assoc();
				$sql4 = "SELECT * FROM hospitalDetails where hospitalId = $hospitalId1 AND availableRemdesivir > 0";
				$result4 = $conn->query($sql4);
				$row4 = $result4->fetch_assoc(); 
			
			if(mysqli_num_rows($result4) > 0){
				?>
				<div class="row">
					<div class="col-lg-12">
						<table id="myTable" class="table table-hover"  style="box-shadow: 3px 1px 18px #ff8800 inset, -3px -1px 18px #00bc8c; padding: 3px 4px;">
						   <thead>
							 <tr class="table-dark" style="color: #212121;">
							   <th scope="col">No </th>
							   <th scope="col">Hospital </th>
							   <th scope="col">Contact No.</th>
							   <th scope="col">City </th>
							   <th scope="col">State </th>
							   <th scope="col">Pincode</th>
							   <th scope="col">Available Bed without Ventilator</th>
							   <th scope="col">Available Remdesivir</th>
							   <th scope="col">Action</th>
							 </tr>
							</thead>
							<tbody>
								<tr>
								<td scope="row"><?=$count++?></td>
								<td><?=$row3['hospitalName']?></td>
								<td><?=$row3['contactNo']?></td>
								<td><?=$row3['city']?></td>
								<td><?=$row3['state']?></td>
								<td><?=$row3['pincode']?></td>
								<td><center><?php if($row4['availableBedWoV'] > 0) { ?>
										<i class="fa fa-check-circle" style="color: green; font-size: 35px"></i>
									<?php } else { ?>
										<i class="fa fa-times" style="color: red; font-size: 35px"></i>
									<?php } ?></center>
								</td>
								<td><center><?php if($row4['availableRemdesivir'] > 0) { ?>
										<i class="fa fa-check-circle" style="color: green; font-size: 35px"></i>
									<?php } else { ?>
										<i class="fa fa-times" style="color: red; font-size: 35px"></i>
									<?php } ?></center>
								</td>
								<td><a class="btn btn-warning" style="margin: 0px 5px;"  
										href="../../hospitalInfo.php?id=<?=$row3['hospitalId']?>" >Details
									</a> 
								</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>	
			<?php
			}
		}
	?>
	<div class="row">
		<div class="col-lg-12">
		    <table id="myTable1" class="table table-hover"  style="box-shadow: 3px 1px 18px #ff8800 inset, -3px -1px 18px #00bc8c; padding: 3px 4px;">
               <thead>
                 <tr class="table-dark" style="color: #212121;">
                   <th scope="col">No </th>
                   <th onclick="sortTable(0)" scope="col">Hospital &#9650 &#9660 </th>
                   <th scope="col">Contact No.</th>
                   <th onclick="sortTable(1)" scope="col">City &#9650 &#9660 </th>
                   <th onclick="sortTable(2)" scope="col">State &#9650 &#9660 </th>
                   <th scope="col">Pincode</th>
                   <th onclick="sortTable(3)" scope="col">Available Bed without Ventilator &#9650 &#9660 </th>
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
						$hospitalId = $row['hospitalId'];
						$sql2 = "SELECT * FROM hospitalDetails where hospitalId = $hospitalId AND availableRemdesivir > 0";
						$result2 = $conn->query($sql2);
						$row2 = $result2->fetch_assoc(); 
						if(mysqli_num_rows($result2) > 0){
							?> 
							 <tr>
								<td scope="row"><?=$count++?></td>
								<td><?=$row['hospitalName']?></td>
								<td><?=$row['contactNo']?></td>
								<td><?=$row['city']?></td>
								<td><?=$row['state']?></td>
								<td><?=$row['pincode']?></td>
								<td><?php if($row2['availableBedWoV'] > 0) { ?>
										<center><i class="fa fa-check-circle" style="color: green; font-size: 35px"></i></center>
									<?php } else { ?>
										<center><i class="fa fa-times" style="color: red; font-size: 35px"></i></center>
									<?php } ?>
								</td>
								<td><?php if($row2['availableRemdesivir'] > 0) { ?>
									<center><i class="fa fa-check-circle" style="color: green; font-size: 35px"></i></center>
								<?php } else { ?>
									<center><i class="fa fa-times" style="color: red; font-size: 35px"></i></center>
								<?php } ?>
							</td>
								<td><a class="btn btn-warning" style="margin: 0px 5px;" 
										href="../../hospitalInfo.php?id=<?=$row['hospitalId']?>" >Details
									</a> 
								</td>
							 </tr>
							<?php 
						}
					}
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
// function for a column sorting
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable1");
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