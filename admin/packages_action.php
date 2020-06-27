<?php
	header('Content-Type: application/json');

	include ($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'services'. DIRECTORY_SEPARATOR . 'packagesservice.php');

	$srv = new PackagesService;
	if ($_POST['action'] == "listing") { 
		$lisdata = $srv->getData();
		echo json_encode($lisdata);
	} 

	else if ($_POST['action'] == "insert") 
	{
		$PackagesId = $_POST['PackagesId'];
		$Duration = mysqli_real_escape_string($conn, $_POST['Duration']);
		$Date = mysqli_real_escape_string($conn, $_POST['Date']);
		$AirPort = mysqli_real_escape_string($conn, $_POST['AirPort']);
		$Extras = mysqli_real_escape_string($conn, $_POST['Extras']);
		$PriceperPerson = mysqli_real_escape_string($conn, $_POST['PriceperPerson']);
		$retunval = $srv->AddEditData($Duration,$Date, $AirPort, $Extras,$PriceperPerson, $PackagesId);
		echo json_encode($retunval);
	}

	else if ($_POST['action'] == 'Delete') 
	{
		$PackagesId = mysqli_real_escape_string($conn, $_POST['PackagesId']);
		$sql = "Update Packages set IsDelete = 1 Where PackagesId = $PackagesId";
		$return = new stdClass();
		$return->IsOk = $conn->query($sql);
		$return->Error = $conn->error;
		echo json_encode($return);

	} 
?>