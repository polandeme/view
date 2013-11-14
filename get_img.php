<?php

// if(!isset($_GET['name'])){
// 	echo "test";
//     header("Location:login.html");
//     exit();
// }
$regname = $_GET['name'];
// echo $regname;

if($user_rows > 0){
	echo 'yes';
}
else{
	echo 'no';
}

?>
