<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="../css/mycollect.css" rel="stylesheet" type="text/css">
    <title>我的照片</title>
</head>
<body>
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
        <a href="searcher.php">搜索页</a>
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
<?php
$servername = "localhost";
$db_username = "user";
$db_password = "123456";
$db_name = "pj2";
$conn = new mysqli($servername, $db_username, $db_password, $db_name);

$sql = "SELECT * From travelimage WHERE UID = '" . $_SESSION['UID'] . "'";
$query = mysqli_query($conn, $sql);
$result = $conn->query($sql);

?>

<div class="mypic">
    <div class="bottom">我的收藏</div>
    <table>
        <?php
        //输出收藏结果
        while ($row = $result->fetch_assoc()) {
            $sqlImage = "SELECT * From travelimage WHERE ImageID = '" . $row['ImageID'] . "'";
            $queryImage = mysqli_query($conn, $sqlImage);
            $resultImage = $conn->query($sqlImage);
            $rowImage = $resultImage->fetch_assoc();
            echo '<tr>';
            echo '<td>';
            echo '<a href="details.php?ImageID=' . $rowImage['ImageID'] . '"><img width="150px"height="150"src="../img/travel-images/large/' . $rowImage['PATH'] . '"></a>';
            echo '</td>';
            echo '<td>';
            echo '<p class="title">' . $rowImage['Title'] . '</p>';
            echo '<p class="content">' . $rowImage['Description'] . '</p>';
            echo '<form action="#">';
            echo '<input type="button" class="button" value="修改" onclick="del()">';
            echo '<input type="button" class="button" value="删除" onclick="del()">';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>


<ul class="pagenum">
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
        <img src="../img/top.png" width="106" height="100">
    </a>
</div>
<div class="footer">
    <h3>备案号19302016002</h3>
</div>
</body>
</html>

