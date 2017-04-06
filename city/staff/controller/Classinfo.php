<?php 
//二手信息
namespace app\admin\controller;
use app\admin\controller\Common;
class Classinfo extends Common{

	public function category(){
		$list = db('classinfo_cat')
				->order('rank ASC')
				->paginate(15);
		$this->assign('list',$list);
		return $this->fetch();
	}

	public function add_cat($id = ''){
		if($id){
			$cat = db('classinfo_cat')->find($id);
			$this->assign('cat',$cat);
		}
		if(request()->isPost()){
			$data = input('post.');
			if($id){
				if(db('classinfo_cat')->update($data)){
					$this->success('编辑成功');
				}else{
					$this->error('编辑失败或未更改');
				}
			}else{
				if(db('classinfo_cat')->insert($data)){
					$this->success("添加成功！");
				}else{
					$this->error("添加失败");
				}
			}
		}
		$this->assign('id',$id);
		return $this->fetch();
	}

	public function del_cat($id){
		if(db('classinfo_cat')->delete($id)){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}

	public function index($title='',$cid=''){
		$where = [];
		if($title){
			$where['a.title'] = ['like','%'.$title.'%'];
		}
		if($cid){
			$where['a.cid'] = $cid;
		}
		$list = db('classinfo')
				->alias('a')
				->where($where)
				->join('__CLASSINFO_CAT__ b','a.cid=b.id','LEFT')
				->join('__USER__ c','a.uid=b.id','LEFT')
				->field('a.*,b.name cat_name,c.nickname')
				->paginate(15);
		$cat = db('classinfo_cat')->order('rank ASC')->select();
		$this->assign('cat',$cat);
		$this->assign('list',$list);
		return $this->fetch();
	}

	public function del($id = 0){
		if(db('classinfo')->delete($id)){
			$file = db('classinfo_files')->where('classid',$id)->select();
			foreach($file as $v){
				@unlink('.'.$v['filepath']);
			}
			db('classinfo_files')->where('classid',$id)->delete();
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}
}