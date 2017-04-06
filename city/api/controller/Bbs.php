<?php 
namespace app\api\controller;
class Bbs{

	public function add($uid = '',$title = '',$content = ''){
		if(request()->isPost()){
			if(!$uid||!$title||!$content){
				return json(['status'=>0,'msg'=>'数据异常.','data'=>$uid]);
			}
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
			$data['addtime'] = time();
			$data['lasttime'] = time();
			if($id = db('forum_posts')->insertGetid($data)){
				$msg = '发布成功';
			}else{
				$msg = '发布失败';
			}
			foreach ($_files as $key => $value) {
				$_files[$key]['pid'] = $id;
			}
			$status = $id?1:0;
			db('forum_files')->insertAll($_files);
			return json(['status'=>$status,'msg'=>$msg]);
		}
	}

	public function page($page = 1,$limit = 10,$fid = ''){
		$where = [];
		if($fid){
			$where['a.fid'] = $fid;
		}
		$list = db('forum_posts')
				->alias('a')
				->where($where)
				->page($page,$limit)
				->join('__USER__ b','a.uid=b.id','LEFT')
				->field('a.*,b.nickname,b.head_pic')
				->order('a.lasttime DESC')
				->select();
		if($list){
			foreach($list as $k=>$v){
				$list[$k]['head_pic'] = make_head($v['head_pic']);
				$list[$k]['time'] = get_add_time(time()-$v['addtime']);
			}
		}
		return json(['status'=>1,'msg'=>'success','data'=>$list,'count'=>count($list)]);
	}

	public function detail($id){
		$res = db('forum_posts')->find($id);
		$count = db('forum_reply')->where('pid',$id)->count();
		$files = db('forum_files')->where('pid',$id)->select();
		if($files){
			foreach($files as $k=>$v){
				$files[$k]['filepath'] = "http://".$_SERVER['HTTP_HOST'].$v['filepath'];
			}
		}
		$res['files'] = $files;
		if($res){
			return json(['status'=>1,'msg'=>'success','data'=>$res,'count'=>$count]);
		}else{
			return json(['status'=>0,'msg'=>'数据异常.']);
		}
	}

	public function reply($page = 1,$limit = 10,$pid = ''){
		$where = [];
		if($pid){
			$where['a.pid'] = $pid;
		}
		$list = db('forum_reply')
				->alias('a')
				->where($where)
				->page($page,$limit)
				->join('__USER__ b','a.uid=b.id','LEFT')
				->order('a.id DESC')
				->field('a.*,b.nickname,b.head_pic')
				->select();
		if($list){
			foreach($list as $k=>$v){
				$list[$k]['head_pic'] = make_head($v['head_pic']);
				$list[$k]['time'] = date("Y-m-d H:i",$v['addtime']);
			}
		}
		return json(['status'=>1,'msg'=>'success','data'=>$list,'count'=>count($list)]);
	}

	public function do_reply(){
		if(request()->isPost()){
			$data = input('post.');
			if(!$data['uid']||!$data['pid']||!$data['content']){
				return json(['status'=>0,'msg'=>'数据异常.']);
			}
			$data['addtime'] = time();
			if(db('forum_reply')->insert($data)){
				db('forum_posts')->where('id',$data['pid'])->update(['lasttime'=>time()]);
				return json(['status'=>1,'msg'=>'回复成功']);
			}else{
				return json(['status'=>0,'msg'=>'回复失败']);
			}
		}
	}

	public function act($pid = '',$uid = '',$act = ''){
		if(!$pid||!$uid||!$act){
			return json(['status'=>0,'msg'=>'数据异常.']);
		}
		$data = input('get.');
		$where = $data;
		unset($where['act']);
		if(db('dingcai')->where($where)->count()){
			return json(['status'=>0,'msg'=>'']);
		}else{
			$data['addtime'] = time();
			db('dingcai')->insert($data);
			db('forum_reply')->where("id",$pid)->setInc($act,1);
			return json(['status'=>1,'msg'=>'']);
		}
	}
}