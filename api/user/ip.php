<?php 
$a = $_SERVER["HTTP_X_FORWARDED_FOR"];
echo 'a'.$a."\n";
$aa = getenv("HTTP_X_FORWARDED_FOR");
echo 'aa'.$aa."\n";
$b = $_SERVER["HTTP_CLIENT_IP"];
echo 'b'.$b."\n";
$bb = getenv("HTTP_CLIENT_IP");
echo 'bb'.$bb."\n";
$c = $_SERVER["REMOTE_ADDR"];
echo 'c'.$c."\n";
$cc = getenv("REMOTE_ADDR");
echo 'cc'.$cc."\n";