<?php
include "common.php";
doDB();
session_start();
if(isset($_SESSION['uname']))
{
	$uname = $_SESSION['uname'];
	//echo "用户名:" . $uname;
}
else
{
	//echo "no session";
}

$dir = "upfile/";
$filetype = array("zip" , "txt" , "css" , "png" , "gif" , "jpg");
$maxSize = 1024 * 1024 * 1 ;
$file = &$_FILES['Filedata'];
$filename = $file['name'];
$filesize = $file['size'];
$upError = false;  //判断文件是否运行上传，true 为不允许
if($filesize > $maxSize)
{
	$upError = false; 	
}
else
{
	$upError = true;
}
//获取文件后缀名
function getExt($filename)
{
	return substr(strrchr($filename , "."),1);
}

//判断类型
if(in_array(strtolower(getExt($filename)), $filetype) && $upError)
{
	$realname = date("ymd") . "_" . $filename;
	$movefile = move_uploaded_file($file['tmp_name'] , iconv('utf-8','gb2312' , $dir . $realname));
/*	if($movefile)
	{
		echo "<br><b>文件上传成功</b>";
		echo "<br>文件名： ";
		echo $filename;
		echo "<br>大小：";
		echo round($filesize /1024 ,2) . "KB";
		echo "<br>";
	}
	else 
	{
		echo "文件移动失败";

    }
}
elseif(!(in_array(strtolower(getExt($filename)), $filetype)))
{
	echo "目前只支持以下文件类型 <br>" . implode("," , $filetype);
}
elseif(!$upError)
{
	echo "文件尺寸太大最大:" . $maxSize /1024 . "KB";
}*/
}
else
{
	echo "上传失败";
}

//上传成功后将图片信息写入数据库
echo "iii"; 












?>

