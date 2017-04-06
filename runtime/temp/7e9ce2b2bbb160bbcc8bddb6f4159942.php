<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:58:"D:\wwwroot\zhihuichengshi/city/admin\view\slide\index.html";i:1491289533;s:53:"D:\wwwroot\zhihuichengshi/city/admin\view\layout.html";i:1491395027;}*/ ?>
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
		<a href="<?php echo url('addedit'); ?>" class="btn btn-info">添加幻灯</a>
		<div class="panel panel-default" style="margin-top:5px;">
			<div class="panel-heading"><h4>幻灯管理</h4></div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>ID</th>
							<th>幻灯名称</th>
							<th>幻灯图片</th>
							<th>位置</th>
							<th>链接</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
						<tr>
							<td><?php echo $v['id']; ?></td>
							<td><?php echo $v['name']; ?></td>
							<td><img src="<?php echo $v['image_url']; ?>" width="100"></td>
							<td>
								<?php switch($v['position']): case "top": ?>顶部<?php break; case "center": ?>中部<?php break; endswitch; ?>
							</td>
							<td><?php echo $v['link']; ?></td>
							<td>
								<a href="<?php echo url('addedit?id='.$v['id']); ?>" class="btn btn-info">编辑</a>
								<a href="<?php echo url('del?id='.$v['id']); ?>" onclick="return confirm('确认要删除吗？')" class="btn btn-danger">删除</a>
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