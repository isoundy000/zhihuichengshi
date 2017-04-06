<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:55:"D:\wwwroot\zhihuichengshi/city/admin\view\news\add.html";i:1491215655;s:53:"D:\wwwroot\zhihuichengshi/city/admin\view\layout.html";i:1490360746;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="__PUBLIC__/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="__PUBLIC__/css/style.css" />
        <link rel="stylesheet" href="__PUBLIC__/assets/css/font-awesome.min.css" />
        <link href="__PUBLIC__/assets/css/codemirror.css" rel="stylesheet">
        <!--[if IE 7]>
            <link rel="stylesheet" href="__PUBLIC__/assets/css/font-awesome-ie7.min.css" />
        <![endif]-->
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="__PUBLIC__/assets/css/ace-ie.min.css" />
        <![endif]-->
        <script src="__PUBLIC__/assets/js/ace-extra.min.js"></script>
        <!--[if lt IE 9]>
            <script src="__PUBLIC__/assets/js/html5shiv.js"></script>
            <script src="__PUBLIC__/assets/js/respond.min.js"></script>
        <![endif]-->
        <!--[if !IE]> -->
            <script src="__PUBLIC__/assets/js/jquery.min.js"></script>
            <!-- <![endif]-->
            <script src="__PUBLIC__/assets/dist/echarts.js"></script>
            <script src="__PUBLIC__/assets/js/bootstrap.min.js"></script>
            <title>无标题文档</title></head>
    
    <body>
        <div class="page-content clearfix">
            
<link rel="stylesheet" href="/public/kindeditor/themes/default/default.css" />
<script charset="utf-8" src="/public/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/public/kindeditor/lang/zh_CN.js"></script>
<script>
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="content"]', {
			allowFileManager : false,
			width:'100%',
			height:'500px',
			uploadJson : '<?php echo url('upload'); ?>',
			items:['source', '|', 'fullscreen', 'undo', 'redo', 'print', 'cut', 'copy', 'paste','plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright','justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript','superscript', '|', 'selectall', '-','title', 'fontname', 'fontsize', '|', 'textcolor', 'bgcolor', 'bold','italic', 'underline', 'strikethrough', 'removeformat', '|', 'image','flash', 'media', 'advtable', 'hr', 'emoticons', 'link', 'unlink', '|', 'about']
		});
	});
</script>
<div class="row" style="margin-top:10px;">
	<div class="col-md-12">
		<div class="panel panel-default" style="margin-top:5px">
			<div class="panel-heading"><h4>编辑新闻</h4></div>
			<div class="panel-body">
				<form action=""  class="form-horizontal" method="post">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<div class="form-group">
						<label class="col-md-2 control-label">新闻标题</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="title" value="<?php echo (isset($news['title']) && ($news['title'] !== '')?$news['title']:''); ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">新闻内容</label>
						<div class="col-md-9">
							<textarea name="content" id="" cols="30" rows="10"><?php echo (isset($news['content']) && ($news['content'] !== '')?$news['content']:''); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="label-control col-md-2"></label>
						<div class="col-md-9">
							<button type="submit" class="btn btn-info">确认操作</button>
						</div>
					</div>
				</form>
			</div>
			<div class="panel-footer">
				
			</div>
		</div>
	</div>
</div>
        </div>
    </body>
</html>