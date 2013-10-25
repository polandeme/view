<?php
include 'common.php';
doDB();

	session_start();
$clean_login_uname = mysql_real_escape_string($_POST['uname']);
$clean_login_password = MD5($_POST['upassword']);
// $clean_upassword = MD5($_POST['upassword']);

//检查用户是否存在
//$login_to_sql = "select uid from user where uname = '".$clean_login_uname."' and upassword = '".$clean_login_password ."' limit 1";
$login_to_sql="select * from user where uname='$clean_login_uname'";
//echo $login_to_sql;
$login_to_res = mysql_query($login_to_sql) or die (mysql_error());

$res = mysql_fetch_array($login_to_res);

if($clean_login_password == $res['upassword']){
    echo "登录成功";

    $_SESSION['uname'] = $clean_login_uname;
    $_SESSION['uid'] = $res['uid'];
    $_SESSION['utime'] = $res['uctime'];
    $_SESSION['uemail'] = $res['uemail'];
    // header("Location:my.php");
}else{
    echo "登录失败";
}
?>
</doctype html>
    <html>
    <head>
        <meta charset="utg-8">
    </head>
    <body>
    <span id ="tm">3</span>
<script type="text/javascript">

// 登录成功三秒后跳转
var tm =3;
 function change(){
	
	document.getElementById("tm").innerHTML=tm;
	tm--;
    if(tm <0)
    {
        window.location = "my.php";
    }
	// setTimeout("change()", 1000);
	//header("Location:my.php");
}
setInterval("change()" ,1000);
</script>
    </body>
    </html>

