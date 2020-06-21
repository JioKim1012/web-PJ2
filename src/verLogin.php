<?php
session_start();
header("content-type:text/html;charset=utf8");

$servername = "localhost";
$db_username = "user";
$db_password = "123456";
$db_name = "pj2";
$conn = new mysqli($servername, $db_username, $db_password, $db_name);

$name = $_POST['name'];
$pass = $_POST['password'];

$sql = "SELECT UID,UserName,Pass From traveluser WHERE (UserName='$name')AND (Pass='$pass')";
$query = mysqli_query($conn, $sql);
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['UID'] = $row['UID'];
    header('location:../index.php');
} else {
    exit('登录失败！ <a href="../page/login.php">重新登录</a>');
}
?>