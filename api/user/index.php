<?php 
function getRemoteIPAddress() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];

    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $_SERVER['REMOTE_ADDR'];
}
echo '{"ip"="'.getRemoteIPAddress().'",';
function getRemoteIPAddress2() {
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $_SERVER['REMOTE_ADDR'];
}
echo '"ip2"="'.getRemoteIPAddress2().'",';
echo '"ua"="'.$_SERVER['HTTP_USER_AGENT'].'"}';
