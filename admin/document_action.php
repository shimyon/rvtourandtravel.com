<?php
include("../library/mysql/connection.php");
if ($_POST['action'] == 'Viewer') {
	$sql = "select DocumentId, OriginalName, FolderName, FileName from Document where IFnull(Active, 1) = 1";
	$result = $conn->query($sql);
	$rows = array();
	if ($result->num_rows > 0) {
	   while($r = mysqli_fetch_assoc($result)) {
	     $rows[] = $r;
	   }
	}
	echo json_encode($rows);
} else if ($_POST['action'] == 'Delete') {
	$DocumentId = mysqli_real_escape_string($conn, $_POST['DocumentId']);
	$sql = "Update Document set Active = 0 Where DocumentId = $DocumentId";
	if ($conn->query($sql) === TRUE) {
    	echo "Deleted successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
} else if ($_POST['action'] == 'ImageView') {
	$FolderPath = mysqli_real_escape_string($conn, $_POST['FolderPath']);
	$sql = "SELECT CONCAT(d.FolderName,'\\\\',d.FileName) as src
		FROM Folder f
		JOIN FolderDocument fd ON fd.FolderID = f.FolderID
		JOIN Document d ON fd.DocumentID = d.DocumentId
		WHERE f.FolderPath='$FolderPath'";
	$result = $conn->query($sql);
	$rows = array();
	if ($result->num_rows > 0) {
	   while($r = mysqli_fetch_assoc($result)) {
	     $rows[] = $r;
	   }
	}
	echo json_encode($rows);
}

$conn->close();

?>