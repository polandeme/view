<?php
session_start();
function is_login()
{
	if(isset($_SESSION['uname']))
	{
		showUserMessage($_SESSION['uname']);
	}
	else
	{
		echo "请先登录";
	}
}
function showUserMessage($uname)
{
	echo $uname;
	echo "<a href = logout.php>退出 </a>";
}

?>
