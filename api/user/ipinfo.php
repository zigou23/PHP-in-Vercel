<?php 
// 获取ip地址
function getRemoteIPAddress() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];

    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $_SERVER['REMOTE_ADDR'];
}
echo '{"ip":"'.getRemoteIPAddress().'",';
$web='https://ipinfo.io/'.getRemoteIPAddress();
echo '"web":"'.$web.'","message":';

$html= file_get_contents($web);
echo $html .'}';

// 获取ua
// echo '"ua"="'.$_SERVER['HTTP_USER_AGENT'].'"}';
