<?php
	if (!isset($conn)) {
		$current_file_path = dirname(__FILE__);		
		$current_file_path = str_replace(DIRECTORY_SEPARATOR . 'services', '', $current_file_path);
		$connfilepath = ($current_file_path . DIRECTORY_SEPARATOR . 'library'. DIRECTORY_SEPARATOR . 'mysql'. DIRECTORY_SEPARATOR . 'connection.php');
		//$connfilepath = ($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'library'. DIRECTORY_SEPARATOR . 'mysql'. DIRECTORY_SEPARATOR . 'connection.php');


		include($connfilepath);
	}

	$sql = "select LookUpId, class, value, GroupName from LookUp";
	$result = $conn->query($sql);
	$GLOBALS['LookUps'] = array();
	if ($result->num_rows > 0) {
	   while($r = mysqli_fetch_assoc($result)) {
	     $GLOBALS['LookUps'][] = $r;
	   }
	}

	function GetLookupValue($classname, $group = null) {
	 	foreach ($GLOBALS['LookUps'] as $key => $val) {
	 		if (isset($group)) {	 		
		       	if ($val['class'] === $classname && $val['GroupName'] === $group) {
		           return $val['value'];
		       	}	
	 		} else {
		       	if ($val['class'] === $classname) {
		           return $val['value'];
		       	}	 			
	 		}
	   	}
		return null;
	}


	// echo json_encode($LookUps);
	// echo GetLookupValue('TourType');
?>