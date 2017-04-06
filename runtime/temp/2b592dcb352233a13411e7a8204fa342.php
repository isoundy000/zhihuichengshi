<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:60:"D:\wwwroot\zhihuichengshi/city/admin\view\slide\addedit.html";i:1491306231;s:53:"D:\wwwroot\zhihuichengshi/city/admin\view\layout.html";i:1491395027;}*/ ?>
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
			<div class="panel-heading"><h4>添加/修改幻灯</h4></div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo (isset($res['id']) && ($res['id'] !== '')?$res['id']:''); ?>">
					<div class="form-group">
						<label class="col-md-3 control-label">幻灯名称</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="name" value="<?php echo (isset($res['name']) && ($res['name'] !== '')?$res['name']:''); ?>" required="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">图片</label>
						<div class="col-md-9">
							<input type="file" class="form-control" name="file">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">位置</label>
						<div class="col-md-9">
							<?php if(!(empty($res) || (($res instanceof \think\Collection || $res instanceof \think\Paginator ) && $res->isEmpty()))): ?>
							<select name="position" class="form-control" required="">
								<option value="top" <?php if($res['position'] == 'top'): ?>selected<?php endif; ?>>顶部</option>
								<option value="center" <?php if($res['position'] == 'center'): ?>selected<?php endif; ?>>中部</option>
							</select>
							<?php else: ?>
							<select name="position" class="form-control" required="">
								<option value="top">顶部</option>
								<option value="center">中部</option>
							</select>
							<?php endif; ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">链接</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="link" value="<?php echo (isset($res['link']) && ($res['link'] !== '')?$res['link']:''); ?>">
							<p>可连接新闻链接</p>
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