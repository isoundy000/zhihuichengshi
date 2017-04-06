<?php 
namespace app\api\controller;
class House{

	public function page($page = 1,$limit = 10){
		$data = input('post.');
		$where = [];
		if($data['price']!='不限'){
			$price = explode("-",$data['price']);
			$where['a.price'] = ['between',$price];
		}
		if($data['house_type']!='不限'){
			$where['a.type'] = $data['house_type'];
		}
		if($data['mode']!='不限'){
			$where['a.mode'] = $data['mode'];
		}
		if($data['adorn']!='不限'){
			$where['a.adorn'] = $data['adorn'];
		}
		if($data['rid']){
			$rid = get_sub_id($data['rid']);
			$rid[] = $data['rid'];
			$rid = implode(",",$rid);
			$where['a.region_id'] = ['in',$rid];
		}
		if($data['status']!=''){
			$where['a.status'] = $data['status'];
		}
		$list = db('house')
				->alias('a')
				->where($where)
				->join('__REGION__ b','a.region_id=b.id','LEFT')
				->limit($limit)
				->order('a.id DESC')
				->field('a.*,b.region_name')
				->select();
		foreach($list as $k=>$v){
			$thumb = db('house_files')->where('pid',$v['id'])->order('id ASC')->value('filepath');
			$list[$k]['thumb'] = make_head($thumb);
			$list[$k]['tag'] = explode("#",$v['tag']);
		}
		return json(['status'=>1,'msg'=>'success','data'=>$list,'count'=>count($list)]);
	}

	public function detail($id = 0){
		$res = db('house')->find($id);
		$files = db('house_files')->where('pid',$id)->select();
		if($files){
			foreach($files as $k=>$v){
				$files[$k]['filepath'] = "http://".$_SERVER['HTTP_HOST'].$v['filepath'];
			}
		}
		$res['files'] = $files;
		$res['tag'] = explode("#",$res['tag']);
		$res['facility'] = json_decode($res['facility'],true);
		$position = explode(",",$res['position']);
		$res['lon'] = $position[0];
		$res['lat'] = $position[1];
		if($res){
			return json(['status'=>1,'msg'=>'success','data'=>$res]);
		}else{
			return json(['status'=>0,'msg'=>'数据异常.']);
		}
	}

	public function top(){
		$limit = 10;
		$list = db('house')
				->alias('a')
				->join('__REGION__ b','a.region_id=b.id','LEFT')
				->limit($limit)
				->order('id DESC')
				->field('a.*,b.region_name')
				->select();
		foreach($list as $k=>$v){
			$thumb = db('house_files')->where('pid',$v['id'])->order('id ASC')->value('filepath');
			$list[$k]['thumb'] = make_head($thumb);
			$list[$k]['tag'] = explode("#",$v['tag']);
		}
		return json(['status'=>1,'msg'=>'success','data'=>$list]);
	}
}