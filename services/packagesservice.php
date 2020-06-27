<?php
	if (!isset($conn)) {
		$current_file_path = dirname(__FILE__);		
		$current_file_path = str_replace(DIRECTORY_SEPARATOR . 'services', '', $current_file_path);
		$connfilepath = ($current_file_path . DIRECTORY_SEPARATOR . 'library'. DIRECTORY_SEPARATOR . 'mysql'. DIRECTORY_SEPARATOR . 'connection.php');
		//$connfilepath = ($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'library'. DIRECTORY_SEPARATOR . 'mysql'. DIRECTORY_SEPARATOR . 'connection.php');


		include($connfilepath);
	}

	class PackagesService 
	{
	    public function __construct() {
	        //echo 'The class "' . __CLASS__ . '" was initiated!<br>'; 
	    } 

	    function getData() { 
	    	$sql = "SELECT Duration,Date,AirPort,Extras,PricePerPerson,PackagesId FROM Packages p WHERE IFNULL(p.IsDelete,0)=0";
			$result = $GLOBALS['conn']->query($sql);
			$resultarr = array();
			if ($result->num_rows > 0) {
			   while($r = mysqli_fetch_assoc($result)) {
			     $resultarr[] = $r;
			   }
			}   
			return $resultarr;
		}

		function AddEditData($Duration,$Date,$AirPort,$Extras,$PricePerPerson,$PackagesId = null) {
			if (!empty($PackagesId)) {
				//, FolderPath = '$FolderPath'					
				$sql = "update Packages set 
					Duration = '$Duration',
					Date = '$Date',
					AirPort = '$AirPort',
					Extras = '$Extras'
					PricePerPerson = '$PricePerPerson'
					Where PackagesId = $PackagesId";
				
			} else {
				
				$sql = "INSERT INTO Calendar (Duration,Date,AirPort,Extras,PricePerPerson) 
				VALUES ('$Duration','$Date','$AirPort', '$Extras', '$PricePerPerson')";
			}
			$returnval = $GLOBALS['conn']->query($sql);
			if ($returnval && empty($PackagesId)) {
				$PackagesId = $GLOBALS['conn']->insert_id;
				
			}

			$return = new stdClass();
			$return->IsOk = $returnval;
			$return->Error = $GLOBALS['conn']->error;
			//$return->Sql = $sql;
			$return->insert_id = $PackagesId;
			return $return;
		}

    }
?>