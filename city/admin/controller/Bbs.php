<?php 
//论坛
namespace app\admin\controller;
use app\admin\controller\Common;
class Bbs extends Common{

	public function forum(){
		$list = db('forum')
				->order('rank ASC')
				->paginate(15);
		$this->assign('list',$list);
		return $this->fetch();
	}

	public function add_forum($id = ''){
		if($id){
			$forum = db('forum')->find($id);
			$this->assign('forum',$forum);
		}
		if(request()->isPost()){
			$data = input('post.');
			if($id){
				if(db('forum')->update($data)){
					$this->success('编辑成功');
				}else{
					$this->error('编辑失败或未更改');
				}
			}else{
				if(db('forum')->insert($data)){
					$this->success("添加成功！");
				}else{
					$this->error("添加失败");
				}
			}
		}
		$this->assign('id',$id);
		return $this->fetch();
	}

	public function del_forum($id){
		if(db('forum')->delete($id)){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}

	public function index($title='',$fid=''){
		$where = [];
		if($title){
			$where['a.title'] = ['like','%'.$title.'%'];
		}
		if($fid){
			$where['a.fid'] = $fid;
		}
		$list = db('forum_posts')
				->alias('a')
				->where($where)
				->join('__FORUM__ b','a.fid=b.id','LEFT')
				->join('__USER__ c','a.uid=c.id','LEFT')
				->field('a.*,b.name forum_name,c.nickname')
				->paginate(15);
		$_list = [];
		foreach($list as $v){
			$v['reply'] = db('forum_reply')->where('pid',$v['id'])->count();
			$_list[] = $v;
		}

		$forum = db('forum')->order('rank asc')->select();
		$this->assign('forum',$forum);
		$this->assign('list',$_list);
		$this->assign('page',$list->render());
		return $this->fetch();
	}

	public function add_posts($id = ''){
		if($id){
			$posts = db('forum_posts')->find($id);
			$this->assign('posts',$posts);
		}
		if(request()->isPost()){
			$files = request()->file('file');
			$_files = [];
			if($files){
			    foreach($files as $file){
			        // 移动到框架应用根目录/public/uploads/ 目录下
			        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'.DS.'post');
			        if($info){
			        	$filename = $info->getSaveName();
			        	$filename = str_replace("\\","/", $filename);
			        	$url = "/public/uploads/post/".$filename;
			        	$_files[] = [
			        		'filepath'=>$url,
			        		'filename'=>$info->getInfo('name'),
			        		'fileext'=>$info->getExtension()
			        	]; 
			        }else{
			            // 上传失败获取错误信息
			            echo $file->getError();
			        }    
			    }
			}
			
			$data = input('post.');
			$msg = '';
			if($id){
				$data['lasttime'] = time();
				if($res = db('forum_posts')->update($data)){
					$msg = '编辑成功';
				}else{
					$msg = '编辑失败';
				}
			}else{
				$data['addtime'] = time();
				$data['lasttime'] = time();
				if($res = $id = db('forum_posts')->insertGetid($data)){
					$msg = '添加成功';
				}else{
					$msg = '添加失败';
				}
			}
			if($res){
				foreach ($_files as $key => $value) {
					$_files[$key]['pid'] = $id;
				}
				db('forum_files')->insertAll($_files);
				$this->success($msg);
			}else{
				$this->error($msg);
			}
		}

		$forum = db('forum')->order('rank ASC')->select();
		$this->assign('forum',$forum);
		$this->assign('id',$id);
		return $this->fetch();
	}

	public function del_posts($id){
		if(db('forum_posts')->delete($id)){
			$files = db('forum_files')->where('pid',$id)->field('filepath')->select();
			foreach($files as $k=>$v){
				@unlink('.'.$v['filepath']);
			}
			db('forum_files')->where('pid',$id)->delete();
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}

	public function files($id = 0){
		$list = db('forum_files')
				->alias('a')
				->where('a.pid',$id)
				->join('__FORUM_POSTS__ b','a.pid=b.id','LEFT')
				->field('a.*,b.title')
				->paginate(15);
		$this->assign('list',$list);
		return $this->fetch();
	}

	public function del_file($id){

		$url = db('forum_files')->where('id',$id)->value('filepath');
		if(db('forum_files')->delete($id)){
			@unlink('.'.$url);
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}

	public function reply($id = 0){
		$list = db('forum_reply')
				->alias('a')
				->where('a.pid',$id)
				->join('__FORUM_POSTS__ b','a.pid=b.id','LEFT')
				->field('a.*,b.title')
				->paginate(15);
		$this->assign('list',$list);
		return $this->fetch();
	}

	public function del_reply($id){

		$url = db('forum_reply')->where('id',$id)->value('filepath');
		if(db('forum_reply')->delete($id)){
			@unlink('.'.$url);
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}
}