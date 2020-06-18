<?php
	header('Content-Type: application/json');

	include ($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'services'. DIRECTORY_SEPARATOR . 'calendarservice.php');

	$srv = new CalendarService;
	if ($_POST['action'] == "listing") { 
		$lisdata = $srv->getData();
		echo json_encode($lisdata);
	} 

	else if ($_POST['action'] == "insert") 
	{
		$CalendarId = $_POST['CalendarId'];
		$Date = mysqli_real_escape_string($conn, $_POST['Date']);
		$Subject = mysqli_real_escape_string($conn, $_POST['Subject']);
		$Message = mysqli_real_escape_string($conn, $_POST['Message']);
		$retunval = $srv->AddEditData($Date, $Subject, $Message, $CalendarId);
		echo json_encode($retunval);
	}

	else if ($_POST['action'] == 'Delete') 
	{
		$CalendarId = mysqli_real_escape_string($conn, $_POST['CalendarId']);
		$sql = "Update Calendar set IsDelete = 1 Where CalendarId = $CalendarId";
		$return = new stdClass();
		$return->IsOk = $conn->query($sql);
		$return->Error = $conn->error;
		echo json_encode($return);

	} 
?>