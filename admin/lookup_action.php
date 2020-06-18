<?php
//include("../library/accessheader.php");
include ($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'services'. DIRECTORY_SEPARATOR . 'lookupservice.php');

// foreach ($_POST as $key => $value) {
//     echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
// }
if ($_POST['action'] == "insert") {
	$isUpdate = ($_POST['LookUpId'] != '');
	$Class = mysqli_real_escape_string($conn, $_POST['class']);
	$Value = mysqli_real_escape_string($conn, $_POST['value']);
	$GroupName = mysqli_real_escape_string($conn, $_POST['GroupName']);
	
	if ($isUpdate) {		
		$LookUpId = mysqli_real_escape_string($conn, $_POST['LookUpId']);
		$sql = "update LookUp set 
			Class = '$Class', 
			Value = '$Value', 
			GroupName = '$GroupName'
			Where LookUpId = $LookUpId";
	} else {
		$sql = "INSERT INTO LookUp (Class, Value, GroupName, CreatedOn) VALUES ('$Class', '$Value', '$GroupName', Now())";
	}

	if ($conn->query($sql) === TRUE) {
	    if ($isUpdate) {	    	
	    	echo "Record updated successfully";
	    } else {
	    	echo "New record created successfully";
	    }
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

if ($_POST['action'] == "listing") {
	echo json_encode($GLOBALS['LookUps']);
}
?>