<?php
include "common.php";
doDB();
if($_POST['imgCat'])
{
    $imgCat = $_POST['imgCat']; //分类名
    $imgDes = $_POST['desText'];
    $imgCat = "INSERT INTO up_images (img_cate, img_des )VALUES ('$imgCat' , '$imgDes')";
    mysql_query($imgCat) or die(mysql_error());
    echo "上传成功";
}
else
{
    echo "上传失败";
}
?>
