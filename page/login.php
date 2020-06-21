<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="../css/login.css" rel="stylesheet" type="text/css">
    <title>登录界面</title>
</head>
<body>
<div class="row">
    <div class="column left">
        <img src="../img/login.jpg" width="250" height="500">
        <p>
            备案号19302016002
        </p>
    </div>
    <div class="column right">
        <form action="../src/verLogin.php" method="POST">
            <p>
                您的用户名（字母开头且5~16个字符）<br>
                <input type="text" name="name" placeholder="username..."
                       pattern="^[a-zA-Z][a-zA-Z0-9_]{4,15}$"
                       required="required">
            </p>
            请输入密码<br>
            <input type="password" name="password" placeholder="password..."
                   pattern="^[a-zA-Z][a-zA-Z0-9]{7,}$"
                   required="required">
            </p>
            <input class="submit_bt" type="submit" id="submit" value="登录" onclick="submit()">
            </p>
            <p>
                <a href="register.php">没有账号？点击注册</a>
            </p>
        </form>
    </div>
</div>
</body>
</html>
