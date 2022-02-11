<?php
$str = file_get_contents('https://www.bing.com/HPImageArchive.aspx?format=js&idx=0&n=8');
$str = json_decode($str,true);
$arr = 0;
// random随机的,random=1,随机生成8张图片的任意一张.默认今天
if ($_GET['random'] === '1') {
    $arr  = mt_rand(0, 7);
    // echo "$arr";
}

// 参数值(0-7)，获取链接的第几个url
$value = $_GET['value'];
if ($value >= 1 && $value <= 7) {
    $arr = $value ;
}

$imgurl = 'https://www.bing.com'.$str['images'][$arr]['url'];

// 输出走不走服务器,不建议使用
if ($_GET['server'] === '1') {
    header('Content-Type: image/JPEG');
    @ob_end_clean();
    @readfile($imgurl);
    @flush();
    @ob_flush();
    exit();
}else{
    header("Location: {$imgurl}");
}
?>