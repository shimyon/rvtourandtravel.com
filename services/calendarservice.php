<?php
	if (!isset($conn)) {
		$current_file_path = dirname(__FILE__);		
		$current_file_path = str_replace(DIRECTORY_SEPARATOR . 'services', '', $current_file_path);
		$connfilepath = ($current_file_path . DIRECTORY_SEPARATOR . 'library'. DIRECTORY_SEPARATOR . 'mysql'. DIRECTORY_SEPARATOR . 'connection.php');
		//$connfilepath = ($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'library'. DIRECTORY_SEPARATOR . 'mysql'. DIRECTORY_SEPARATOR . 'connection.php');


		include($connfilepath);
	}

	class CalendarService 
	{
	    public function __construct() {
	        //echo 'The class "' . __CLASS__ . '" was initiated!<br>'; 
	    } 

	    function getData() { 
	    	$sql = "SELECT Date,Subject,Message,CalendarId FROM Calendar c WHERE IFNULL(c.IsDelete,0)=0";
			$result = $GLOBALS['conn']->query($sql);
			$resultarr = array();
			if ($result->num_rows > 0) {
			   while($r = mysqli_fetch_assoc($result)) {
			     $resultarr[] = $r;
			   }
			}   
			return $resultarr;
		}

		function AddEditData($Date, $Subject, $Message, $CalendarId = null) {
			if (!empty($CalendarId)) {
				//, FolderPath = '$FolderPath'					
				$sql = "update Calendar set 
					Date = '$Date',
					Subject = '$Subject',
					Message = '$Message'
					Where CalendarId = $CalendarId";
				
			} else {
				
				$sql = "INSERT INTO Calendar (Date, Subject, Message) 
				VALUES ('$Date', '$Subject', '$Message')";
			}
			$returnval = $GLOBALS['conn']->query($sql);
			if ($returnval && empty($CalendarId)) {
				$CalendarId = $GLOBALS['conn']->insert_id;
				
			}

			$return = new stdClass();
			$return->IsOk = $returnval;
			$return->Error = $GLOBALS['conn']->error;
			//$return->Sql = $sql;
			$return->insert_id = $CalendarId;
			return $return;
		}

    }
?>