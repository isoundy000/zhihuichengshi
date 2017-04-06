<?php 
namespace app\api\controller;
class Slide{

	public function all(){
		$top = db('slide')->where('position','top')->select();
		$center = db('slide')->where('position','center')->select();
		foreach($top as $k=>$v){
			$top[$k]['image_url'] = "http://".$_SERVER['HTTP_HOST'].$v['image_url'];
		}
		foreach($center as $k=>$v){
			$center[$k]['image_url'] = "http://".$_SERVER['HTTP_HOST'].$v['image_url'];
		}
		$data = [
			'topslide'=>$top,
			'centerslide'=>$center
		];
		return json(['status'=>1,'data'=>$data]);
	}
}