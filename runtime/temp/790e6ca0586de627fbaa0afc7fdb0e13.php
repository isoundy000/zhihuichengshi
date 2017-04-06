<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:58:"D:\wwwroot\zhihuichengshi/city/index\view\news\detail.html";i:1491291131;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	<meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
	<link rel="stylesheet" type="text/css" href="/public/index/css/api.css"/>
	<link rel="stylesheet" type="text/css" href="/public/index/css/aui.css"/>
	<style>
	html,body {
		height:100%;
	}
	.main{
		padding:10px;
		background:#fff;
	}
	.title{
		padding:10px 0 5px 0;
		font-size:16px;
		color:#000;
		text-align:center;
	}
	.desc{
		color:#a7a6a6;
		font-size:12px;
		padding:5px 0;
		border-bottom:#ddd solid 1px;
		text-align:center;
	}
	.content{
		padding:10px 0;
		font-size:14px;
	}
	
	.content img{
		max-width:100%;
		height:auto !important;
	}
	</style>
</head>
<body>
	<div class="main aui-margin-b-15" id="newsbox">
		<div class="title"><?php echo $news['title']; ?></div>
		<div class="desc">
			<span class="aui-iconfont aui-icon-time"></span>
			发布时间：<?php echo date("Y-m-d H:i:s",$news['addtime']); ?>
		</div>
		<div class="content">
			<?php echo $news['content']; ?>
		</div>
	</div>
</body>
</html>