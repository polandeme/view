<!DOCTYPE html>
<html>
<head>
    <title> upload images </title>
    <meta charset="utf-8">
<link href="default.css" rel="stylesheet" type="text/css" />
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
<style>
#upsubmit {
    float: left;
}
/* -- SWFUpload Object Styles ------------------------------- */
.swfupload {
	vertical-align: top;
}
/* -----------------------------------------------
	www.swfupload.org
	Description: Common Screen Stylesheet for SWFUpload Demos
	Updated on:  May 1, 2008
----------------------------------------------- */


/* ----------------------------------------------- 
	GLOBAL RESET 
   ----------------------------------------------- */

html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, font, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td {
	margin: 0;
	padding: 0;
	border: 0;
	outline: 0;
	font-weight: inherit;
	font-style: inherit;
	font-size: 100%;
	font-family: inherit;
	vertical-align: baseline;
}

/* remember to define focus styles! */
:focus { outline: 0; }
body {
	line-height: 1;
	color: black;
	background: white;
}
ol, ul { 
	list-style: none; 
}
/* tables still need 'cellspacing="0"' in the markup */
table {
	border-collapse: separate;
	border-spacing: 0;
}
caption, th, td {
	text-align: left;
	font-weight: normal;
}
blockquote:before, blockquote:after,
q:before, q:after { 
	content: "";
}
blockquote, q {
	quotes: "" "";
}


/* ----------------------------------------------- 
	BASIC ELEMENTS
   ----------------------------------------------- */
   
   
/* -- Text Styles ------------------------------- */
html, 
body {
	margin: 0;
	padding: 0;
	width: 100%;
	font: 12px/1.4em Helvetica, Arial, sans-serif;
}

a { 
	color: #385ea2; 
	text-decoration: none; 
}
a:hover { text-decoration: underline; }

strong { font-weight: 700; }

h1 {
	font: 28px/1em  Arial, Helvetica, sans-serif;
	padding: 60px 20px 20px;
	margin-bottom: 15px;
	color: #333;
	text-decoration: none;
}

h1 a{
	color: #fff;
	text-decoration: none;
}

h2 { 
	font-size: 22px; 
	font-weight: 300;
	padding-top: 1em;
	padding-bottom: .25em;
}


p { 
	margin-top: .25em;
	margin-bottom: .5em;
}

ul { padding: 4px 5px; }
ul li { 
	padding: 4px 5px; 
	margin: 0 20px;
	list-style:square; 
}

code {
	display: block;
	background:#edffb8 none repeat scroll 0%;
	border-color:#b2da3a;
	border-style:solid;
	border-width:1px 0;
	font-size: 1em;
	margin: 1em 0pt;
	overflow:auto;
	padding: 0.3em 0.4em;
	white-space:pre;
}

/* -- Layout ------------------------------- */


#header {
	background: #313131 url(../images/header-bg.jpg) repeat-x top left;
	height: 125px;
	position: relative;
}
	#logo { 
		padding: 0;
		margin: 0;
		background: url(../images/logo.gif) no-repeat 20px 20px;
		height: 106px;
		width: 272px;
		text-indent: -5000px;
		overflow: hidden;
	}
	/* hide link text */
	#logo a {
		display: block;
		color: #fff;
		text-indent: -5000px;
		overflow: hidden;
		height: 106px;
		width: 272px;
	}
	
	#version {
		color: #fff;
		position: absolute;
		right: 20px;
		top: 85px;
	}


#content { width: 680px;}
#content { margin: 20px 90px; }




/* -- Form Styles ------------------------------- */
form {	
	margin: 0;
	padding: 0;
}



div.fieldset {
	border:  1px solid #afe14c;
	margin: 10px 0;
	padding: 20px 10px;
}
div.fieldset span.legend {
	position: relative;
	background-color: #FFF;
	padding: 3px;
	top: -30px;
	font: 700 14px Arial, Helvetica, sans-serif;
	color: #73b304;
}

div.flash {
	width: 375px;
	margin: 10px 5px;
	border-color: #D9E4FF;

	-moz-border-radius-topleft : 5px;
	-webkit-border-top-left-radius : 5px;
    -moz-border-radius-topright : 5px;
    -webkit-border-top-right-radius : 5px;
    -moz-border-radius-bottomleft : 5px;
    -webkit-border-bottom-left-radius : 5px;
    -moz-border-radius-bottomright : 5px;
    -webkit-border-bottom-right-radius : 5px;

}

button,
input,
select,
textarea { 
	border-width: 1px; 
	margin-bottom: 10px;
	padding: 2px 3px;
}



input[disabled]{ border: 1px solid #ccc } /* FF 2 Fix */


label { 
	width: 150px; 
	text-align: right; 
	display:block;
	margin-right: 5px;
}

#btnSubmit { margin: 0 0 0 155px ; }

/* -- Table Styles ------------------------------- */
td {
	font: 10pt Helvetica, Arial, sans-serif;
	vertical-align: top;
}

.progressWrapper {
	width: 357px;
	overflow: hidden;
}

.progressContainer {
	margin: 5px;
	padding: 4px;
	border: solid 1px #E8E8E8;
	background-color: #F7F7F7;
	overflow: hidden;
}
/* Message */
.message {
	margin: 1em 0;
	padding: 10px 20px;
	border: solid 1px #FFDD99;
	background-color: #FFFFCC;
	overflow: hidden;
}
/* Error */
.red {
	border: solid 1px #B50000;
	background-color: #FFEBEB;
}

/* Current */
.green {
	border: solid 1px #DDF0DD;
	background-color: #EBFFEB;
}

/* Complete */
.blue {
	border: solid 1px #CEE2F2;
	background-color: #F0F5FF;
}

.progressName {
	font-size: 8pt;
	font-weight: 700;
	color: #555;
	width: 323px;
	height: 14px;
	text-align: left;
	white-space: nowrap;
	overflow: hidden;
}

.progressBarInProgress,
.progressBarComplete,
.progressBarError {
	font-size: 0;
	width: 0%;
	height: 2px;
	background-color: blue;
	margin-top: 2px;
}

.progressBarComplete {
	width: 100%;
	background-color: green;
	visibility: hidden;
}

.progressBarError {
	width: 100%;
	background-color: red;
	visibility: hidden;
}

.progressBarStatus {
	margin-top: 2px;
	width: 337px;
	font-size: 7pt;
	font-family: Arial;
	text-align: left;
	white-space: nowrap;
}

a.progressCancel {
	font-size: 0;
	display: block;
	height: 14px;
	width: 14px;
	background-image: url(../images/cancelbutton.gif);
	background-repeat: no-repeat;
	background-position: -14px 0px;
	float: right;
}

a.progressCancel:hover {
	background-position: 0px 0px;
}


/* -- SWFUpload Object Styles ------------------------------- */
.swfupload {
	vertical-align: top;
}

</style>
<body>
    <div id="content">

	<h2>SWFObject上传例子</h2>
	<form id="form1" action="test.php" method="post" enctype="multipart/form-data">
		<p>点击“浏览”按钮，选择您要上传的文档文件后，系统将自动上传并在完成后提示您。</p>
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


