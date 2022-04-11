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
// header('Content-Type: text/plain;charset=UTF-8');
header('content-type: application/json');
if(is_array($_GET)&&count($_GET)>0){ // 判断是否有Get参数
    // onlyip 获取ip信息
    if (@$_GET['onlyip'] === '1')
        echo getIP();
    // ipinfo=1 || ipinfo的数值在1.1.1.1(7)到225.225.225.225(15)之间
    elseif (@$_GET['ipinfo'] === '1' || strlen($_GET["ipinfo"]) >= 7 && strlen($_GET["ipinfo"]) <=39) {
        $api = '';
        if (@$_SERVER['HTTP_HOST'] == 'api.qsim.top') //判断是否为自己的网站
            $api = '/json?token=2b0823d323bd55'; //是自己的网站会加上token(私有)
        if (@$_GET['ipinfo'] === '1')
            $ip4web='https://ipinfo.io/'.getIP().$api; //是自己的用自己的接口，不是用通用接口
        else //处理ipinfo=ip地址 的情况
            $ip4web='https://ipinfo.io/'.$_GET['ip'].$api;
        $html4= file_get_contents($ip4web); // 输出
        echo $html4;
    //是测试接口 使用ipinfo源
    }elseif (strlen($_GET["ipt"]) >= 6 && strlen($_GET["ipt"]) <=39 || @$_GET['ipt'] === '1' || @$_GET['ipt'] === '2') { 
        if (@$_GET['ipt'] === '2') // ipt=2 获取当前cf ip
            $ip4web='https://p.ffvv.ml/https/prox.zigou23.tk/https/ipinfo.io/widget/';
        elseif (@$_GET['ipt'] === '1') //ipt=1 获取访问者的ip
            $ip4web='https://p.ffvv.ml/https/prox.zigou23.tk/https/ipinfo.io/widget/'.getIP();
        else // ipt=asn或者ip地址
            $ip4web='https://p.ffvv.ml/https/prox.zigou23.tk/https/ipinfo.io/widget/'.$_GET["ipt"];
        $html4= file_get_contents($ip4web); 
        echo $html4;
    //db-ip.com 的接口
    }elseif(strlen($_GET["dbip"]) >= 6 && strlen($_GET["dbip"]) <=39 || @$_GET['dbip'] === '1'){
        if(@$_GET['dbip'] === '1') // 获取访问者的ip
            // $ip4web='https://api.db-ip.com/v2/p31e4d59ee6ad1a0b5cc80695a873e43a8fbca06/self?convertCurrencies';
            $ip4web='https://db-ip.com/demo/home.php?s='.getIP();
        else //ipv4&ipv6&asn
            $ip4web='https://db-ip.com/demo/home.php?s='.$_GET['dbip'];
        $html4= file_get_contents($ip4web); // 输出
        echo $html4;
    }else{ //提示参数
        $result['msg'] = 'onlyip=1,ipinfo=1/1.1.1.1(ipinfo.io),dbip=1(!slow)/1.1.1.1/ASN(db-ip.com),ipt=1/1.1.1.1/ASN(!test)';
        echo json_encode($result);
    }
}else{// 输出ipv4地址+ua
    $result['ip'] = getIP();
    $result['ua'] = $_SERVER['HTTP_USER_AGENT'];
    echo json_encode($result);
}