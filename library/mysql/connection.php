<?php
$servername = "50.62.209.9";
$username = "shimyon";
$password = "Sh1my0n*90";
$dbname = "rvtourandtravel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$GLOBALS['conn'] = $conn;
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>