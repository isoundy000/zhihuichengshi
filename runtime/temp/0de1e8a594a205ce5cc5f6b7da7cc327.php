<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:57:"D:\wwwroot\zhihuichengshi/city/admin\view\region\add.html";i:1491215655;s:53:"D:\wwwroot\zhihuichengshi/city/admin\view\layout.html";i:1491395027;}*/ ?>
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
            
<div class="row" style="margin-top:10px;">
	<div class="col-md-6">
		<div class="panel panel-default" style="margin-top:5px">
			<div class="panel-heading"><h4>编辑区域</h4></div>
			<div class="panel-body">
				<form action=""  class="form-horizontal" method="post">
					<div class="form-group">
						<label class="col-md-2 control-label">区域名称</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="region_name" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">所属区域</label>
						<div class="col-md-9">
							<select name="pid" class="form-control">
								<option value="0">顶级区域</option>
								<?php if(is_array($region) || $region instanceof \think\Collection || $region instanceof \think\Paginator): if( count($region)==0 ) : echo "" ;else: foreach($region as $key=>$v): ?>
								<option value="<?php echo $v['id']; ?>"><?php echo $v['html']; ?><?php echo $v['region_name']; ?></option>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
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