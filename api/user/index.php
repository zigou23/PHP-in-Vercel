<?php 
$br="<br/>";
echo '{"ip"="'.$_SERVER['REMOTE_ADDR'].'",'.$br;
echo '"ua"="'.$_SERVER['HTTP_USER_AGENT'].'"'.$br.'}';
