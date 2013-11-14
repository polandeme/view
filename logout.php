<?php
session_start();

//注销登录

    unset($_SESSION['uid']);
    unset($_SESSION['uname']);
    echo '注销登录成功！点击此处 <a href="login.php">登录</a>';
    exit;
?>
