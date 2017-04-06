<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:56:"D:\wwwroot\zhihuichengshi/city/staff\view\house\add.html";i:1491403083;s:53:"D:\wwwroot\zhihuichengshi/city/staff\view\layout.html";i:1491395008;}*/ ?>
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
            
<script src="/public/static/assets/layer/layer.js" type="text/javascript"></script>
<div class="row" style="margin-top:10px">
	<div class="col-md-1"></div>
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>添加/修改房源</h4></div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
					<input type="hidden" name="lid" value="<?php echo \think\Cookie::get('userid'); ?>">
					<input type="hidden" name="id" value="<?php echo (isset($res['id']) && ($res['id'] !== '')?$res['id']:''); ?>">
					<div class="form-group">
						<label class="col-md-2 control-label">标题</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="title" value="<?php echo (isset($res['title']) && ($res['title'] !== '')?$res['title']:''); ?>" required="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">价格</label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="price" value="<?php echo (isset($res['price']) && ($res['price'] !== '')?$res['price']:'0.00'); ?>" required="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">标签</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="tag" value="<?php echo (isset($res['tag']) && ($res['tag'] !== '')?$res['tag']:''); ?>" placeholder="如：拎包入住#家电齐全">
							<p>以#分隔</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">区域</label>
						<div class="col-md-5">
							<select name="region_id" class="form-control">
								<?php if(is_array($region) || $region instanceof \think\Collection || $region instanceof \think\Paginator): if( count($region)==0 ) : echo "" ;else: foreach($region as $key=>$v): ?>
								<option value="<?php echo $v['id']; ?>" <?php if(@$res['region_id'] == $v['id']): ?>selected<?php endif; ?>><?php echo $v['html']; ?><?php echo $v['region_name']; ?></option>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">方式</label>
						<div class="col-md-5">
							<?php $mode = explode("#",config('base.mode')) ?>
							<select name="mode" class="form-control">
								<?php if(is_array($mode) || $mode instanceof \think\Collection || $mode instanceof \think\Paginator): if( count($mode)==0 ) : echo "" ;else: foreach($mode as $key=>$v): ?>
								<option <?php if(@$res['mode'] == $v): ?>selected<?php endif; ?>><?php echo $v; ?></option>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">面积</label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="area" value="<?php echo (isset($res['area']) && ($res['area'] !== '')?$res['area']:'0'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">户型</label>
						<div class="col-md-5">
							<?php $house_type = explode("#",config('base.house_type')) ?>
							<select name="type" class="form-control">
								<?php if(is_array($house_type) || $house_type instanceof \think\Collection || $house_type instanceof \think\Paginator): if( count($house_type)==0 ) : echo "" ;else: foreach($house_type as $key=>$v): ?>
								<option <?php if(@$res['house_type'] == $v): ?>selected<?php endif; ?>><?php echo $v; ?></option>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">朝向</label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="face" value="<?php echo (isset($res['face']) && ($res['face'] !== '')?$res['face']:''); ?>" placeholder="如：朝南">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">装修</label>
						<div class="col-md-5">
							<?php $adorn = explode("#",config('base.adorn')); ?>
							<select name="adorn" class="form-control">
								<?php if(is_array($adorn) || $adorn instanceof \think\Collection || $adorn instanceof \think\Paginator): if( count($adorn)==0 ) : echo "" ;else: foreach($adorn as $key=>$v): ?>
								<option <?php if(@$res['adorn'] == $v): ?>selected<?php endif; ?>><?php echo $v; ?></option>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">楼层</label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="floor" value="<?php echo (isset($res['floor']) && ($res['floor'] !== '')?$res['floor']:''); ?>" placeholder="如：1楼">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">设施</label>
						<div class="col-md-9">
							<?php $facility = explode("#",config('base.facility')); if(is_array($facility) || $facility instanceof \think\Collection || $facility instanceof \think\Paginator): if( count($facility)==0 ) : echo "" ;else: foreach($facility as $key=>$v): ?>
							<label class="checkbox-inline">
  								<input type="checkbox" name="facility[]" value="<?php echo $v; ?>" <?php echo fac($v,@$res['facility']); ?>> <?php echo $v; ?>
							</label>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">描述</label>
						<div class="col-md-9">
							<textarea name="content" id="" rows="4" class="form-control"><?php echo (isset($res['content']) && ($res['content'] !== '')?$res['content']:''); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">地址</label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="address" value="<?php echo (isset($res['address']) && ($res['address'] !== '')?$res['address']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">位置</label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="position" value="<?php echo (isset($res['position']) && ($res['position'] !== '')?$res['position']:''); ?>" id="position">
						</div>
						<div class="col-md-2">
							<button type="button" class="btn btn-info" id="mark">地图</button>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">图片附件</label>
						<div class="col-md-9">
							<input class="form-control" type="file" name="file[]" multiple="multiple">
							<p>支持多选</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label"></label>
						<div class="col-md-9">
							<button class="btn btn-success">确定</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>
<script>
function setPosition(pos){
	$("#position").val(pos);
};
$(function(){
	$("#mark").click(function(){
		layer.open({
			type:2,
			titile:'地图',
			content:'<?php echo url('map'); ?>',
			area:['900px','500px'],
			scrollbar:false
		});
	});
});
</script>
        </div>
    </body>
</html>