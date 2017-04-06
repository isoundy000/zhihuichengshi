<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:57:"D:\wwwroot\zhihuichengshi/city/admin\view\user\index.html";i:1491215655;s:53:"D:\wwwroot\zhihuichengshi/city/admin\view\layout.html";i:1490360746;}*/ ?>
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
            
<div class="row" style="margin-top:10px;">
	<div class="col-md-12">
		<div class="panel panel-default" style="margin-top:5px">
			<div class="panel-heading"><h4>会员管理</h4></div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>ID</th>
							<th>手机号</th>
							<th>昵称</th>
							<th>性别</th>
							<th>年龄</th>
							<th>邮箱</th>
							<th>QQ</th>
							<th>微信</th>
							<th>注册时间</th>
							<th width="200">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
						<tr>
							<td><?php echo $v['id']; ?></td>
							<td><?php echo $v['phone']; ?></td>
							<td><?php echo $v['nickname']; ?></td>
							<td><?php echo $v['sex']; ?></td>
							<td><?php echo $v['age']; ?></td>
							<td><?php echo $v['email']; ?></td>
							<td><?php echo $v['qq']; ?></td>
							<td><?php echo $v['wechat']; ?></td>
							<td><?php echo date("Y-m-d H:i:s",$v['addtime']); ?></td>
							<td>
								<a href="<?php echo url('add?id='.$v['id']); ?>" class="btn btn-info btn-sm">编辑</a>
								<?php if($v['status'] == '1'): ?>
								<a href="<?php echo url('attr?status=0&id='.$v['id']); ?>" class="btn btn-warning btn-sm">锁定</a>
								<?php else: ?>
								<a href="<?php echo url('attr?status=1&id='.$v['id']); ?>" class="btn btn-primary btn-sm">解锁</a>
								<?php endif; ?>
								<a href="<?php echo url('del?id='.$v['id']); ?>" onclick="return confirm('确认要删除吗？')" class="btn btn-danger btn-sm">删除</a>
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