<?php 
namespace app\api\controller;
class Shop{

	public function page($page = 1,$limit = 10,$keys = ''){
		$where = [];
		if($keys){
			$where['shop_name'] = ['like','%'.$keys.'%'];
		}
		$list = db('shop')
				->where($where)
				->page($page,$limit)
				->select();
		if($list){
			foreach($list as $k=>$v){
				$list[$k]['shop_pic'] = "http://".$_SERVER['HTTP_HOST'].$v['shop_pic'];
			}
		}
		return json(['status'=>1,'msg'=>'success','data'=>$list,'count'=>count($list)]);
	}
}