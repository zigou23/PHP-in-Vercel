<?php 
$br="<br/>";
echo '{"ip"="'.$_SERVER['REMOTE_ADDR'].'",'.$br;
echo '"ua"="'.$_SERVER['HTTP_USER_AGENT'].'"'.$br.'}';
function getRemoteIPAddress() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];

    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $_SERVER['REMOTE_ADDR'];
}
echo getRemoteIPAddress();