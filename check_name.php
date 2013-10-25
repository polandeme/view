<?php
include_once 'common.php';
doDB();

// if(!isset($_GET['name'])){
// 	echo "test";
//     header("Location:login.html");
//     exit();
// }
$regname = $_GET['name'];
// echo $regname;
$check_uname_sql = "select * from user where uname = '$regname'";
 // echo $check_uname_sql;
$check_uname_res = mysql_query($check_uname_sql) or die( "ni" . mysql_error());

$user_rows = mysql_num_rows($check_uname_res);

if($user_rows > 0){
	echo 'yes';
}
else{
	echo 'no';
}

?>