<?php
session_start();
header("content-type:text/html;charset=utf8");

$servername ="localhost";
$db_username="user";
$db_password="123456";
$db_name="pj2";
$conn=new mysqli($servername,$db_username,$db_password,$db_name);

$re_name=$_POST['r-name'];
$re_email=$_POST['r-email'];
$re_pass=$_POST['r-password'];
$se_pass=$_POST['re-password'];

$sql="SELECT UserName,Email From traveluser WHERE (UserName='$re_name')OR (Email='$re_email')";
$query=mysqli_query($conn,$sql);
$result = $conn->query($sql);
if ($result->num_rows > 0){
    exit('注册失败！用户名或邮箱已存在！<a href = "../page/register.php">点此返回</a>');
}else if($re_pass != $se_pass){
    exit('注册失败！两次密码不相同<a href = "../page/register.php">点此返回</a>');
}else{
    $sql = "INSERT INTO traveluser (Email, UserName, Pass)
    VALUES ('$re_email', '$re_name', '$re_pass')";

    if ($conn->query($sql) === TRUE) {
        echo '注册成功！<a href = "../page/login.php">点此登录</a>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
