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

/**
 * POST发送
 * @param  [type] $url  [description]
 * @param  [type] $data [description]
 * @return [type]       [description]
 */
function http_post($url, $data=null) {  
    $ch = curl_init();  
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 
    if(!empty($data)){
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    
    $output = curl_exec($ch);  
    curl_close($ch);  
    return $output;  
}

/**
 * 发送验证码
 */
function send_sms($phone,$content){
	$statusStr = array(
		"0" => "短信发送成功",
		"-1" => "参数不全",
		"-2" => "服务器空间不支持,请确认支持curl或者fsocket，联系您的空间商解决或者更换空间！",
		"30" => "密码错误",
		"40" => "账号不存在",
		"41" => "余额不足",
		"42" => "帐户已过期",
		"43" => "IP地址限制",
		"50" => "内容含有敏感词",
		"51" => "手机号码不正确",
		);
	$smsapi = "http://api.smsbao.com/";
	$user = config('sms.username'); //短信平台帐号
	$pass = md5(config('sms.password')); //短信平台密码
	$content = config('sms.sign')?"【".config('sms.sign')."】".$content:$content;
	$sendurl = $smsapi."sms?u=".$user."&p=".$pass."&m=".$phone."&c=".urlencode($content);
	$result =http_post($sendurl) ;
	return $statusStr[$result];
}

/**
 * 短信查询
 */
function sms_query(){
	$url = "http://www.smsbao.com/query";
	$user = config('sms.username'); //短信平台帐号
	$pass = md5(config('sms.password')); //短信平台密码
	$url.="?u=".$user."&p=".$pass;
	$result = http_post($url);
	$statusStr = array(
		"0" => "短信发送成功",
		"-1" => "参数不全",
		"-2" => "服务器空间不支持,请确认支持curl或者fsocket，联系您的空间商解决或者更换空间！",
		"30" => "密码错误",
		"40" => "账号不存在",
		"41" => "余额不足",
		"42" => "帐户已过期",
		"43" => "IP地址限制",
		"50" => "内容含有敏感词"
		);
	$sms_info = explode("\n",$result);
	if($sms_info[0]!=0){
		return $statusStr[$sms_info[0]];
	}
	$info = explode(",",$sms_info[1]);
	return "剩余条数：".$info[1];
}

function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=false,$sl='...'){
	$str = strip_tags($str);
    $str = str_replace("&nbsp;"," ",$str);
    $str = trim($str);
    $str = str_replace("\x0B"," ",$str);
    $str = str_replace(" ","",$str);
    $str = str_replace("\n","",$str);
	if(function_exists("mb_substr")){
		if($suffix&&strlen($str)/2>$length){
			return mb_substr($str, $start, $length, $charset).$sl;
		}else{
			return mb_substr($str, $start, $length, $charset);
		}
	}elseif(function_exists('iconv_substr')) {
		if($suffix&&strlen($str)/2>$length){
			return iconv_substr($str,$start,$length,$charset).$sl;
		}else{
			return iconv_substr($str,$start,$length,$charset);
		}
	}

 	$re['utf-8'] = "/[x01-x7f]|[xc2-xdf][x80-xbf]|[xe0-xef][x80-xbf]{2}|[xf0-xff][x80-xbf]{3}/";
 	$re['gb2312'] = "/[x01-x7f]|[xb0-xf7][xa0-xfe]/";
 	$re['gbk'] = "/[x01-x7f]|[x81-xfe][x40-xfe]/";
 	$re['big5'] = "/[x01-x7f]|[x81-xfe]([x40-x7e]|xa1-xfe])/";
 	preg_match_all($re[$charset], $str, $match);
 	$slice = join("",array_slice($match[0], $start, $length));
 	if($suffix) return $slice.$sl;
 		return $slice;
}

function make_head($url){
	return $url?"http://".$_SERVER['HTTP_HOST'].$url:'';
}

function get_add_time($time){
	if($time>1&&$time<3600){
		$str = floor($time/60).'分钟前';
	}else if($time>3600&&$time<3600*24){
		$str = floor($time/3600).'小时前';
	}else if($time>3600*24&&$time<3600*24*30){
		$str = floor($time/(3600*24)).'天前';
	}else if($time>3600*24*30&&$time<3600*24*30*365){
		$str = floor($time/(3600*24*30)).'个月前';
	}else{
		$str = floor($time/(3600*24*365)).'年前';
	}

	return $str;
}

function fac($item,$arr){
	if(!is_array($arr)){
		return;
	}
	if(in_array($item,$arr)){
		return 'checked';
	}
}

function get_sub_id($id){
	static $ids = [];
	$list = db('region')->where('pid',$id)->select();
	foreach($list as $v){
		$ids[] = $v['id'];
		get_sub_id($v['id']);
	}
	return $ids;
}

function getTree($items,$id='id',$pid='pid',$son = 'children') {
  	$tree = array(); //格式化的树
	 $tmpMap = array(); //临时扁平数据
	    
	foreach ($items as $item) {
	    $tmpMap[$item[$id]] = $item;
	}
	    
	foreach ($items as $item) {
	    if (isset($tmpMap[$item[$pid]])) {
	      	$tmpMap[$item[$pid]][$son][] = &$tmpMap[$item[$id]];
	    } else {
	      	$tree[] = &$tmpMap[$item[$id]];
	    }
	}
	unset($tmpMap);
	return $tree;
}