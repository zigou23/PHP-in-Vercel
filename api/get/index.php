<?php
set_time_limit(1); 
error_reporting(0); //不输出错误
header('Content-Type: text/plain;charset=UTF-8');
if(is_array($_GET)&&count($_GET)>0){//判断是否有Get参数
  if(isset($_GET["file"])){//判断file的参数是否存在,isset用来检测变量是否设置,返回T&F
    if(isset($_GET["url"])){// url=?
      $file=$_GET["file"];
      $url = 'https://'.$_GET['url'].'.'.$file;
      $web = file_get_contents($url);
      if(@$_GET['json'] === '1'){ // JSON数值时
        $result['status'] = 200;
        $result['data'] = $web;
        echo json_encode($result); //返回JSON数据
      }elseif ($file === 'png' || $file === 'webp') //if仅使用这几个类型
        echo $web;
      elseif ($file === 'js' || $file === 'css') {
        echo "/* DO NOT SHARE WITH OTHERS */\n";
        echo $web;
      }
    }
  }
}else
  echo 'What would you like to do? Nothing in there!';