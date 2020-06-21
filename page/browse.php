<!DOCTYPE html>
<html lang="zh">

<head>
<meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="../css/browse.css" rel="stylesheet" type="text/css">
    <script type="text/javascript">
        var area = [
            ['Roma', 'Milano', 'Napoli'],
            ['Toronto', 'Montreal', 'Calgary'],
            ['旧金山', '华盛顿', '纽约'],
            ['东京', '大阪', '名古屋'],
        ];

        function changeSelect() {
            var slt_area = document.form1.area;
            var slt_project = document.form1.project;
            var project_area = area[slt_project.selectedIndex - 1];
            slt_area.length = 1;
            for (var i = 0; i < project_area.length; i++) {
                slt_area[i + 1] = new Option(project_area[i], project_area[i]);
            }
        }
    </script>
    <script>
        function submit() {
            alert("已搜索");
        }
    </script>
    <title>浏览页</title>


    <title>浏览页</title>
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
        <a class="active" href="browse.php">浏览页</a>
    </li>
    <li>
        <a href="searcher.php">搜索页</a>
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
        echo '<a href="" class="dropbtn">用户'.$_SESSION['user'].'</a>';
        echo '<div class="dropdown-content">';
        echo '<a href="page/uploading.php">上传</a>';
        echo '<a href="page/mypicture.php">我的照片</a>';
        echo '<a href="page/mycollect.php">我的收藏</a>';
        echo '<a href="page/logout.php">登出</a>';
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

    <div class="row">
    <div class="column left">
        <div class="search">
            <h2>标题搜索</h2>
            <form action="#">
                <input type="text" placeholder="搜索.." name="search">
                <button type="submit"><i class="i-s" onclick="submit()"></i></button>
            </form>
        </div>
    </div>
    <div class="maintag">
        <div class="tag1">
            <div class="tagname1">热门国家</div>
            <div class="tagshow1">
                <ul class="list">
                    <li><a href="#">加拿大</a></li>
                    <li><a href="#">英国</a></li>
                    <li><a href="#">德国</a></li>
                </ul>
            </div>
        </div>
        <div class="tag2">
            <div class="tagname2">热门城市</div>
            <div class="tagshow2">
                <ul class="list">
                    <li><a href="#">伦敦</a></li>
                    <li><a href="#">柏林</a></li>
                    <li><a href="#">罗马</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="column right">
        <form name="form1" method="post" action="#">
            
        <select id="project" onchange="changeSelect()">
                <option value="0">请选择国家</option>
                <option value="1">意大利</option>
                <option value="2">加拿大</option>
                <option value="2">英国</option>
            </select>

            <select id="area">
                <option value="">请选择城市</option>
            </select>
            <button type="submit"><i class="i-s" onclick="submit()"></i></button>
        </form>
        <div>
            <table cellspacing="30px">
                <tr>
                    <td>
                        <a href="#">
                            <img src="../img/1.jpg" title="title">
                        </a>
                    </td>
                    <td>
                        <a href="#">
                            <img src="../img/2.jpg" title="title">
                        </a>
                    </td>
                    <td>
                        <a href="#">
                            <img src="../img/3.jpg" title="title">
                        </a>
                    </td>
                    <td>
                        <a href="#">
                            <img src="../img/4.jpg" title="title">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="#">
                            <img src="../img/1.jpg" title="title">
                        </a>
                    </td>
                    <td>
                        <a href="#">
                            <img src="../img/2.jpg" title="title">
                        </a>
                    </td>
                    <td>
                        <a href="#">
                            <img src="../img/3.jpg" title="title">
                        </a>
                    </td>
                    <td>
                        <a href="#">
                            <img src="../img/4.jpg" title="title">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="#">
                            <img src="../img/1.jpg" title="title">
                        </a>
                    </td>
                    <td>
                        <a href="#">
                            <img src="../img/2.jpg" title="title">
                        </a>
                    </td>
                    <td>
                        <a href="#">
                            <img src="../img/3.jpg" title="title">
                        </a>
                    </td>
                    <td>
                        <a href="#">
                            <img src="../img/4.jpg" title="title">
                        </a>
                    </td>
                </tr>
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
        <img src="../img/top.png"width="106"height="100" >
    </a>
</div>
<div class="footer">
    <h3>备案号19302016002</h3>
</div>
</body>
</html>
