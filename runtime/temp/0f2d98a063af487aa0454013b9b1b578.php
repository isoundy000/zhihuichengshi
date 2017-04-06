<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:58:"D:\wwwroot\zhihuichengshi/city/admin\view\system\base.html";i:1491487014;s:53:"D:\wwwroot\zhihuichengshi/city/admin\view\layout.html";i:1491395027;}*/ ?>
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
        <script src="__PUBLIC__/assets/js/jquery.min.js"></script>
            <title>无标题文档</title></head>
    
    <body>
        <div class="page-content clearfix">
            
<div class="row" style="margin-top:10px">
	<div class="col-md-1"></div>
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>基本设置</h4></div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post">
					<div class="form-group">
						<label class="col-md-2 control-label">配套设施</label>
						<div class="col-md-9">
							<textarea name="facility" class="form-control"><?php echo config('base.facility'); ?></textarea>
							<p>以#分隔</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">出租方式</label>
						<div class="col-md-9">
							<textarea name="mode" class="form-control"><?php echo config('base.mode'); ?></textarea>
							<p>以#分隔</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">户型</label>
						<div class="col-md-9">
							<textarea name="house_type" class="form-control"><?php echo config('base.house_type'); ?></textarea>
							<p>以#分隔</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">装修</label>
						<div class="col-md-9">
							<textarea name="adorn" class="form-control"><?php echo config('base.adorn'); ?></textarea>
							<p>以#分隔</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">价格区间</label>
						<div class="col-md-9">
							<textarea name="price" class="form-control"><?php echo config('base.price'); ?></textarea>
							<p>以#分隔，以-区间</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label"></label>
						<div class="col-md-9">
							<button class="btn btn-success">确认保存</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
        </div>
    </body>
</html>