<?php
function ripe_riper($ip){
$sock = fsockopen("whois.ripe.net", 43, $errno, $errstr, 20);
if (!$socks){
fputs($sock, $ip."\n");
while (!feof($sock))
	$buffer .= fgets($sock, 10240);
fclose($sock);
var_dump($buffer);
} else {
	unset($sock);
	$msg .= "Server down";
}
}
?>