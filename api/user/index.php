<?php 
error_reporting(0); //不输出错误
function getIP() {/*获取客户端IP地址*/ 
if (@$_SERVER["HTTP_X_FORWARDED_FOR"]) 
$ip = $_SERVER["HTTP_X_FORWARDED_FOR"]; 
else if (@$_SERVER["HTTP_CLIENT_IP"]) 
$ip = $_SERVER["HTTP_CLIENT_IP"]; 
else if (@$_SERVER["REMOTE_ADDR"]) 
$ip = $_SERVER["REMOTE_ADDR"]; 
else if (@getenv("HTTP_X_FORWARDED_FOR")) 
$ip = getenv("HTTP_X_FORWARDED_FOR"); 
else if (@getenv("HTTP_CLIENT_IP")) 
$ip = getenv("HTTP_CLIENT_IP"); 
else if (@getenv("REMOTE_ADDR")) 
$ip = getenv("REMOTE_ADDR"); 
else 
$ip = "0"; 
return $ip; 
}
if(is_array($_GET)&&count($_GET)>0){//判断是否有Get参数
    if (@$_GET['onlyip'] === '1')// 获取ip信息
        echo getIP();
    // ipinfo获取ip信息
    else if (@$_GET['ipinfo'] === '1'){
        $ip4web='https://ipinfo.io/'.getIP();
        $html4= file_get_contents($ip4web);
        echo $html4;
    }else if(isset($_GET["ip"])){
        $ip4web='https://ipinfo.io/'.$_GET['ip'];
        $html4= file_get_contents($ip4web);
        echo $html4;
    }
}else{// 输出ipv4地址+ua
    $result['ip'] = getIP();
    $result['ua'] = $_SERVER['HTTP_USER_AGENT'];
    $result['message'] = '?onlyip=1,ipinfo=1,ip=1.1.1.1';
    echo json_encode($result);
}