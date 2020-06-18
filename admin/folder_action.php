<?php
	header('Content-Type: application/json');

	include ($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'services'. DIRECTORY_SEPARATOR . 'folderservice.php');

	$foldersrv = new FolderService;
	if ($_POST['action'] == "listing") { 
		$lisdata = $foldersrv->getData();
		echo json_encode($lisdata);
	} else if ($_POST['action'] == "insert") {
		$isUpdate = ($_POST['FolderID'] != '');
		$FolderID = $_POST['FolderID'];
		$FolderName = mysqli_real_escape_string($conn, $_POST['FolderName']);
		$FolderPath = mysqli_real_escape_string($conn, $_POST['FolderPath']);
		$TourDate = mysqli_real_escape_string($conn, $_POST['TourDate']);
		$IsGallery = $_POST['IsGallery'];
		$retunval = $foldersrv->AddEditData($FolderName, $FolderPath, $TourDate, $IsGallery, $FolderID);
		echo json_encode($retunval);
		// if ($retunval->IsOk === TRUE) {
		//     if ($isUpdate) {	    	
		//     	echo "Record updated successfully";
		//     } else {
		//     	echo "New record created successfully";
		//     }
		// } else {
		//     echo "Error: " . $retunval->Sql;
		//     echo "Error: " . $retunval->Error;
		// }
	}
?>