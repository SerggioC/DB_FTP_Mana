<?php //add_ftp_status.php

$sent_ftp = $_POST['stro'];

if (!preg_match('/((?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?))(?![\\d])/', $sent_ftp)) {
	return;
}

echo $sent_ftp;
check_it($sent_ftp);

function check_it($stro) {
$ftp_string = str_ireplace("ftp://","",$stro);
$at_pos = strrpos($ftp_string,"@");
$ip_port = substr($ftp_string,$at_pos + 1);
$ftp_ip = strtok($ip_port, ":");
$ftp_port = intval(strtok(":"));
$user_pass = substr($ftp_string,0,$at_pos);
$ftp_user_name = rawurlencode(strtok($user_pass, ":"));
$ftp_pass = rawurlencode(strtok(":"));

$path = "/";
set_time_limit(10);
$ssl = 0;
$ch = curl_init();
$error_2 = "";

if($ssl == 1) {
	curl_setopt($ch, CURLOPT_URL, "ftps://$ftp_user_name:$ftp_pass@$ftp_ip:$ftp_port$path");
} elseif($ssl == 0) {
	curl_setopt($ch, CURLOPT_URL, "ftp://$ftp_user_name:$ftp_pass@$ftp_ip:$ftp_port$path");
}

	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 4);  
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_FTP_SSL, CURLFTPSSL_TRY); //added
	curl_setopt($ch, CURLOPT_FTP_USE_EPSV, true); 	//added
	curl_setopt($ch, CURLOPT_FTPSSLAUTH, CURLFTPAUTH_DEFAULT); //added
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FTPLISTONLY, 0);

	$result['filelist'] = curl_exec($ch); //returns content
	$result['error'] = curl_error($ch);
	$result['errno'] = curl_errno($ch);
	//$header = curl_getinfo($ch); //not needed
	
	$error_info = $result['error'];

	curl_close($ch);
	
	if(!$result['error']) {
	$result['errorcode'] = '1'; // online
} else {
	switch(substr($result['error'], -3, 3)) {
		case '530':
		$result['errorcode'] = '2'; // not logged in
		break;
		
		case '421':
		$result['errorcode'] = '3'; // too many users
		break;
		
		default:				
		if(substr($result['error'], -27) == "No such file or directory.")
		{
			$result['errorcode'] = '1'; // online
		} 
		else 
		{
			if($result['error'] != "couldn't connect to host")
			{
			$result['errorcode'] = '1';
			$error_2 = "couldn t connect to host";
			} 
			else 
			{
				$result['errorcode'] = '0'; // offline
			} // end if
		} // end if
	} // end switch
} // end if

$result_error = strval($result['error']);

$online = "online.gif";
$offline = "offline.gif";
$nologin = "nologin.gif";

if ($result['errorcode'] == '0')
$stat = $offline;
if ($result['errorcode'] == '1')
$stat = $online;
if ($result['errorcode'] == '2')
$stat = $nologin;
if ($result['errorcode'] == '3')
$stat = $nologin;
if ($error_2 != ""){
$result_error = $error_2;
$stat = $nologin;
}

$ftp_file_list = explode("\n", $result['filelist']);

$fmax = 0;
$contents = "<b>FTP Contents:</b><br>";

for ($i=0; $i < count($ftp_file_list); $i++) {
$list_size = strlen($ftp_file_list[$i]); 
if ($list_size > $fmax) $fmax = $list_size;
$pos_3A = stripos($ftp_file_list[$i],chr(58)); // :
$pos_0D = stripos($ftp_file_list[$i],chr(13)); // \n

$sub = substr($ftp_file_list[$i],$pos_3A + 3, $pos_0D - $list_size); //extracted subtring from raw filename
$contents = $contents.$sub."<br>";
}

$errno = strval($result['errno']);
$result_error = $error_info."<br>"."<b>Response Number:</b><br>".$errno."<br>".$contents;
$result_tip = str_replace("'","\'",$result_error);
$result_tip = str_replace(chr(13),"",$result_tip);

//$result_tip = urlencode($result_tip).$result_tip;    // <-  VERIFICAR RETURNS PARA PARTIR O NOME DAS RELEASES  HEX:0D
//$result_tip = $contents;
echo "<img src=\"$stat\" onmouseover=\"Tip('<b>Server Response:</b><br>".$result_tip."', BALLOON, true, ABOVE, true, WIDTH, '$fmax.px')\" onmouseout=\"UnTip()\">";

//echo($stat);
}




?>