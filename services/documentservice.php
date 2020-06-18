<?php
	if (!isset($conn)) {
		$current_file_path = dirname(__FILE__);		
		$current_file_path = str_replace(DIRECTORY_SEPARATOR . 'services', '', $current_file_path);
		$connfilepath = ($current_file_path . DIRECTORY_SEPARATOR . 'library'. DIRECTORY_SEPARATOR . 'mysql'. DIRECTORY_SEPARATOR . 'connection.php');
		//$connfilepath = ($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'library'. DIRECTORY_SEPARATOR . 'mysql'. DIRECTORY_SEPARATOR . 'connection.php');
		include($connfilepath);
	}

	class DocumentService 
	{
	    public function __construct() {
	        //echo 'The class "' . __CLASS__ . '" was initiated!<br>'; 
	    } 

	    function getData() {
	    	$sql = "SELECT f.FolderName AS FName, d.*
					FROM `Folder` f
					JOIN `FolderDocument` fd ON f.FolderID = fd.FolderId
					JOIN `Document` d ON d.DocumentId = fd.documentid
					WHERE ifnull(f.IsGallery,0) = 1";
			$result = $GLOBALS['conn']->query($sql);
			$resultarr = array();
			if ($result->num_rows > 0) {
			   while($r = mysqli_fetch_assoc($result)) {
			     $resultarr[] = $r;
			   }
			}   
			return $resultarr;
		}

    }
?>