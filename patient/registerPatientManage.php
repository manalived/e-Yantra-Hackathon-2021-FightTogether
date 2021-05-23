<?php
	require("../connection.php");
	
	$patientId = isset($_POST['patientId']) ? $_POST['patientId'] : "";
	$firstName 	= $_POST['firstName'];
	$lastName 	= $_POST['lastName'];
	$email 		= $_POST['email'];
	$password 	= $_POST['password'];
	$contactNo 	= $_POST['contactNo'];
	$address 	= $_POST['address'];
	$city 		= $_POST['city'];
	$state 		= $_POST['state'];
	$pincode 	= $_POST['pincode'];
	

	

	if($patientId != ""){
		// edit functionality 
		$sqlEdit = "update patients set firstName = '$firstName', lastName = '$lastName', contactNo = '$contactNo', email = '$email', password = '$password', address = '$address', city = '$city', state = '$state', pincode = '$pincode' where patientId = $patientId";
		$conn->query($sqlEdit);
		header("location: patientProfile.php");
	}else{
		// insert functionality
		$sql = "insert into patients (firstName,lastName, contactNo, email, password, address, city, state, pincode) values ('$firstName','$lastName', '$contactNo', '$email', '$password', '$address', '$city', '$state', $pincode)";
		//echo $sql;
		$conn -> query($sql);
		header("location: /login.php");
	}
?>