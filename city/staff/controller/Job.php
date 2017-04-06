<?php 
//云工作
namespace app\admin\controller;
use app\admin\controller\Common;
class Job extends Common{

	public function index(){
		$list = db('job')
				->paginate(15);
		$this->assign('list',$list);
		return $this->fetch();
	}

	public function addedit($id = 0){
		if($id){
			$res = db('job')->find($id);
			$this->assign('res',$res);
		}
		if(request()->isPost()){
			$data = input('post.');
			if($id){
				if(db('job')->update($data)){
					$this->success('编辑成功');
				}else{
					$this->error('编辑失败或未更改');
				}
			}else{
				$data['addtime'] = time();
				if(db('job')->insert($data)){
					$this->success("添加成功！");
				}else{
					$this->error("添加失败");
				}
			}
		}
		
		return $this->fetch();
	}

	public function del($id){
		if(db('job')->delete($id)){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}
}