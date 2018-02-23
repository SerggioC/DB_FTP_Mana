<?php
include("whois_ripper.php");
$sent_ftp = $_POST['stro'];

$sent_ftp = str_replace("\n","",$sent_ftp);
$sent_ftp = str_replace("\r","",$sent_ftp);
$sent_ftp = str_replace(" ","",$sent_ftp);

if ($sent_ftp == "") {
	echo "Country";
	return;
}

$ip1 = substr( $sent_ftp, strrpos($sent_ftp,"@")+1, strpos($sent_ftp , "." , strrpos($sent_ftp,"@")) - strrpos($sent_ftp,"@")-1 );

//var_dump($ip1);

if (!preg_match('/((?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?))(?![\\d])/', $sent_ftp) || $ip1 > 255 || strlen(strval($ip1)) > 3) {
    echo "Wrong ftp format. Use: <br> ftp://user:pass@123.123.123.123:port";
	return;
}
$ftp_string = str_ireplace("ftp://","",$sent_ftp);
$at_pos = strrpos($ftp_string,"@");
$ip_port = substr($ftp_string,$at_pos + 1);
$ftp_ip = strtok($ip_port, ":");

ripe_riper($ftp_ip);
?>