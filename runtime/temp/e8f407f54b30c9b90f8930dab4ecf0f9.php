<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:60:"D:\wwwroot\zhihuichengshi/city/admin\view\bbs\add_posts.html";i:1491305305;s:53:"D:\wwwroot\zhihuichengshi/city/admin\view\layout.html";i:1490360746;}*/ ?>
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
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="panel panel-default" style="margin-top:5px">
			<div class="panel-heading"><h4>编辑贴子</h4></div>
			<div class="panel-body">
				<form action=""  class="form-horizontal" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<div class="form-group">
						<label class="col-md-2 control-label">选择版块</label>
						<div class="col-md-9">
							<select class="form-control" name="fid" required>
								<option value="">请选择</option>
								<?php if(is_array($forum) || $forum instanceof \think\Collection || $forum instanceof \think\Paginator): if( count($forum)==0 ) : echo "" ;else: foreach($forum as $key=>$v): ?>
								<option value="<?php echo $v['id']; ?>" <?php if($v['is_lock'] == '1'): ?>disabled<?php endif; if($v['id'] == @$posts['fid']): ?>selected<?php endif; ?>><?php echo $v['name']; if($v['is_lock'] == '1'): ?> 禁<?php endif; ?></option>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">贴子标题</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="title" value="<?php echo (isset($posts['title']) && ($posts['title'] !== '')?$posts['title']:''); ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">贴子内容</label>
						<div class="col-md-9">
							<textarea class="form-control" name="content" style="height:200px;" required><?php echo (isset($posts['content']) && ($posts['content'] !== '')?$posts['content']:''); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">图片附件</label>
						<div class="col-md-9">
							<input class="form-control" type="file" name="file[]" multiple="multiple">
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
	<div class="col-md-3">
		
	</div>
</div>
        </div>
    </body>
</html>