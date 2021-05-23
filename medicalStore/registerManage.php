<?php
	require("../connection.php");
	
	$medicalStoreId = isset($_POST['medicalStoreId']) ? $_POST['medicalStoreId'] : "";
	$medicalStoreName 	= $_POST['medicalStoreName'];
	$email 				= $_POST['email'];
	$password 			= $_POST['password'];
	$contactNo 			= $_POST['contactNo'];
	$address 			= $_POST['address'];
	$city 				= $_POST['city'];
	$state 				= $_POST['state'];
	$pincode 			= $_POST['pincode'];
	$medicalStoreUid 	= $_POST['medicalStoreUid'];
	$availableRemdesivir 	= $_POST['availableRemdesivir'];
	
	
	$filepath = $_FILES['medicalStoreLicense']['tmp_name'];
	$filename = $_FILES['medicalStoreLicense']['name'];
	$remotepath = "licenses/".$filename;
	$fullpath = $_SERVER['HTTP_ORIGIN']."/medicalStore/".$remotepath;	
	move_uploaded_file($filepath, $remotepath);
	
	$filepath2 = $_FILES['medicalStoreProfile']['tmp_name'];
	$filename2 = $_FILES['medicalStoreProfile']['name'];
	$remotepath2 = "profile/".$filename2;
	$fullpath2 = $_SERVER['HTTP_ORIGIN']."/medicalStore/".$remotepath2;	
	move_uploaded_file($filepath2, $remotepath2);

	if($medicalStoreId != ""){
		$sqlEdit =  "update medicalStores set medicalStoreName = '$medicalStoreName', email = '$email', password = '$password',contactNo = '$contactNo', 
		address = '$address', city = '$city', state = '$state', pincode = $pincode, medicalStoreLicense = '$fullpath', medicalStoreProfile = '$fullpath2', medicalStoreUid = '$medicalStoreUid', availableRemdesivir = $availableRemdesivir where medicalStoreId = $medicalStoreId";
		$conn -> query($sqlEdit);
		// edit functionality
	}else{
		// insert functionality
		$sql = "insert into medicalStores (medicalStoreName, email, password, address, contactNo, city, state, pincode, medicalStoreLicense, medicalStoreProfile, medicalStoreUid, availableRemdesivir) values ('$medicalStoreName', '$email', '$password', '$address', '$contactNo', '$city', '$state', $pincode, '$fullpath', '$fullpath2', '$medicalStoreUid', '$availableRemdesivir')";
		//echo $sql;
		$conn -> query($sql);
	}
	header('location:../index.php');
?>