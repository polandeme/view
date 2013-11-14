<?php
session_start();
//检测验证码
$code = $_POST['code'];
$right_code = $_SESSION['code'];
if($code == $right_code)
{
    echo "1";
}
else{
    echo "wrong";
}
?>
