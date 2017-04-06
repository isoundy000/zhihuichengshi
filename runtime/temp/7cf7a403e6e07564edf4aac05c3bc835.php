<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:56:"D:\wwwroot\zhihuichengshi/city/staff\view\house\map.html";i:1491399627;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<style type="text/css">
		*{margin:0;padding:0;}
		body, html {width: 100%;height: 100%;margin:0;font-family:"微软雅黑";font-family:"微软雅黑";}
		#allmap{width:100%;height:400px;}
		p{margin-left:5px; font-size:14px;padding:10px;}
		#success{display:none;}
	</style>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=2EcQEbLRPfZP2uySP4FLGuWCAkEchanQ"></script>
</head>
<body>
	<p>
		<input type="text" id="keys" />
		<button onclick="search();">搜索</button>
		<span id="position"></span>
		<button id="success" onclick="success();">确定</button>
	</p>
	<div id="allmap"></div>
</body>
</html>
<script type="text/javascript">
	function success(){
		var position = document.getElementById('position').innerHTML;
		window.parent.setPosition(position);
		window.parent.layer.closeAll();
	};
	function search(){
		var keys = document.getElementById('keys').value;
		map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);
		var local = new BMap.LocalSearch(map, {
			renderOptions:{map: map}
		});
		local.search(keys);
	};
	// 百度地图API功能
	var map = new BMap.Map("allmap");
	map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);
	map.addControl(new BMap.OverviewMapControl());              //添加缩略地图控件
	map.enableScrollWheelZoom();                            //启用滚轮放大缩小
	function showInfo(e){
		var marker = new BMap.Marker(new BMap.Point(e.point.lng, e.point.lat)); // 创建点
		map.clearOverlays();
		map.addOverlay(marker);
		document.getElementById('position').innerHTML = e.point.lng+','+e.point.lat;
		document.getElementById('success').style.display="inline-block";
	}
	map.addEventListener("click", showInfo);
</script>