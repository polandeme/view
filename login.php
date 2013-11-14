<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>登录</title>
    </head>
    <body>
        <fieldset>
            <legend> 登录</legend>
            <form method="post" action="check_login.php">
                <label for="uname"> 用户名</label>
                <input type="text" name="uname" id="uname">
                <label for="upassword"> 密码</label>
                <input type="password" name="upassword" id="upassword">
                <input type="submit" name="submit" value="登录">
            </form>
        </fieldset>
    </body>
</html>
