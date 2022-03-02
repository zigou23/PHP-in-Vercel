<?php 
function getIP() /*获取客户端IP地址*/ 
{
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

// ipinfo获取ip信息
if (@$_GET['ipinfo'] === '1'){
    $ip4web='https://ipinfo.io/'.getIP();
    $html4= file_get_contents($ip4web);
    echo $html4;
}
// 获取网页ua
else if (@$_GET['ua'] === '1')
    echo '{"ua":"'.$_SERVER['HTTP_USER_AGENT'].'"}';
// 获取ip信息
else if (@$_GET['ip'] === '1')
    echo '{"ip":"'.getIP().'"}';
// 输出ipv4地址+ua
else
    echo '{"ip":"'.getIP().'","ua":"'.$_SERVER['HTTP_USER_AGENT'].'"}';

    

