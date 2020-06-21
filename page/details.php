<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="../css/picturedetail.css" rel="stylesheet" type="text/css">
    <title>详情页</title>
</head>
<body>
<ul class="nav">
    <li>
        <a chref="#" class="cat">
            <img src="../img/cat.jpeg" width="54" height="54">
        </a>
    </li>
    <li>
        <a class="active" href="../index.php">首页</a>
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
header("content-type:text/html;charset=utf8");
$ImageID = $_GET["ImageID"];

$servername = "localhost";
$db_username = "user";
$db_password = "123456";
$db_name = "pj2";
$conn = new mysqli($servername, $db_username, $db_password, $db_name);

//获取图片信息
$sqlImage = "SELECT * From travelimage WHERE ImageID = '".$_GET['ImageID']."'";
$queryImage = mysqli_query($conn, $sqlImage);
$resultImage = $conn->query($sqlImage);
$rowImage = $resultImage->fetch_assoc();

$title = $rowImage['Title'];
$desription = $rowImage['Description'];
$content = $rowImage['Content'];

//获取拍摄者
$sqlUser = "SELECT * From traveluser WHERE UID = '".$rowImage['UID']."'";
$queryUser = mysqli_query($conn, $sqlUser);
$resultUser = $conn->query($sqlUser);
$rowUser = $resultUser->fetch_assoc();

$user = $rowUser['UserName'];

//获取城市信息
$sqlCity = "SELECT * From geocities WHERE GeoNameID = '".$rowImage['CityCode']."'";
$queryCity = mysqli_query($conn, $sqlCity);
$resultCity = $conn->query($sqlCity);
$rowCity = $resultCity->fetch_assoc();

$city = $rowCity['AsciiName'];

//获取国家信息
$sqlCountry = "SELECT * From geocountries_regions WHERE ISO = '".$rowImage['Country_RegionCodeISO']."'";
$queryCountry = mysqli_query($conn, $sqlCountry);
$resultCountry = $conn->query($sqlCountry);
$rowCountry = $resultCountry->fetch_assoc();

$country = $rowCountry['Country_RegionName'];


//获取收藏人数

$sqlNum = "SELECT * From travelimagefavor WHERE ImageID = '".$_GET['ImageID']."'";
$queryNum = mysqli_query($conn,$sqlNum);
$num = mysqli_num_rows($queryNum);
?>

<div class="row">
    <div class="column left">
        <img src="../img/krs.jpg" width="400" height="300">
    </div>
    <div class="column right">
        <table cellspacing="30px">
            <tr>
                <td>
                    <div class="list">
                        <ul>
                            <li><p><?php echo'标题：'.$title; ?></p></li>
                            <li><p>拍摄者：<?php echo $user; ?></p></li>
                            <li><p>主题：<?php echo $content; ?></p></li>
                            <li><p>拍摄国家：<?php echo $country; ?></p></li>
                            <li><p>拍摄城市：<?php echo $city; ?></p></li>
                        </ul>
                    </div>
                </td>
                <td>
                    <div class="collect">
                        <p>收藏人数：
                        <p/>
                        <p><?php echo $num; ?></p>
                        <form action="#">
                            <input type="button" class="button delete" value="收藏" onclick="col()">
                        </form>
                    </div>
                </td>
            </tr>
            <tr><div class="content">
                    <p><?php echo $desription; ?>
                    </p></div>
            </tr>
        </table>
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

<div class="footer">
    <h3>备案号19302016002</h3>
</div>
</body>
</html>
