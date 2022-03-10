<?php
// & -php无法识别，需转换成 %26 无解 php会在&处分割
// set_time_limit(1); //限制超时2s停止
  $url = $_GET['url'];
  $web = file_get_contents($url);
  // $file = strlen($web);
  if(@$_GET['json'] === '1'){
    if(!empty($url)){ //有值，组装数据
      // if ($file < 1500){ } //数值小，则输出
      $result['status'] = 200;
      $result['data'] = file_get_contents($url);
      echo json_encode($result); //返回JSON数据
    }else //无值，返回状态码220
      $result['status'] = 220;
  }
  else{
    header('Content-Type: TXT');
    echo $web;
  }
