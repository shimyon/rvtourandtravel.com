<?php
	if (!isset($conn)) {
		$current_file_path = dirname(__FILE__);		
		$current_file_path = str_replace(DIRECTORY_SEPARATOR . 'services', '', $current_file_path);
		$connfilepath = ($current_file_path . DIRECTORY_SEPARATOR . 'library'. DIRECTORY_SEPARATOR . 'mysql'. DIRECTORY_SEPARATOR . 'connection.php');
		//$connfilepath = ($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'library'. DIRECTORY_SEPARATOR . 'mysql'. DIRECTORY_SEPARATOR . 'connection.php');


		include($connfilepath);
	}

	class FolderService 
	{
	    public function __construct() {
	        //echo 'The class "' . __CLASS__ . '" was initiated!<br>'; 
	    } 

	    function getData() { 
	    	$sql = "SELECT COUNT(fd.FolderID) TotalFolder, f.FolderID, f.FolderName, f.FolderPath, f.TourDate, ifnull(f.IsGallery,0) as IsGallery 
	    			FROM `Folder` f
					LEFT JOIN `FolderDocument` fd ON f.FolderID = fd.FolderId
					GROUP BY fd.FolderID
					ORDER BY f.folderId";
			$result = $GLOBALS['conn']->query($sql);
			$resultarr = array();
			if ($result->num_rows > 0) {
			   while($r = mysqli_fetch_assoc($result)) {
			     $resultarr[] = $r;
			   }
			}   
			return $resultarr;
		}

		function AddEditData($FolderName, $FolderPath, $TourDate, $IsGallery, $FolderID = null) {
			if (!empty($FolderID)) {
				//, FolderPath = '$FolderPath'					
				$sql = "update Folder set 
					FolderName = '$FolderName',
					TourDate = '$TourDate',
					IsGallery = $IsGallery
					Where FolderID = $FolderID";
				$this->CreateFolder($FolderPath);
			} else {
				//$sql = "INSERT INTO Folder (FolderName, FolderPath) VALUES ('$FolderName', '$FolderPath')";
				$FolderPath = uniqid();
				$sql = "INSERT INTO Folder (FolderName, FolderPath, TourDate, IsGallery) 
				VALUES ('$FolderName', '$FolderPath', '$TourDate', $IsGallery)";
			}
			$returnval = $GLOBALS['conn']->query($sql);
			if ($returnval && empty($FolderID)) {
				$FolderID = $GLOBALS['conn']->insert_id;
				$this->CreateFolderGallery($FolderPath);
			}

			$return = new stdClass();
			$return->IsOk = $returnval;
			$return->Error = $GLOBALS['conn']->error;
			//$return->Sql = $sql;
			$return->insert_id = $FolderID;
			return $return;
		}

		function CreateFolder($folderpath) {
			$current_file_path = dirname(__FILE__);
			$current_file_path = str_replace(DIRECTORY_SEPARATOR . 'services', '', $current_file_path);			
			$newfolder = ($current_file_path . DIRECTORY_SEPARATOR . 'uploads'. DIRECTORY_SEPARATOR . $folderpath);
			// echo $newfolder;
			if (!file_exists($newfolder)) {
				mkdir($newfolder);
			}
			// mkdir($newfolder);
		}

		function CreateFolderGallery($folderpath) {
			$current_file_path = dirname(__FILE__);
			$current_file_path = str_replace(DIRECTORY_SEPARATOR . 'services', '', $current_file_path);
			$newfolder = ($current_file_path . DIRECTORY_SEPARATOR . 'uploads'. DIRECTORY_SEPARATOR . 'gallery');
			// echo $newfolder;
			if (!file_exists($newfolder)) {
				mkdir($newfolder);
			}
			$newfolder = ($newfolder . DIRECTORY_SEPARATOR . $folderpath);
			if (!file_exists($newfolder)) {
				mkdir($newfolder);
			}
		}

    }
?>