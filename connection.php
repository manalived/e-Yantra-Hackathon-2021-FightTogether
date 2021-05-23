<?php
	$servername = "sql108.epizy.com";
	$username = "epiz_28559871";
	$password = "hnLN0bXL375jYL";
	$database = "epiz_28559871_fightTogether";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $database);

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
?>