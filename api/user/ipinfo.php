<?php 
// 获取ipinfo信息=ipv4
function getIP4() /*获取客户端IP*/ 
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
// $ip4='https://ipinfo.io/';
echo '{"ipv4":';
$ip4web='https://ipinfo.io/'.getIP4();
$html4= file_get_contents($ip4web);
echo $html4.',';

// 从 ipv6-test.com 获取ipv6信息
if (@file_get_contents('https://v6.ipv6-test.com/api/myip.php') === false)
    $html6='{"ip":"0"}';
else{
    $ip6=file_get_contents('https://v6.ipv6-test.com/api/myip.php');
    $ip6web='https://ipinfo.io/'.$ip6;
    $html6=file_get_contents($ip6web);
}
echo '"ipv6":'.$html6.'}';


// 获取ua
// echo '"ua"="'.$_SERVER['HTTP_USER_AGENT'].'"}';
