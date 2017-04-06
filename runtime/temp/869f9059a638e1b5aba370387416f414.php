<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:56:"D:\wwwroot\zhihuichengshi/city/admin\view\bbs\index.html";i:1491239644;s:53:"D:\wwwroot\zhihuichengshi/city/admin\view\layout.html";i:1490360746;}*/ ?>
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
			<div class="col-md-1"><a class="btn btn-info" href="<?php echo url('add_posts'); ?>">新增贴子</a></div>
			<div class="col-md-9">
				<form class="form-inline" action="<?php echo url('index'); ?>">
  					<div class="form-group">
    					<input type="text" class="form-control" name="title" placeholder="贴子标题" value="<?php echo \think\Request::instance()->get('title'); ?>">
  					</div>
  					<div class="form-group">
    					<select name="fid" class="form-control">
    						<option value="">全部版块</option>
    						<?php if(is_array($forum) || $forum instanceof \think\Collection || $forum instanceof \think\Paginator): if( count($forum)==0 ) : echo "" ;else: foreach($forum as $key=>$v): ?>
    						<option value="<?php echo $v['id']; ?>" <?php if($v['id'] == @$_GET['fid']): ?>selected<?php endif; ?>><?php echo $v['name']; ?></option>
    						<?php endforeach; endif; else: echo "" ;endif; ?>
    					</select>
  					</div>
  					<button type="submit" class="btn btn-success">搜索</button>
  					<a href="<?php echo url('index'); ?>" class="btn btn-info">全部</a>
				</form>
			</div>
		</div>
		<div class="panel panel-default" style="margin-top:5px">
			<div class="panel-heading"><h4>贴子管理</h4></div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>ID</th>
							<th>贴子标题</th>
							<th>贴子版块</th>
							<th>发布用户</th>
							<th>回复</th>
							<th width="150">发布时间</th>
							<th width="150">最后回复</th>
							<th width="200">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
						<tr>
							<td><?php echo $v['id']; ?></td>
							<td><?php echo msubstr($v['title'],0,25,'utf-8',true); ?></td>
							<td><?php echo $v['forum_name']; ?></td>
							<td><?php echo (isset($v['nickname']) && ($v['nickname'] !== '')?$v['nickname']:'管理员'); ?></td>
							<td><a href="<?php echo url('reply?id='.$v['id']); ?>"><strong><?php echo $v['reply']; ?></strong></a></td>
							<td><?php echo date("Y-m-d H:i:s",$v['addtime']); ?></td>
							<td><?php echo date("Y-m-d H:i:s",$v['lasttime']); ?></td>
							<td>
								<a href="<?php echo url('add_posts?id='.$v['id']); ?>" class="btn btn-info btn-sm">编辑</a>
								<a href="<?php echo url('files?id='.$v['id']); ?>" class="btn btn-success btn-sm">图片附件</a>
								<a href="<?php echo url('del_posts?id='.$v['id']); ?>" onclick="return confirm('确认要删除吗？')" class="btn btn-danger btn-sm">删除</a>
							</td>
						</tr>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</div>
			<div class="panel-footer">
				<?php echo $page; ?>
			</div>
		</div>
	</div>
</div>
        </div>
    </body>
</html>