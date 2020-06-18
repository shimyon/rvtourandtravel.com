
<!DOCTYPE html>
<html>
<?php include('../support/head.php'); ?>
<body>
<?php include('navigation.php'); ?>
<div class="container">

<?php
include("../library/mysql/connection.php");

//$target_dir = "uploads/";
//echo __DIR__; 
$FolderName = "uploads";
$target_dir = "G:/PleskVhosts/emoiss.com/rvtourandtravel.com/uploads/";
$current_file_path = dirname(__FILE__);     
$current_file_path = str_replace(DIRECTORY_SEPARATOR . 'admin', '', $current_file_path);
$target_dir = ($current_file_path . DIRECTORY_SEPARATOR . $FolderName);

//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//echo uniqid() . "." . strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION));
//exit();
$OriginalName = basename($_FILES["fileToUpload"]["name"]);
$FileName = uniqid() . "." . strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION));
$target_file = $target_dir . $FileName;
$FileType = $_FILES["fileToUpload"]["type"];
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$uploadOk = 1;
//echo "$target_file <br>";
// check if image file is a actual image or fake image
if(isset($_post["submit"])) {
    $check = getimagesize($_files["filetoupload"]["tmp_name"]);
    if($check !== false) {
        echo "file is an image - " . $check["mime"] . ".";
        $uploadok = 1;
    } else {
        echo "file is not an image.";
        $uploadok = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. $imageFileType not allowed";
    die();
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$OriginalName = mysqli_real_escape_string($conn, $OriginalName);
$FileName = mysqli_real_escape_string($conn, $FileName);
$FileType = mysqli_real_escape_string($conn, $FileType);
$target_file = mysqli_real_escape_string($conn, $target_file);
$FolderName = mysqli_real_escape_string($conn, $FolderName);

$sql = "INSERT INTO Document (OriginalName, FileName, FileType, FullPath, FolderName)
VALUES ('$OriginalName', '$FileName', '$FileType', '$target_file', '$FolderName')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
// 
?>
</div>
</body>
<?php include('../support/scripts.php'); ?>
</html> 
