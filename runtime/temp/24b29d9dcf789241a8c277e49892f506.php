<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:57:"D:\wwwroot\zhihuichengshi/city/admin\view\system\sms.html";i:1491219091;s:53:"D:\wwwroot\zhihuichengshi/city/admin\view\layout.html";i:1491395027;}*/ ?>
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
	<div class="col-md-2"></div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>短信接口</h4></div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post">
					<div class="form-group">
						<label class="col-md-2 control-label">用户名</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="username" value="<?php echo config('sms.username'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">密码</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="password" value="<?php echo config('sms.password'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">公司名称</label>
						<div class="col-md-9">
							<input type="text" class="form-control"  name="sign" value="<?php echo config('sms.sign'); ?>" placeholder="如：百度科技">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label"></label>
						<div class="col-md-9">
							<font color="red"><?php echo $sms; ?></font>
							<a href="http://www.smsbao.com/reg?r=10552" target="_blank">接口申请</a>
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
	<div class="col-md-3"></div>
</div>
        </div>
    </body>
</html>