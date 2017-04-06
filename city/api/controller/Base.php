<?php 
namespace app\api\controller;
class Base{

	public function init(){
		//论坛
		$forum = db('forum')->order('rank ASC')->select();
		//二手信息
		$classinfo = db('classinfo_cat')->order('rank ASC')->select();
		//区域
		$region = db('region')->select();
		$region = getTree($region);
		//价格区间
		$price = explode("#",config('base.price'));
		//户型
		$house_type = explode("#",config('base.house_type'));
		//方式
		$mode = explode("#",config('base.mode'));
		//装修
		$adorn = explode("#",config('base.adorn'));

		$data = [
			'forum'=>$forum,
			'classinfo'=>$classinfo,
			'region'=>$region,
			'price'=>$price,
			'house_type'=>$house_type,
			'mode'=>$mode,
			'adorn'=>$adorn
		];
		return json($data);
	}
}