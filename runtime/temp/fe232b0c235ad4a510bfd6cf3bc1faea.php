<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:62:"D:\wwwroot\zhihuichengshi/city/admin\view\classinfo\index.html";i:1491215655;s:53:"D:\wwwroot\zhihuichengshi/city/admin\view\layout.html";i:1490360746;}*/ ?>
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
		<div class="row">
			<div class="col-md-9">
				<form class="form-inline" action="<?php echo url('index'); ?>">
  					<div class="form-group">
    					<input type="text" class="form-control" name="title" placeholder="信息标题" value="<?php echo \think\Request::instance()->get('title'); ?>">
  					</div>
  					<div class="form-group">
    					<select name="cid" class="form-control">
    						<option value="">全部分类</option>
    						<?php if(is_array($cat) || $cat instanceof \think\Collection || $cat instanceof \think\Paginator): if( count($cat)==0 ) : echo "" ;else: foreach($cat as $key=>$v): ?>
    						<option value="<?php echo $v['id']; ?>" <?php if($v['id'] == @$_GET['cid']): ?>selected<?php endif; ?>><?php echo $v['name']; ?></option>
    						<?php endforeach; endif; else: echo "" ;endif; ?>
    					</select>
  					</div>
  					<button type="submit" class="btn btn-success">搜索</button>
  					<a href="<?php echo url('index'); ?>" class="btn btn-info">全部</a>
				</form>
			</div>
		</div>
		<div class="panel panel-default" style="margin-top:5px">
			<div class="panel-heading"><h4>信息管理</h4></div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>ID</th>
							<th>信息标题</th>
							<th>所属分类</th>
							<th>发布用户</th>
							<th>信息描述</th>
							<th>物品价格</th>
							<th>联系人</th>
							<th>电话</th>
							<th>发布时间</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
						<tr>
							<td><?php echo $v['id']; ?></td>
							<td><?php echo $v['title']; ?></td>
							<td><?php echo $v['cat_name']; ?></td>
							<td><?php echo (isset($v['nickname']) && ($v['nickname'] !== '')?$v['nickname']:'管理员'); ?></td>
							<td><?php echo $v['info']; ?></td>
							<td><?php echo $v['price']; ?></td>
							<td><?php echo $v['contact']; ?></td>
							<td><?php echo $v['tel']; ?></td>
							<td><?php echo date("Y-m-d H:i:s",$v['addtime']); ?></td>
							<td>
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