<?php //status_check.php

$line_n = intval($_POST['line']);
$tid = "1"; $table = "standard";
	if ($_POST['tid'] == 2) {
		$table = "deleted";
		$tid = "2";
	}
$line_n = (INT)$line_n - 1; //html list starts at 1 MySQL list starts at 0

include("mysqlconn.php");

//Select the MySQL database
mysql_select_db($database) or die("Could not select database $database .". mysql_error());

//get the corresponding row at the database
$qry_result = mysql_query("SELECT * FROM $table ORDER BY stro_id LIMIT $line_n,1") or die(mysql_error());
$row = mysql_fetch_array( $qry_result );

$ssl = $row['ssl_conn'];
$ftp_ip = $row['ip'];
$ftp_port = intval($row['ftp_port']);
$ftp_user_name = rawurlencode($row['ftp_user_name']);
$ftp_pass = rawurlencode($row['ftp_pass']);

$path = "/";
set_time_limit(10);
$ch = curl_init();

if($ssl == 'SSL' || $ssl == 'ssl') {
	curl_setopt($ch, CURLOPT_URL, "ftps://$ftp_user_name:$ftp_pass@$ftp_ip:$ftp_port$path");
} else {
	curl_setopt($ch, CURLOPT_URL, "ftp://$ftp_user_name:$ftp_pass@$ftp_ip:$ftp_port$path");
}
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 4);  
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_FTP_SSL, CURLFTPSSL_TRY); 			//added
	curl_setopt($ch, CURLOPT_FTP_USE_EPSV, true); 				//added
	curl_setopt($ch, CURLOPT_FTPSSLAUTH, CURLFTPAUTH_DEFAULT);	//added
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FTPLISTONLY, 0);

	$result['filelist'] = curl_exec($ch); //returns content
		
	$error_info = curl_error($ch);
	$error_info = str_replace("'","\'",$error_info);
	$error_info = str_replace(chr(13),"",$error_info);
	
	$error_num = strval(curl_errno($ch));
	$error_num = str_replace("'","\'",$error_num);
	$error_num = str_replace(chr(13),"",$error_num);

	curl_close($ch);

	$ftp_file_list = explode("\n", $result['filelist']);
	$fmax = 0;
	for ($i=0; $i < count($ftp_file_list); $i++) {		//process filelist
		$list_size = strlen($ftp_file_list[$i]); 
		if ($list_size > $fmax) $fmax = $list_size;
		$pos_3A = stripos($ftp_file_list[$i],chr(58)); // :
		$pos_0D = stripos($ftp_file_list[$i],chr(13)); // \n
		$sub = substr($ftp_file_list[$i],$pos_3A + 3, $pos_0D - $list_size); //extracted subtring from raw filename
		$ftpcontents .= $sub."<br>";
	}
	$ftpcontents = str_replace("'","\'",$ftpcontents);
	$ftpcontents = str_replace(chr(13),"",$ftpcontents);	
	$ftpcontents = "<b>FTP Contents:</b><br>".$ftpcontents;
	
	if(!$error_info) {
	$stat = "online"; // online
} else {
	switch(substr($error_info, -3, 3)) {
		case '530':
		$stat = "nologin"; // not logged in
		break;
		
		case '421':
		$stat = "nologin"; // too many users
		break;
		
		default:				
		if(substr($error_info, -27) == "No such file or directory.")
		{
			$stat = "online"; // online
		} 
		else 
		{
			if($error_info != "couldn't connect to host")
			{
			$stat = "offline";
			} 
			else 
			{
				$stat = "offline"; // offline
			} 
		} 
	} 
} 

$result_tip = $error_info."<br>"."<b>Response Number:</b><br>".$error_num."<br>".$ftpcontents;

// estava--> echo  "<img src='$stat".".gif' onmouseover=\"Tip('<b>Server Response:</b><br>".$result_tip."', BALLOON, true, ABOVE, true, WIDTH, '$fmax.px')\" onmouseout=\"UnTip()\">";

$status_tip = "<img src='$stat".".gif' onmouseover=\"Tip('<b>Server Response:</b><br>".$result_tip."', BALLOON, true, ABOVE, true, WIDTH, '$fmax.px')\" onmouseout=\"UnTip()\">";

$today = getdate();
$tdate = $today[mday]."-".$today[mon]."-".$today[year]." ".$today[hours].":".$today[minutes];

//get the correct stro_id
$data = mysql_query("SELECT stro_id FROM $table ORDER BY stro_id LIMIT $line_n,1") or die(mysql_error());
$result = mysql_fetch_array( $data );
$s_id = $result['stro_id'];

$data = mysql_query("SELECT status FROM $table WHERE stro_id = '$s_id' ") or die(mysql_error());
$result = mysql_fetch_array( $data );
$in_stat = $result['status'];

$data = mysql_query("SELECT last_time_online FROM $table WHERE stro_id = '$s_id' ") or die(mysql_error());
$result = mysql_fetch_array( $data );
$in_last_t = $result['last_time_online'];

if ($in_stat == "offline" && $stat == "online" || $in_stat == "nologin" && $stat == "online") {
$last_t = $tdate;
} else {
$last_t = $in_last_t;
}

$qry_result = mysql_query("UPDATE $table SET
last_time_check = '$tdate',
status = '$stat',
error_message = '$error_info',
error_num = '$error_num',
ftp_contents = '$ftpcontents',
fmax = '$fmax',
last_time_online = '$last_t'
WHERE stro_id = '$s_id'
") or die(mysql_error());

mysql_close($dbconn);

/////////////////////////////// COUNTRY INFO ////////////////////////////
$country = $row['country'];
$country_ext = $row['country_ext'];
$net_det = $row['whois_details'];
$ctip = " <b>Country:</b><br> ".$country." - ".$country_ext."<br><b>Details:</b><br>".$net_det ;
$image = "<img src=\"img/$country".".gif \" onmouseover=\"Tip('$ctip', BALLOON, true, ABOVE, true)\" onmouseout=\"UnTip()\">";
$country_tip = $image." - ".$country_ext;

if ($ssl == 'SSL' || $ssl == 'ssl') {
		$ssl = "<img src='img/ssl.gif'>";
	} else {
		$ssl = "";
	}

$line_n = (INT)$line_n + 1; //restore index to line_n
$id = $tid."_".$line_n;
$stro = $row['stro'];
echo "<td><input id='c_$id' type='checkbox'></td>";			//checkbox
echo "<td><a href=\"javascript:clip('$stro')\">".$stro."</a></td>";	//stro
echo "<td>".$row['ip']."</td>";				//IP
echo "<td>".$ssl."</td>";					//SSL
echo "<td>".$country_tip."</td>";			//Country ex: img + DE - Germany com tip
echo "<td>".$row['team']."</td>";			//Team
echo "<td>".$row['details_simple']."</td>";	//details
echo "<td>".$row['stro_type']."</td>";		//stro type
echo "<td>".$tdate."</td>";//date
echo "<td id='l_$id' style=\"text-align:center\">".$status_tip."</td>";		//status & contents
echo "<td><input type='button' value='Check' class='bt' onClick='return submitForm($line_n,$tid)'></td>"; //check status
echo "<td> <img src='img/delete.gif' onClick=\"delete_('$id')\" onmouseover=\"Tip('Delete Line', BALLOON, true, ABOVE, true, WIDTH, '0px')\" onmouseout='UnTip()'> <img src='img/details.gif' onClick=\"togle('$id')\" onmouseover=\"Tip('Show Details', BALLOON, true, ABOVE, true, WIDTH, '0px')\" onmouseout='UnTip()'> <img src='img/edit.gif' onClick=\"edit_('$id')\" onmouseover=\"Tip('Edit Line', BALLOON, true, ABOVE, true, WIDTH, '0px')\" onmouseout='UnTip()'></td>";
//this echo is a complete row in the table





?>