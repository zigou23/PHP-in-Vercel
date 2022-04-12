<?php
set_time_limit(1); 
error_reporting(0); //不输出错误
header('Content-Type: text/plain;charset=UTF-8');
if(is_array($_GET)&&count($_GET)>0){//判断是否有Get参数
  if(isset($_GET["type"])){//判断 type 的参数是否存在,isset用来检测变量是否设置,返回T&F
    if(isset($_GET["url"])){// url=?
      $type=$_GET["type"];
      $url = 'https://'.$_GET['url'].'.'.$type;
      $web = file_get_contents($url);
      if(@$_GET['json'] === '1'){ // JSON数值时
        $result['status'] = 200;
        $result['data'] = $web;
        echo json_encode($result,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE); //返回JSON数据
      }elseif ($type === 'png' || $type === 'webp') //if仅使用这几个类型
        echo $web;
      elseif ($type === 'js' || $type === 'css') {
        echo "/* DO NOT SHARE WITH OTHERS */\n";
        echo $web;
      }
    }
  }
}else
  echo 'Nothing';
