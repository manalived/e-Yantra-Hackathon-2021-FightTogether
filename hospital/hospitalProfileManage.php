<?php
	require("../connection.php");
	
	$id = isset($_POST['id']) ? $_POST['id'] : "";
	echo $id;
	$hospitalId 			= $_POST['hospitalId'];
	$totalBedWoV 			= $_POST['totalBedWoV'];
	$availableBedWoV 		= $_POST['availableBedWoV'];
	$totalBedWV 			= $_POST['totalBedWV'];
	$availableBedWV 		= $_POST['availableBedWV'];
	$totalOxygenKits 		= $_POST['totalOxygenKits'];
	$availableOxygenKits 	= $_POST['availableOxygenKits'];
	$availableRemdesivir 	= $_POST['availableRemdesivir'];
	$aPositive 				= $_POST['aPositive'];
	$aNegative 				= $_POST['aNegative'];
	$bPositive 				= $_POST['bPositive'];
	$bNegative 				= $_POST['bNegative'];
	$abPositive 			= $_POST['abPositive'];
	$abNegative 			= $_POST['abNegative'];
	$oPositive 				= $_POST['oPositive'];
	$oNegative 				= $_POST['oNegative'];
	

	if($id != ""){
		// edit functionality
		$sqlEdit = "update hospitalDetails set totalBedWoV = $totalBedWoV, availableBedWoV = $availableBedWoV, totalBedWV = $totalBedWV,
			availableBedWV = $availableBedWV, totalOxygenKits = $totalOxygenKits, availableOxygenKits = $availableOxygenKits, availableRemdesivir = $availableRemdesivir,
			aPositive = $aPositive, aNegative = $aNegative, bPositive = $bPositive, bNegative = $bNegative, abPositive = $abPositive, 
			abNegative = $abNegative, oPositive = $oPositive, oNegative = $oNegative where hospitalId = $hospitalId "; 
		//echo $sqlEdit;
		$conn -> query($sqlEdit);
		
	}else{
		echo "insert";
		// insert functionality
		$sql = "insert into hospitalDetails (hospitalId, totalBedWoV, availableBedWoV, totalBedWV, availableBedWV, totalOxygenKits, availableOxygenKits, availableRemdesivir, aPositive, aNegative, bPositive, bNegative, abPositive, abNegative, oPositive, oNegative) 
		values 
		($hospitalId, $totalBedWoV, $availableBedWoV, $totalBedWV, $availableBedWV, $totalOxygenKits, $availableOxygenKits, $availableRemdesivir, $aPositive, $aNegative, $bPositive, $bNegative, $abPositive, $abNegative, $oPositive, $oNegative)";
		
		//echo $sql;
		$conn -> query($sql);
	}
	header('location: ../index.php');
?>