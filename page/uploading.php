<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="../css/uploading.css" rel="stylesheet" type="text/css">
    <title>上传界面</title>

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
    if(empty($_SESSION['UID'])){
        echo <<<EOF
        <div class="dropdown">    
        <a href="page/login.php" class="drop_btn">登录</a>
EOF;

    }else{
        echo '<div class="dropdown">';
        echo '<a href="" class="drop_btn">用户'.$_SESSION['user'].'</a>';
        echo '<div class="dropdown_content">';
        echo '<a href="page/uploading.php">上传</a>';
        echo '<a href="page/mypicture.php">我的照片</a>';
        echo '<a href="page/mycollect.php">我的收藏</a>';
        echo '<a href="page/logout.php">登出</a>';
        echo '</div>';

    }
    ?>
</ul>
<div class="sidenav" id="mySidenav">
    <a href="../index.php" id="a">首页</a>
    <a href="browse.php" id="b">浏览页</a>
    <a href="searcher.php" id="c">搜索页</a>
    <a href="mypicture.php" id="d">我的照片</a>
</div>
<div class="upload">
    <div class="show"><h3>图片未上传</h3></div>
    <img alt="" class="add-img" src="">
    <div class="add-btn">选择文件</div>
    <input class="add-file" onchange="previewFile()" type="file">
    <div/>
    <p>图片标题：</p>
    <input class="t_text" name="title" type="text">
    <p>图片描述：</p>
    <input class="d_text" name="describe" type="text">
    <p>图片国家：</p>
    <input class="ci_text" name="city" type="text">
    <p>图片城市：</p>
    <input class="co_text" name="country" type="text">
    <a href="mypicture.php">
        <input class="submit_bt" type="submit" onclick="submit()" value="提交">
    </a>
</div>
<hr>
<p>备案号19302016002</p>
<hr>
</body>
<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
<script>
    $(".add-btn").click(function () {
        $('[type=file]').click();
    });

    function previewFile() {
        var preview = document.getElementsByClassName("add-img")[0];
        var file = document.getElementsByClassName('add-file')[0].files[0];
        var reader = new FileReader();
        reader.addEventListener("load", function () {
            preview.src = reader.result;
        }, false);
        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
</html>
