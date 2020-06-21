<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="../css/register.css" rel="stylesheet" type="text/css">
    <title>注册界面</title>
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
        <form action="../src/verRegister.php" method="POST">
            <p>
                您的用户名（字母开头且5~16个字符）<br>
                <input type="text" name="r-name" placeholder="username..."
                       pattern="^[a-zA-Z][a-zA-Z0-9_]{4,15}$"
                       required="required">
            </p>
            您的邮箱<br>
            <input type="email" name="r-email" placeholder="email..."
                   pattern="^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$"
                   required="required">
            <p>
                请设置密码<br>
                <input type="password" name="r-password" placeholder="password..." id="pw1"
                       pattern="^[a-zA-Z][a-zA-Z0-9]{7,}$"
                       required="required">
            </p>
            <p>
                请确认密码<br>
                <input type="password" name="re-password"
                       placeholder="please input again..." id="pw2"
                       onkeyup="validate()"/><span
                    id="test"
                    pattern="^[a-zA-Z][a-zA-Z0-9]{7,}$"
                    required="required"></span>
            </p>
                <input class="submit_bt" type="submit" id="submit" value="注册" onclick="submit()">
            </p>
        </form>
    </div>
</div>
</body>
</html>

