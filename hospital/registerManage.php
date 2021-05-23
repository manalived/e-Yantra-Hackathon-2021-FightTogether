<?php
	require("../connection.php");
	
	$hospitalId = isset($_POST['hospitalId']) ? $_POST['hospitalId'] : "";
	$hospitalName 	= $_POST['hospitalName'];
	$email 			= $_POST['email'];
	$password 		= $_POST['password'];
	$contactNo 		= $_POST['contactNo'];
	$address 		= $_POST['address'];
	$city 			= $_POST['city'];
	$state 			= $_POST['state'];
	$pincode 		= $_POST['pincode'];
	$hospitalUid 	= $_POST['hospitalUid'];
	
	
	$filepath = $_FILES['license']['tmp_name'];
	$filename = $_FILES['license']['name'];
	$remotepath = "licenses/".$filename;
	$fullpath = $_SERVER['HTTP_ORIGIN']."/hospital/".$remotepath;	
	move_uploaded_file($filepath, $remotepath);
	

	$filepath2 = $_FILES['hospitalProfile']['tmp_name'];
	$filename2 = $_FILES['hospitalProfile']['name'];
	$remotepath2 = "profile/".$filename2;
	$fullpath2 = $_SERVER['HTTP_ORIGIN']."/hospital/".$remotepath2;	
	move_uploaded_file($filepath2, $remotepath2);

	if($hospitalId != ""){
		$sqlEdit =  "update hospitals set hospitalName = '$hospitalName', email = '$email', password = '$password', contactNo = '$contactNo', 
		address = '$address', city = '$city', state = '$state', pincode = $pincode, license = '$fullpath', hospitalProfile = '$fullpath2', hospitalUid = '$hospitalUid'";
		$conn -> query($sqlEdit);
		// edit functionality
	}else{
		// insert functionality
		$sql = "insert into hospitals (hospitalName, email, password, address, contactNo, city, state, pincode, license, hospitalProfile, hospitalUid) values ('$hospitalName', '$email', '$password', '$address', '$contactNo', '$city', '$state', $pincode, '$fullpath', '$fullpath2', '$hospitalUid')";
		//echo $sql;
		$conn -> query($sql);
	}
	header('location:../index.php');
?>