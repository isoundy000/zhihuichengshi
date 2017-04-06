<?php 
//房源管理
namespace app\staff\controller;
use app\staff\controller\Common;
class House extends Common{

	public function index($zt = '',$title='',$region_id = ''){
		$where['lid'] = cookie('userid');
		if($zt!=''){
			$where['a.status'] = $zt;
		}
		if($title){
			$where['a.title'] = ['like','%'.$title.'%'];
		}
		if($region_id){
			$ids = get_sub_id($region_id);
			$ids[] = $region_id;
			$ids = implode(",",$ids);
			$where['a.region_id'] = ['in',$ids];
		}
		$list = db('house')
				->alias('a')
				->where($where)
				->join('__LANDLORD__ b','a.lid=b.id','LEFT')
				->join('__REGION__ c','a.region_id=c.id','LEFT')
				->field('a.*,b.username,c.region_name')
				->paginate(15);
		$this->assign('list',$list);
		$region = db('region')->select();
		$region = build_region($region);
		$this->assign('region',$region);
		return $this->fetch();
	}

	public function add($id = 0){
		if($id){
			$house = db('house')->find($id);
			$house['facility'] = json_decode($house['facility'],true);
			
			$this->assign('res',$house);
		}
		if(request()->isPost()){
			$files = request()->file('file');
			$_files = [];
			if($files){
			    foreach($files as $file){
			        // 移动到框架应用根目录/public/uploads/ 目录下
			        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'.DS.'house');
			        if($info){
			        	$filename = $info->getSaveName();
			        	$filename = str_replace("\\","/", $filename);
			        	$url = "/public/uploads/house/".$filename;
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
			$data['facility'] = json_encode($data['facility']);
			$msg = '';
			if($id){
				if($res = db('house')->update($data)){
					$msg = '编辑成功';
				}else{
					$msg = '编辑失败';
				}
			}else{
				$data['addtime'] = time();
				if($res = $id = db('house')->insertGetid($data)){
					$msg = '添加成功';
				}else{
					$msg = '添加失败';
				}
			}
			if($res){
				foreach ($_files as $key => $value) {
					$_files[$key]['pid'] = $id;
				}
				db('house_files')->insertAll($_files);
				$this->success($msg);
			}else{
				$this->error($msg);
			}
		}
		$region = db('region')->select();
		$region = build_region($region);
		$this->assign('region',$region);
		return $this->fetch();
	}

	public function attr($status=0,$id=0){
		if(db('house')->where('id',$id)->update(['is_top'=>$status])){
			$this->success('操作成功');
		}else{
			$this->error('操作失败');
		}
	}

	public function del($id){
		if(db('house')->delete($id)){
			$files = db('house_files')->where('pid',$id)->field('filepath')->select();
			foreach($files as $k=>$v){
				@unlink('.'.$v['filepath']);
			}
			db('house_files')->where('pid',$id)->delete();
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}

	public function files($id = 0){
		$list = db('house_files')
				->alias('a')
				->where('a.pid',$id)
				->join('__HOUSE__ b','a.pid=b.id','LEFT')
				->field('a.*,b.title')
				->paginate(15);
		$this->assign('list',$list);
		return $this->fetch();
	}

	public function del_file($id){

		$url = db('house_files')->where('id',$id)->value('filepath');
		if(db('house_files')->delete($id)){
			@unlink('.'.$url);
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}

	public function map(){

		return $this->fetch();
	}
}