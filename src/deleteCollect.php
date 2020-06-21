<?php
header("content-type:text/html;charset=utf8");
session_start();
$ImageID  = $_GET["ImageID"];

$servername ="localhost";
$db_username="user";
$db_password="123456";
$db_name="pj2";
$conn=new mysqli($servername,$db_username,$db_password,$db_name);

$UID = $_SESSION['UID'];

$sql = "DELETE FROM `travelimagefavor`  WHERE (UID= '".$UID."') AND (ImageID = '".$ImageID."')";
$query = mysqli_query($conn,$sql);
$result = $conn->query($sql);

header('location:../page/mycollect.php')
?>