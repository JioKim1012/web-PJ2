<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="css/home.css" rel="stylesheet" type="text/css">
    <title>首页</title>
</head>
<body>
<ul>
    <li>
        <a chref="#" class="cat">
            <img src="img/cat.jpeg" width="54" height="54">
        </a>
    </li>
    <li>
        <a class="active" href="index.php">首页</a>
    </li>
    <li>
        <a href="page/browse.php">浏览页</a>
    </li>
    <li>
        <a href="page/searcher.php">搜索页</a>
    </li>
    <?php
    session_start();
    if(empty($_SESSION['UID'])){
        echo <<<EOF
        <div class="dropdown">    
        <a href="page/login.php" class="dropbtn">登录</a>
EOF;

    }else{
        echo '<div class="dropdown">';
        echo '<a href="" class="dropbtn">个人中心</a>';
        echo '<div class="dropdown-content">';
        echo '<a href="page/uploading.php">上传</a>';
        echo '<a href="page/mypicture.php">我的照片</a>';
        echo '<a href="page/mycollect.php">我的收藏</a>';
        echo '<a href="page/logout.php">登出</a>';
        echo '</div>';

    }
    ?>
</ul>
<div>
    <img class="mainImage" src="img/3.jpg" width="1503" height="600">
</div>
<div id="mySidenav" class="sidenav">
    <a href="index.php" id="a">首页</a>
    <a href="page/browse.php" id="b">浏览页</a>
    <a href="page/searcher.php" id="c">搜索页</a>
    <a href="page/mypicture.php" id="d">我的照片</a>
</div>
    <?php
    header("content-type:text/html;charset=utf8");

    $servername ="localhost";
    $db_username="user";
    $db_password="123456";
    $db_name="pj2";
    $conn=new mysqli($servername,$db_username,$db_password,$db_name);

    $sqlImage = "SELECT * FROM travelimage ORDER BY rand() LIMIT 6";
    $queryImage = mysqli_query($conn,$sqlImage);
    $resultImage = $conn -> query($sqlImage);


?>

<div class="intro"><h3>热门图片展示</h3></div>



<div>
    <table cellspacing="50px">
        <tr>
        <?php
        for($i=0;$i<3;$i++){
            $rowImage = $resultImage->fetch_assoc();
            echo'<td>';
            echo'<a href="page/details.php?ImageID='.$rowImage['ImageID'].'">';
            echo'<img width="150ox" height="150px" src="img/travel-images/medium/'.$rowImage['PATH'].'" title="title">';
            echo'</a>';
            echo'<p class="title">'.$rowImage['Title'].'</p>';
            echo'<p class="content">'.$rowImage['Description'].'</p>';
            echo'</td>';
            echo'';
            echo'';
            echo'';
            echo'';
        }
        ?>
        </tr>
        <tr>
        <?php
        for($i=0;$i<3;$i++){
            $rowImage = $resultImage->fetch_assoc();
            echo'<td>';
            echo'<a href="page/details.php?ImageID='.$rowImage['ImageID'].'">';
            echo'<img width="150ox" height="150px" src="img/travel-images/medium/'.$rowImage['PATH'].'" title="title">';
            echo'</a>';
            echo'<p class="title">'.$rowImage['Title'].'</p>';
            echo'<p class="content">'.$rowImage['Description'].'</p>';
            echo'</td>';
            echo'';
            echo'';
            echo'';
            echo'';
        }
        ?>
        </tr>
    </table>
</div>
</div>



<div class="refresh">
    <img src="img/re.png"width="96"height="96" onclick="refresh()">
</div>
<div class="top">
    <a href="#">
        <img src="img/top.png"width="106"height="100" >
    </a>
</div>
<footer><h3>备案号19302016002</h3>
    <p>金志吴</p>
</footer>
</body>
</html>