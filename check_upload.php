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
$path_to_thumbs_dir = "thumb/";
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
   // echo $dir . $realname;
}
elseif(!(in_array(strtolower(getExt($filename)), $filetype)))
{
	echo "目前只支持以下文件类型 <br>" . implode("," , $filetype);
}
elseif(!$upError)
{
	echo "文件尺寸太大,最大:" . $maxSize /1024 . "KB";
}
else
{
	echo "上传失败";
}
$fullImage = $dir . $filename;
//保存文件数据到数据库
//名字，地址，上传者，分类，时间
$save_img_sql = "insert into up_images 
    (img_dir, img_time, img_size, img_owner, img_cate) 
    values 
    ('$dir . $realname', now(), '$filesize', 'uname', 'lvyou' )";
$save_img_res = mysql_query($save_img_sql) or die(mysql_error());


//创建缩略图
function createThumb($realname, $dir, $path_to_thumbs_dir)
{
    $final_width_of_image = 200;
    $imgExt =  getExt($realname);
    if($imgExt == "jpg")
    {
        $im = imagecreatefromjpeg($dir. $realname);
    }
    $ox = imagesx($im);
    $oy = imagesy($im);

    $nx = $final_width_of_image;
    $ny = ($oy * ($nx / $ox));

    $nm = imagecreatetruecolor($ny, $ny);

    imagecopyresized($nm, $im, 0, 0, 0, 0, $ny, $ny, $ox, $oy);
    imagejpeg($nm, $path_to_thumbs_dir . $realname );

    echo $path_to_thumbs_dir . $realname;
}
createThumb($realname, $dir , $path_to_thumbs_dir);

?>
