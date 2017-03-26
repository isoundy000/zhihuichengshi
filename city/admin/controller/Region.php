<?php 
namespace app\admin\controller;
use app\admin\controller\Common;
class Region extends Common{

	public function index(){
		$list = db('region')->select();
		$list = build_region($list);
		$this->assign('list',$list);
		return $this->fetch();
	}

	public function add(){
		if(request()->isPost()){
			$data = input('post.');
			if(db('region')->insert($data)){
				$this->success('新增成功');
			}else{
				$this->error('新增失败');
			}
		}
		$region = db('region')->select();
		$region = build_region($region);
		$this->assign('region',$region);
		return $this->fetch();
	}

	public function edit($id = 0){
		if(request()->isPost()){
			$data = input('post.');
			if(db('region')->update($data)){
				$this->success('编辑成功');
			}else{
				$this->error('编辑失败');
			}
		}

		$region = db('region')->find($id);
		$this->assign('region',$region);
		$this->assign('id',$id);
		return $this->fetch();
	}
}