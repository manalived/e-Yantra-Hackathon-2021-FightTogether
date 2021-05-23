<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Fight Together
	</title>
	
	<!--CSS-->
	<link href="http://fighttogether.epizy.com/assets/css/style.css" rel="stylesheet">
	<link href="http://fighttogether.epizy.com/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="http://fighttogether.epizy.com/assets/css/percentageCirlceAnimation.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!--Script-->
	<script src="http://fighttogether.epizy.com/assets/js/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="http://fighttogether.epizy.com/assets/js/bootstrap.min.js"></script>
	<script src="http://fighttogether.epizy.com/assets/js/progressbar.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
	<script src="assets/js/htmlToPdf.js"></script>
</head>
 
<body>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "270px";
  document.getElementById("main").style.marginLeft = "270px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}

</script>
<div id="mySidenav" class="sidenav">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	<ul class="navbar-nav mr-auto">
		<li class="nav-item active">
			<a class="nav-link" href="http://fighttogether.epizy.com/index.php">Home
				<span class="sr-only">(current)</span>
			</a>
		</li>
		<?php if($_SESSION['loginAs'] == 'Hospital') { ?>
			<li class="nav-item" style="border-top: 1px solid rgba(255,255,255,.1);">
				<a class="nav-link" href="http://fighttogether.epizy.com/hospital/editHospitalInfo.php">Edit Hospital Info</a>
			</li> 
		<?php } ?>
		<li class="nav-item dropdown" style="border-top: 1px solid rgba(255,255,255,.1);">
			<a class="nav-link dropdown-toggle show" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Get Remdesivir</a> 
			<div class="dropdown-menu show" data-bs-popper="none">
				<a class="dropdown-item" href="http://fighttogether.epizy.com/remdesivir/hospitals/hospitals.php">Hospital</a>
				<a class="dropdown-item" href="http://fighttogether.epizy.com/remdesivir/medicalStores/medicalStores.php">Medical Store</a>
			</div>
		</li>
		<li class="nav-item" style="border-top: 1px solid rgba(255,255,255,.1);">
			<a class="nav-link" href="<?php if($_SESSION['loginAs'] == 'Hospital'){echo 'http://fighttogether.epizy.com/hospital/registerHospital.php';} else if($_SESSION['loginAs'] == 'medicalStore') {echo 'http://fighttogether.epizy.com/medicalStore/registerMedicalStore.php';} else {echo 'http://fighttogether.epizy.com/patient/patientProfile.php';} ?>">Profile</a>
		</li>
		<li class="nav-item" style="border-top: 1px solid rgba(255,255,255,.1);">
			<a class="nav-link" href="<?php if($_SESSION['loginAs'] == 'Hospital'){echo 'http://fighttogether.epizy.com/hospital/hospitalAppointments.php';} else {echo 'http://fighttogether.epizy.com/patient/appointments.php';} ?>">Appointments</a>
		</li>
		<li class="nav-item" style="border-top: 1px solid rgba(255,255,255,.1);">
			<a class="nav-link" href="http://fighttogether.epizy.com/covidResources.php">Helpline</a> 
		</li>		
		<li class="nav-item" style="border-top: 1px solid rgba(255,255,255,.1);">
			<a class="nav-link" href="http://fighttogether.epizy.com/ourTeam.php">Our Team</a> 
		</li>
	</ul>
</div>

<div id="main">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<span style="font-size:30px;cursor:pointer; color:white" onclick="openNav()">&#9776;</span>