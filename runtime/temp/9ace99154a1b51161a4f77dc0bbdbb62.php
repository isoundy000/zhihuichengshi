<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:59:"D:\wwwroot\zhihuichengshi/city/admin\view\shop\addedit.html";i:1490360746;s:53:"D:\wwwroot\zhihuichengshi/city/admin\view\layout.html";i:1490360746;}*/ ?>
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
			<div class="panel-heading"><h4>添加/修改商家</h4></div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo (isset($res['id']) && ($res['id'] !== '')?$res['id']:''); ?>">
					<div class="form-group">
						<label class="col-md-3 control-label">商家名称</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="shop_name" value="<?php echo (isset($res['shop_name']) && ($res['shop_name'] !== '')?$res['shop_name']:''); ?>" required="" <?php if(!(empty($res['shop_name']) || (($res['shop_name'] instanceof \think\Collection || $res['shop_name'] instanceof \think\Paginator ) && $res['shop_name']->isEmpty()))): ?>readonly<?php endif; ?>>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">图片</label>
						<div class="col-md-9">
							<input type="file" class="form-control" name="file">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">联系人</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="shop_contact" value="<?php echo (isset($res['shop_contact']) && ($res['shop_contact'] !== '')?$res['shop_contact']:''); ?>" required="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">联系电话</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="shop_phone" value="<?php echo (isset($res['shop_phone']) && ($res['shop_phone'] !== '')?$res['shop_phone']:''); ?>" required="">
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