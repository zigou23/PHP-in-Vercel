<?php
// set_time_limit(1);
error_reporting(0);
header('content-type: application/json');
if(is_array($_GET)&&count($_GET)>0){//判断是否有Get参数
  if (strlen($_GET["qq"])>=1 && strlen($_GET["qq"])<=11) {
    $qq = $_GET["qq"];
    // s即spec,40(1.2).100(3).140(4).640(5) q2可以改成q qzone1可以是qzone&1.2.3.4
    $result['avatar'] = array('q1' => 'https://q1.qlogo.cn/g?b=qq&nk='.$qq.'&s=640', 'q2' => 'https://q2.qlogo.cn/headimg_dl?dst_uin='.$qq.'&spec=640', '100' => 'https://q1.qlogo.cn/g?b=qq&nk='.$qq.'&s=100', 'qzone100' => 'https://qlogo1.store.qq.com/qzone/'.$qq.'/'.$qq.'/100');
    // 获取qq昵称
    $data = file_get_contents('https://r.qzone.qq.com/fcg-bin/cgi_get_portrait.fcg?uins='.$qq);
    $data=iconv("GB2312","UTF-8",$data);
    preg_match('/portraitCallBack\((.*)\)/is',$data,$nick);
    $nick=$nick[1];
    $qqnickname = json_decode($nick, true)["$qq"][6];
    $result['nickname'] = $qqnickname;
    // 开始判断这个扣扣号是不是有真实用户信息返回
    if ($qqnickname) // 如果有，就可以返回JSON数据
      echo json_encode($result,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);//返回JSON数据,防止反斜杠
    else //如果没有，那么只能返回获取失败
      echo json_encode(array('status' => 'error','msg' => '获取用户信息失败'),JSON_UNESCAPED_UNICODE);

  }elseif (strlen($_GET["stickersid"])>=5 && strlen($_GET["stickersid"])<=11) {
    $data = file_get_contents('https://gxh.vip.qq.com/qqshow/admindata/comdata/vipEmoji_item_'.$_GET["stickersid"].'/xydata.js');
    
    echo $data;
  }else{
    echo json_encode(array('status' => '404'),JSON_UNESCAPED_SLASHES);//返回JSON数据,防止反斜杠
  }
}else{
  echo json_encode(array('status' => 'error'),JSON_UNESCAPED_SLASHES);//返回JSON数据,防止反斜杠
}