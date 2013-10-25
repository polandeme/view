<?php 
include 'common.php';
doDB();

if(!$_POST['uname']){
    header("Location:login.html");
    echo "hello world";
    exit;
}

//过滤用户输入的数据
$clean_uname = mysql_real_escape_string($_POST['uname'] );
$clean_uemail = mysql_real_escape_string($_POST['uemail']);
$clean_upassword = MD5($_POST['upassword']);

//检测用户名是否重复
$judge_uname_sql = "select * from user where uname = '".$clean_uname."'";
$judge_uname_res = mysql_query($judge_uname_sql) or 
die("mysql_error()");

$judge_user = mysql_num_rows($judge_uname_res);

if($judge_user>0)
{
echo "用户已存在,请重新注册";
$display_block1=<<<EOF
<!DOCTYPE html>
<html>
<body>
<span id = "tm">3</span>
<script type="text/javascript">

// 登录成功三秒后跳转
var tm =2;
 function change(){
	
	document.getElementById("tm").innerHTML=tm;
	tm--;
    if(tm <0)
    {
        window.location = "registe.html";
    }
	// setTimeout("change()", 1000);
	//header("Location:my.php");
}
setInterval("change()" ,1000);
</script>
</body>
</html>
EOF;
echo $display_block1;
}
else
{
//插入到数据库中
$user_sql = "insert into user
    ( uname, uemail, upassword, uctime)
    values ('".$clean_uname."', '".$clean_uemail."', '".$clean_upassword."', now())"; 
$user_res = mysql_query($user_sql) or die("error" . mysql_error());

$display_block=<<<EOF
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
    <body>
        <h1> 注册成功</h1>
        请<a href ="login.html"> 登录</a>
    </body>
</html>
EOF;
echo $display_block;
}


?>