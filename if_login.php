<?php
session_start();
$fLogin = 1 ; // 判读是否为登录状态，true 为登录
function is_login()
{
	if(isset($_SESSION['uname']))
	{
		showUserMessage($_SESSION['uname']);
	}
	else
	{
		echo "请先";
        echo "<a href=login.php>登录</a>";
        $fLogin = 0;
	}
}
function showUserMessage($uname)
{
	echo $uname;
	echo "&nbsp;&nbsp;&nbsp;<a href = logout.php>退出 </a>";
    $fLogin = 1;
}

?>
