<?php
header('content-type: application/json');

$path = dirname(__FILE__);

// type属性，默认type=hitokoto.txt
if (isset($_GET['type']) && !empty($_GET['type'])) {
    $type = $_GET['type'];
    $file = file($path."/".$type.".txt");
} else {
    $file = file($path."/hitokoto.txt");
}

// 随机数(0--file-1)
$arr  = mt_rand( 0, count( $file ) - 1 );
$content  = trim($file[$arr]);

// 字符集，默认utf-8
if (isset($_GET['charset']) && !empty($_GET['charset'])) {
    $charset = $_GET['charset'];
    if (strcasecmp($charset,"gbk") == 0 ) {
        $content = mb_convert_encoding($content,'gbk', 'utf-8');
    }
} else {
    $charset = 'utf-8';
}

// encode属性，默认encode=文本
// encode=js 时
if (@$_GET['encode'] === 'js') {
    echo "function zigouapi1(){document.write('" . $content ."');}";

// encode=js2 时，模仿的hitokoto，直接生成参数
} else if (@$_GET['encode'] === 'js2'){
    echo "(function zigouapi1(){var zigouapi1='" . $content ."';var dom=document.querySelector('#zigouapi1');Array.isArray(dom)?dom[0].innerText=zigouapi1:dom.innerText=zigouapi1;})()";
} else {
    echo $content;
}

