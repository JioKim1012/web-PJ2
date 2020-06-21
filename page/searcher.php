<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="../css/searcher.css" rel="stylesheet" type="text/css">
    <title>搜索页</title>
</head>
<body>
<div>
    <ul class="nav">
        <li>
            <a chref="#" class="cat">
                <img src="../img/cat.jpeg" width="54" height="54">
            </a>
        </li>
        <li>
            <a href="../index.php">首页</a>
        </li>
        <li>
            <a href="browse.php">浏览页</a>
        </li>
        <li>
            <a class="active" href="searcher.php">搜索页</a>
        </li>
        <?php
        session_start();
        if (empty($_SESSION['UID'])) {
            echo <<<EOF
        <div class="dropdown">    
        <a href="login.php" class="drop_btn">登录</a>
EOF;
        } else {
            echo '<div class="dropdown">';
            echo '<a href="" class="drop_btn">用户' . $_SESSION['user'] . '</a>';
            echo '<div class="dropdown_content">';
            echo '<a href="uploading.php">上传</a>';
            echo '<a href="mypicture.php">我的照片</a>';
            echo '<a href="mycollect.php">我的收藏</a>';
            echo '<a href="logout.php">登出</a>';
            echo '</div>';

        }
        ?>
    </ul>
    <div id="mySidenav" class="sidenav">
        <a href="../index.php" id="a">首页</a>
        <a href="browse.php" id="b">浏览页</a>
        <a href="searcher.php" id="c">搜索页</a>
        <a href="mypicture.php" id="d">我的照片</a>
    </div>
    <div class="search">
        <form action="../src/search.php" method="POST">
            <input type="radio" name="search" value="title">按标题搜索<br>
            <input class="t_text" type="text" name="by_title"><br>
            <input type="radio" name="search" value="description">按内容搜索<br>
            <input class="c_text" type="text" name="by_content"><br>
            <input type="submit" value="提交"class="submit_bt">
        </form>
    </div>
    <div class="result">




    </div>
    <div class="pagenum">
        <ul>
            <li><a href="#"> < </a></li>
            <li><a href="#"> 1 </a></li>
            <li><a href="#"> 2 </a></li>
            <li><a href="#"> 3 </a></li>
            <li><a href="#"> 4 </a></li>
            <li><a href="#"> 5 </a></li>
            <li><a href="#"> ... </a></li>
            <li><a href="#"> > </a></li>
        </ul>
    </div>
</div>
<div class="top">
    <a href="#">
        <img src="../img/top.png"width="106"height="100" >
    </a>
</div>

<?php

$servername ="localhost";
$db_username="user";
$db_password="123456";
$db_name="pj2";
$conn=new mysqli($servername,$db_username,$db_password,$db_name);

$result=null;
$sql=null;

if(!empty($_GET['title'])){
    $sql = "SELECT * FROM travelimage WHERE Title LIKE '%" .$_GET['title']."%'";
    $query = mysqli_query($conn,$sql);
    $result = $conn -> query($sql);
}else if(!empty($_GET['content'])){
    $sql = "SELECT * FROM travelimage WHERE Description LIKE '%" .$_GET['content']."%'";
    $query = mysqli_query($conn,$sql);
    $result = $conn -> query($sql);
}

?>

<div class="result">
    <div class="bottom">搜索结果</div>
<table>
    <?php
    if (isset($result))
    while($row = $result->fetch_assoc()){
        echo'<tr>';
        echo'<td>';
        echo'<img width="150px"height="150"src="../img/travel-images/large/' . $row['PATH'] . '">';
        echo'</td>';
        echo'<td>';
        echo'<p class="title">'.$row['Title'].'</p>';
        echo'<p class="content">'.$row['Description'].'</p>';
        echo'</td>';
        echo'</tr>';
    }
    ?>
</table>
</div>
<div class="pagenum">
    <ul>
        <li><a href="#"> < </a></li>
        <li><a href="#"> 1 </a></li>
        <li><a href="#"> 2 </a></li>
        <li><a href="#"> 3 </a></li>
        <li><a href="#"> 4 </a></li>
        <li><a href="#"> 5 </a></li>
        <li><a href="#"> ... </a></li>
        <li><a href="#"> > </a></li>
    </ul>
</div>

<div class="footer">
    <h3>备案号19302016002</h3>
</div>
</body>
</html>
