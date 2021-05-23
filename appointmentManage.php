<?php
	require("connection.php");
	
	//$id = isset($_POST['id']) ? $_POST['id'] : "";
	$patientId = $_POST['patientId'];
	$hospitalId = $_POST['hospitalId'];
	
	$patientName 		= $_POST['patientName'];
	$category 			= $_POST['category'];
	$userFName 			= $_POST['userFName'];
	$userLName 			= $_POST['userLName'];
	$userEmail 			= $_POST['userEmail'];
	$userContactNo 		= $_POST['userContactNo'];
	$userAddress 		= $_POST['userAddress'];
	$userCity 			= $_POST['userCity'];
	$userPincode 		= $_POST['userPincode'];
	$hospitalName 		= $_POST['hospitalName'];
	$hospitalEmail 		= $_POST['hospitalEmail'];
	$hospitalAddress 	= $_POST['hospitalAddress'];
	$hospitalCity 		= $_POST['hospitalCity'];
	$hospitalState 		= $_POST['hospitalState'];
	$hospitalPincode 	= $_POST['hospitalPincode'];
	$hospitalUid 		= $_POST['hospitalUid'];
	
	
	$sql1 = "SELECT * FROM hospitalDetails where hospitalId = $hospitalId";
	$result1 = $conn->query($sql1);
	$row1 = $result1->fetch_assoc();
	$availableBedWoV = $row1['availableBedWoV'];
	$availableBedWV = $row1['availableBedWV'];

	
	// checking if beds are availableBedWoV
	if($category == "availableBedWoV" && $availableBedWoV > 0){
		$availableBedWoVFlag = true;
	}
	else	$availableBedWoVFlag = false;
	
	if($category == "availableBedWV" && $availableBedWV > 0){
		$availableBedWVFlag = true;
	}
	else	$availableBedWVFlag = false;
	
	$status = 0;
	if($patientId == ""){
		
		// edit functionality
	}else if($availableBedWoVFlag || $availableBedWVFlag){
		// insert functionality
		$status = 1;
		
		//decrementing beds
		if($availableBedWVFlag)	$availableBedWV--;
		else	$availableBedWoV--; 	
		
		$update = "update hospitalDetails set availableBedWV = $availableBedWV, availableBedWoV = $availableBedWoV where hospitalId = $hospitalId";
		$conn->query($update);
		
		$sql = "insert into pendingAppointments 
		(patientId, hospitalId, category, patientName, userFName, userLName, userEmail, userContactNo, userAddress, userCity, userPincode, 
		hospitalName, hospitalEmail, hospitalAddress, hospitalCity, hospitalState, hospitalPincode, hospitalUid)
		values 
		($patientId, $hospitalId, '$category', '$patientName', '$userFName', '$userLName', '$userEmail', '$userContactNo', '$userAddress','$userCity', '$userPincode', 
		'$hospitalName', '$hospitalEmail', '$hospitalAddress', '$hospitalCity', '$hospitalState','$hospitalPincode', '$hospitalUid')";
		//echo $sql;
		$conn -> query($sql);
		
		$sqlSelect = "select * from pendingAppointments order by id desc";
		$row = ($conn->query($sqlSelect))->fetch_assoc();
		$id = $row['id'];
		$appointmentNo = $hospitalUid.'-'.$id;
		
		$sqlUpdate = "update pendingAppointments set appointmentNo = '$appointmentNo' where id =$id";
		$conn -> query($sqlUpdate);
	}
	if($status == 0)	header('location:/index.php?status=0');
	else	header('location:/index.php?status=1');
?>