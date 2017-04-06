<?php 
namespace app\api\controller;
class Classinfo{
	public function page($page = 1,$limit = 10,$keys = '',$cid=''){
		$where = [];
		if($cid){
			$where['cid'] = $cid;
		}
		if($keys){
			$where['title'] = ['like','%'.$keys.'%'];
		}
		$list = db('classinfo')
				->where($where)
				->page($page,$limit)
				->select();
		foreach($list as $k=>$v){
			$thumb = db('classinfo_files')->where('classid',$v['id'])->value('filepath');
			$list[$k]['thumb'] = make_head($thumb);
		}
		return json(['status'=>1,'msg'=>'success','data'=>$list,'count'=>count($list)]);
	}

	public function add($uid = '',$price = '',$cid = ''){
		if(request()->isPost()){
			if(!$uid||!$price||!$cid){
				return json(['status'=>0,'msg'=>'数据异常.','data'=>$uid]);
			}
			$files = request()->file('file');
			$_files = [];
			if($files){
			    foreach($files as $file){
			        // 移动到框架应用根目录/public/uploads/ 目录下
			        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'.DS.'classinfo');
			        if($info){
			        	$filename = $info->getSaveName();
			        	$filename = str_replace("\\","/", $filename);
			        	$url = "/public/uploads/classinfo/".$filename;
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
			if($id = db('classinfo')->insertGetid($data)){
				$msg = '发布成功';
			}else{
				$msg = '发布失败';
			}
			foreach ($_files as $key => $value) {
				$_files[$key]['classid'] = $id;
			}
			$status = $id?1:0;
			db('classinfo_files')->insertAll($_files);
			return json(['status'=>$status,'msg'=>$msg]);
		}
	}

	public function detail($id){
		$res = db('classinfo')->find($id);
		$files = db('classinfo_files')->where('classid',$id)->select();
		if($files){
			foreach($files as $k=>$v){
				$files[$k]['filepath'] = "http://".$_SERVER['HTTP_HOST'].$v['filepath'];
			}
		}
		$res['files'] = $files;
		if($res){
			return json(['status'=>1,'msg'=>'success','data'=>$res]);
		}else{
			return json(['status'=>0,'msg'=>'数据异常.']);
		}
	}
}