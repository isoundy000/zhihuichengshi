<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function build_region(&$region,$pid=0,$repeat=0,$html='──'){
	foreach($region as $k=>$v){
		if($v['pid']==$pid){
			$res = $v;
			$str = str_repeat($html,$repeat);
			$str = $str?"&nbsp;├".$str:'';
			$res['html'] = $str;
			@$arr[] = $res;
			$child = build_region($region,$v['id'],$repeat+1,$html);
			if(is_array($child)){
				$arr = array_merge($arr,$child);
			}
		}
		
	}
	return @$arr;
}