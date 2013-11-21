<?php
include "common.php";
doDB();
session_start();
if($_POST['imgCat'])
{
    $imgCat = $_POST['imgCat']; //分类名
    $imgDes = $_POST['desText'];//图片描述
    while($_SESSION['count'] >= 0)
    {
        $_SESSION['count']--;
        $imgDir = $_SESSION['imgId' . $_SESSION['count']];
        //echo $imgDir;
        $imgMes = "UPDATE up_images SET img_cate = '$imgCat' , img_des = '$imgDes' WHERE img_dir = '$imgDir'";
        //echo $imgMes;
        //$imgCat = "INSERT INTO up_images (img_cate, img_des )VALUES ('$imgCat' , '$imgDes')";
        mysql_query($imgMes) or die(mysql_error());
        
    }
    
    //$_SESSION['count'] = 0;
    echo "上传成功";
}
else
{
    echo "上传失败";
}
?>
