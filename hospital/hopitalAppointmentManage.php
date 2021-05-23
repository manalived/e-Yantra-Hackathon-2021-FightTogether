<?php
	require("../connection.php");
	
	//Delete Functionality
	$id = isset($_GET['id']) ? $_GET['id'] : "";	
	if($id)
	{
		//Approve Functionality
		if(isset($_GET['approve'])){
			$sqlInsert = "insert approvedAppointments select * from pendingAppointments where id=$id";
			$conn->query($sqlInsert);
			$flag = false;
		}else	$flag = true;
		
		if($flag){
			session_start();
			$hospitalId = $_SESSION['id'];
			$sql1 = "SELECT * FROM hospitalDetails where hospitalId = $hospitalId";
			$result1 = $conn->query($sql1);
			$row1 = $result1->fetch_assoc();
			$availableBedWoV = $row1['availableBedWoV'];
			$availableBedWV = $row1['availableBedWV'];
			
			if($_GET['category'] == "availableBedWV")	$availableBedWV++;
			else	$availableBedWoV++;
			
			$update = "update hospitalDetails set availableBedWV = $availableBedWV, availableBedWoV = $availableBedWoV where hospitalId = $hospitalId";
			echo $update;
			$conn->query($update);
		}
		
		$sql_delete = "delete from pendingAppointments where id=$id";
		$conn->query($sql_delete);
		header('location:hospitalAppointments.php');
	}
?>