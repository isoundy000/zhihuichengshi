<?php 
//新闻模块
namespace app\admin\controller;
use app\admin\controller\Common;
class News extends Common{

	public function index(){
		$list = db('news')
				->paginate(15);
		$this->assign('list',$list);
		return $this->fetch();
	}

	public function add($id = ''){
		if($id){
			$news = db('news')->find($id);
			$this->assign('news',$news);
		}
		if(request()->isPost()){
			$data = input('post.');
			if($id){
				if(db('news')->update($data)){
					$this->success('编辑成功');
				}else{
					$this->error('编辑失败或未更改');
				}
			}else{
				$data['addtime'] = time();
				if(db('news')->insert($data)){
					$this->success("添加成功！");
				}else{
					$this->error("添加失败");
				}
			}
		}
		$this->assign('id',$id);
		return $this->fetch();
	}

	public function del($id){
		if(db('news')->delete($id)){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}

	public function attr($status=0,$id=0){
		if(db('news')->where('id',$id)->update(['is_top'=>$status])){
			$this->success('操作成功');
		}else{
			$this->error('操作失败');
		}
	}

	public function upload(){
		if(request()->isPost()){
			$file = request()->file('imgFile');
			if($file){
				$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'.DS.'news');
				if($info){
					$filename = $info->getSaveName();
		        	$filename = str_replace("\\","/", $filename);
		        	$url = "/public/uploads/news/".$filename;
		        	return json(['error'=>0,'url'=>$url]);
				}else{
					return json(['error'=>1,'message'=>$file->getError()]);
				}
			}else{
				return json(['error'=>1,'message'=>'没有上传文件']);
			}
		}
	}
}