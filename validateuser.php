<?php
	require("connection.php");
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$loginAs  = $_POST['loginAs'];

	if($loginAs == 'Patient'){
		$sql = "select * from patients where email = '$username' AND password = '$password'";
		$result = $conn->query($sql);
	}
	
	if($loginAs == 'Hospital'){
		$sql = "select * from hospitals where email = '$username' AND password = '$password'";
		$result = $conn->query($sql);
	}
	
	if($loginAs == 'medicalStore'){
		$sql = "select * from medicalStores where email = '$username' AND password = '$password'";
		$result = $conn->query($sql);
	}
	
	if(mysqli_num_rows($result) > 0){
		// user exsist
		$data = $result -> fetch_assoc();
		$_SESSION['username'] = $username;
		$_SESSION['id'] = $loginAs == 'Patient' ? $data['patientId'] : ($loginAs == 'Hospital' ? $data['hospitalId'] : $data['medicalStoreId']);	
		$_SESSION['loginAs']  = $loginAs;
		
		header("location: index.php");
	}else{
		// user doesn't exsist
		header("location: login.php");
	}

?>