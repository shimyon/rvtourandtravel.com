<?php
	session_start();
	$_SESSION["login"] = "success";
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
	header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
	header ("Access-Control-Expose-Headers: Content-Length, X-JSON");
	header('location: lookup.php')
?>