<?php 
namespace app\api\controller;
class Job{

	public function page($page = 1,$limit = 10,$keys = ''){
		$where = [];
		$whereOr = [];
		if($keys){
			$where['company_name'] = ['like','%'.$keys.'%'];
			$whereOr['job_name'] = ['like','%'.$keys.'%'];
		}
		$list = db('job')
				->where($where)
				->whereOr($whereOr)
				->page($page,$limit)
				->select();
		return json(['status'=>1,'msg'=>'success','data'=>$list,'count'=>count($list)]);
	}

	public function detail($id = 0){
		$job = db('job')->find($id);
		if($job){
			$job['job_info'] = str_replace("\n","<br />",$job['job_info']);
			return json(['status'=>1,'msg'=>'success','data'=>$job]);
		}else{
			return json(['status'=>0,'msg'=>'数据异常.']);
		}
	}

	public function top(){
		$limit = 10;
		$list = db('job')
				->limit($limit)
				->order('id DESC')
				->select();
		return json(['status'=>1,'msg'=>'success','data'=>$list]);
	}
}