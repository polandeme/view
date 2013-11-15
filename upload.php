<?php
include "if_login.php";
is_login();
?>
<?php
if($fLogin)
{
    //echo $fLogin;
?>
<!DOCTYPE html>
<html>
<head>
    <title> upload images </title>
    <meta charset="utf-8">
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script src="swfupload.js"></script>
<script src="js/handlers.js"> </script>
<script type="text/javascript" src="js/fileprogress.js"></script>
<script type="text/javascript" src="jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/swfupload.queue.js"></script>
<script type="text/javascript">
var swfu;
window.onload = function () {
	var settings = {
		flash_url : "swfupload.swf",
		upload_url: "check_upload.php",
		post_params: {
			"PHPSESSID" : "NONE",
			"HELLO-WORLD" : "Here I Am",
			".what" : "OKAY"
		},
		file_size_limit : "100 MB",//文件大小限制
		//file_types : "*.jpg;*.gif;*.png;*.jpeg;*.flv;*.mp4;*.avi;*wmv",
		file_types : "*.*",
		file_types_description : "All Files",//文件类型
		file_upload_limit : 100,
		file_queue_limit : 0,
		custom_settings : {
			progressTarget : "fsUploadProgress",
			cancelButtonId : "btnCancel"
		},
		debug: false,

		// Button Settings
		button_image_url: "images/TestImageNoText_65x29.png",//按钮图片  控制图片显示，在as文件 line 1100  
		button_placeholder_id : "upsubmit",  //按钮id
		button_text: '<span class="theFont">浏览</span>',//按钮文字
		button_text_style: ".theFont { font-size: 16; }",//按钮文字字号
		button_text_left_padding: 12,//按钮左边距
		button_text_top_padding: 3,//按钮上边距
		button_width: "65",//按钮宽
		button_height: "29",//按钮高
		//button_width: 61,
		//button_height: 22,

		// The event handler functions are defined in handlers.js
		//swfupload_loaded_handler : swfUploadLoaded,
		file_queued_handler : fileQueued,
		file_queue_error_handler : fileQueueError,
		file_dialog_complete_handler : fileDialogComplete,
		upload_start_handler : uploadStart,
		upload_progress_handler : uploadProgress,
		upload_error_handler : uploadError,
		upload_success_handler : uploadSuccess,
		upload_complete_handler : uploadComplete,
		queue_complete_handler : queueComplete,	// Queue plugin event
		
		// SWFObject settings
		//  minimum_flash_version : "9.0.28",
		swfupload_pre_load_handler : swfUploadPreLoad,
		swfupload_load_failed_handler : swfUploadLoadFailed
	};

	swfu = new SWFUpload(settings);
};
</script>
</head>

<body>
    <div id="content">

	<h2>upload images</h2>
	<form id="form1" action="test.php" method="post" enctype="multipart/form-data">
			<div id="divSWFUploadUI">
			<div class="fieldset  flash" id="fsUploadProgress"><span class="legend">快速上传</span></div>
			<p id="divStatus">0 个文件已上传</p>
			<p>
				<span id="upsubmit"></span>
				<input id="btnCancel" type="button" value="取消所有上传" disabled="disabled" style="margin-left: 2px; height: 29px; font-size: 8pt;" />
                <div id ="showImg"> </div>
				<br />
			</p>
		</div>
	</form>
</div>
</body>
</html>
<?php
}
else
{
    echo $fLogin;
    echo "login";
}
?>

