<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:58:"D:\wwwroot\zhihuichengshi/city/staff\view\house\index.html";i:1491403168;s:53:"D:\wwwroot\zhihuichengshi/city/staff\view\layout.html";i:1491395008;}*/ ?>
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
		<div class="row">
			<div class="col-md-9">
				<form class="form-inline" action="<?php echo url('index'); ?>">
  					<div class="form-group">
    					<input type="text" class="form-control" name="title" placeholder="标题" value="<?php echo \think\Request::instance()->get('title'); ?>">
  					</div>
  					<div class="form-group">
    					<select name="region_id" class="form-control">
    						<option value="">地区</option>
    						<?php if(is_array($region) || $region instanceof \think\Collection || $region instanceof \think\Paginator): if( count($region)==0 ) : echo "" ;else: foreach($region as $key=>$v): ?>
    						<option value="<?php echo $v['id']; ?>" <?php if($v['id'] == @$_GET['region_id']): ?>selected<?php endif; ?>><?php echo $v['html']; ?><?php echo $v['region_name']; ?></option>
    						<?php endforeach; endif; else: echo "" ;endif; ?>
    					</select>
  					</div>
  					<button type="submit" class="btn btn-success">搜索</button>
  					<a href="<?php echo url('index'); ?>" class="btn btn-info">全部</a>
				</form>
			</div>
		</div>
		<div class="panel panel-default" style="margin-top:5px">
			<div class="panel-heading"><h4>房源管理</h4></div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>房东</th>
							<th>标题</th>
							<th>区域</th>
							<th>价格</th>
							<th>方式</th>
							<th>面积</th>
							<th>户型</th>
							<th>朝向</th>
							<th>装修</th>
							<th>楼层</th>
							<th>推荐</th>
							<th>状态</th>
							<th width="160">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
						<tr>
							<td><?php echo $v['username']; ?></td>
							<td><?php echo $v['title']; ?></td>
							<td><?php echo $v['region_name']; ?></td>
							<td><?php echo $v['price']; ?></td>
							<td><?php echo $v['mode']; ?></td>
							<td><?php echo $v['area']; ?></td>
							<td><?php echo $v['type']; ?></td>
							<td><?php echo $v['face']; ?></td>
							<td><?php echo $v['adorn']; ?></td>
							<td><?php echo $v['floor']; ?></td>
							<td>
								<?php switch($v['status']): case "0": ?><span class="bg-primary">未租</span><?php break; case "1": ?><span class="bg-success">已租</span><?php break; endswitch; ?>
							</td>
							<td>
								<?php if($v['is_top'] == '1'): ?>
								<a href="<?php echo url('attr?status=0&id='.$v['id']); ?>" class="bg-success">是</a>
								<?php else: ?>
								<a href="<?php echo url('attr?status=1&id='.$v['id']); ?>" class="bg-primary">否</a>
								<?php endif; ?>
							</td>
							<td>
								<a href="<?php echo url('add?id='.$v['id']); ?>" class="btn btn-info btn-xs">编辑</a>
								<a href="<?php echo url('files?id='.$v['id']); ?>" class="btn btn-success btn-xs">图片附件</a>
								<?php if($v['status'] == '0'): ?>
								<a href="<?php echo url('del?id='.$v['id']); ?>" onclick="return confirm('确认要删除吗？')" class="btn btn-danger btn-xs">删除</a>
								<?php endif; ?>
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
<style>
.bg-primary{background-color:#1E9FFF;color:#fff;padding:3px 5px;}
.bg-success{background-color:#5FB878;color:#fff;padding:3px 5px;}
</style>
        </div>
    </body>
</html>