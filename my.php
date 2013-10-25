<?php
session_start();

if(!isset($_SESSION['uid'])){
    header("Location:login.html");
    exit();
}
echo "用户名" . $_SESSION['uname'];
echo "<br>";
echo "注册时间" . $_SESSION['utime'];
echo "<br>";
echo "邮箱：" . $_SESSION['uemail'];
?>