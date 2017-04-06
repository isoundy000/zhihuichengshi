<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:63:"D:\wwwroot\zhihuichengshi/city/admin\view\landlord\addedit.html";i:1490360746;s:53:"D:\wwwroot\zhihuichengshi/city/admin\view\layout.html";i:1490360746;}*/ ?>
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
            
<div class="row" style="margin-top:10px">
	<div class="col-md-2"></div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>添加/修改房东</h4></div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post">
					<input type="hidden" name="id" value="<?php echo (isset($res['id']) && ($res['id'] !== '')?$res['id']:''); ?>">
					<div class="form-group">
						<label class="col-md-3 control-label">用户名</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="username" value="<?php echo (isset($res['username']) && ($res['username'] !== '')?$res['username']:''); ?>" required="" <?php if(!(empty($res['username']) || (($res['username'] instanceof \think\Collection || $res['username'] instanceof \think\Paginator ) && $res['username']->isEmpty()))): ?>readonly<?php endif; ?>>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">密码</label>
						<div class="col-md-9">
							<input type="password" class="form-control" name="password" <?php if(empty($res['id']) || (($res['id'] instanceof \think\Collection || $res['id'] instanceof \think\Paginator ) && $res['id']->isEmpty())): ?>required<?php endif; ?>>
							<?php if(!(empty($res['id']) || (($res['id'] instanceof \think\Collection || $res['id'] instanceof \think\Paginator ) && $res['id']->isEmpty()))): ?>不改更，请留空<?php endif; ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">真实姓名</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="truename" value="<?php echo (isset($res['truename']) && ($res['truename'] !== '')?$res['truename']:''); ?>" required="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-9">
							<button class="btn btn-success">确定添加</button>
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