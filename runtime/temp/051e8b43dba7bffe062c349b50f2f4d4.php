<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:58:"D:\wwwroot\zhihuichengshi/city/staff\view\house\files.html";i:1491401781;s:53:"D:\wwwroot\zhihuichengshi/city/staff\view\layout.html";i:1491395008;}*/ ?>
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
	<div class="col-md-12">
		<div class="panel panel-default" style="margin-top:5px">
			<div class="panel-heading"><h4>附件管理</h4></div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>ID</th>
							<th>所属房源</th>
							<th>图片名称</th>
							<th>图片预览</th>
							<th>图片类型</th>
							<th width="200">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
						<tr>
							<td><?php echo $v['id']; ?></td>
							<td><?php echo $v['title']; ?></td>
							<td><?php echo $v['filename']; ?></td>
							<td>
								<a href="<?php echo $v['filepath']; ?>" target="_blank"><img src="<?php echo $v['filepath']; ?>" width="50" height="50"></a>
							</td>
							<td><?php echo $v['fileext']; ?></td>
							<td>
								<a href="<?php echo url('del_file?id='.$v['id']); ?>" onclick="return confirm('确认要删除吗？')" class="btn btn-danger btn-sm">删除</a>
							</td>
						</tr>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</div>
			<div class="panel-footer">
				<?php echo $list->render(); ?>
			</div>
		</div>
	</div>
</div>
        </div>
    </body>
</html>