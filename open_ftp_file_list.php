<?php
//File: open_ftp_file_list.php

$tid = "1"; $table = "standard";
	if ($_POST['table'] == "deleted") {
		$table = "deleted";
		$tid = "2";
	}

include("mysqlconn.php");

//Select the MySQL database
mysql_select_db($database) or die("Could not select database $database .". mysql_error());

//query all results (*) from MySQL database
$qry_result = mysql_query("SELECT * FROM $table ORDER BY stro_id");

$n=0;
while($row = mysql_fetch_array( $qry_result )) { //will fetch one row in each cycle
$n++;

$stro = $row['stro'];
$ftp_ip = $row['ip'];
$ftp_port = $row['ftp_port'];
$ftp_user_name = $row['ftp_user_name'];
$ftp_pass = $row['ftp_pass'];


/////////////////////////////// COUNTRY INFO ////////////////////////////
$country = $row['country'];
$country_ext = $row['country_ext'];
$net_det = $row['whois_details'];

$ctip = " <b>Country:</b><br> ".$country." - ".$country_ext."<br><b>Details:</b><br>".$net_det ;
$image = "<img src=\"img/$country".".gif \" onmouseover=\"Tip('$ctip', BALLOON, true, ABOVE, true)\" onmouseout=\"UnTip()\">";
$country_tip = $image." - ".$country_ext;
$country_notip = "<img src=\"img/$country".".gif\">";


///////////////////////////////// SERVER INFO //////////////////////////////
$stat = $row['status'].".gif";

if ($stat == "offline.gif") {$stat2 = "Offline";}
if ($stat == "online.gif") {$stat2 = "Online";}
if ($stat == "nologin.gif") {$stat2 = "Could not login";}

$errorinfo = $row['error_message'];
$errorcode = $row['error_num'];
$contents = $row['ftp_contents'];
$result_error = "<b>Server Response:</b><br>".$errorinfo."<br>"."<b>Response Number:</b><br>".$errorcode."<br>".$contents;
$ntip = str_replace("'","\'",$result_error);
$ntip = str_replace(chr(13),"",$ntip);
$status_tip = "<img src='$stat' onmouseover=\"Tip('".$ntip."', BALLOON, true, ABOVE, true, WIDTH, '".$fmax."px')\" onmouseout='UnTip()'>";
$status_notip = "<img src='$stat'>";

if ($row['ssl_conn'] == 'SSL' || $row['ssl_conn'] == 'ssl') {
		$ssl = "<img src='img/ssl.gif'>";
	} else {
		$ssl = "";
	}

/////////////////////// TABLE CONSTRUCTION //////////////////////////
$id = $tid."_".$n; //++
echo "<tr id='tr_$id'><td><input id='c_$id' type='checkbox'></td>";			//checkbox
echo "<td><a href=\"javascript:clip('$stro')\">".$stro."</a></td>";	//stro
echo "<td>".$ftp_ip."</td>";				//IP
echo "<td>".$ssl."</td>";					//SSL
echo "<td>".$country_tip."</td>";			//Country ex: img + DE - Germany com tip
echo "<td>".$row['team']."</td>";			//Team
echo "<td>".$row['details_simple']."</td>";	//details
echo "<td>".$row['stro_type']."</td>";		//stro type
echo "<td>".$row['last_time_check']."</td>";//date
echo "<td id='l_$id' style=\"text-align:center\">".$status_tip."</td>";		//status & contents
echo "<td><input type='button' value='Check' class='bt' onClick='return submitForm($n,$tid)'></td>"; //check status
echo "<td> <img src='img/delete.gif' onClick=\"delete_('$id')\" onmouseover=\"Tip('Delete Line', BALLOON, true, ABOVE, true, WIDTH, '0px')\" onmouseout='UnTip()'> <img src='img/details.gif' onClick=\"togle('$id')\" onmouseover=\"Tip('Show Details', BALLOON, true, ABOVE, true, WIDTH, '0px')\" onmouseout='UnTip()'> <img src='img/edit.gif' onClick=\"edit_('$id')\" onmouseover=\"Tip('Edit Line', BALLOON, true, ABOVE, true, WIDTH, '0px')\" onmouseout='UnTip()'></td></tr>"; //show details

echo "<div id='diva$id' style='display:none'>Line:$id<br><br><b>IP: $ftp_ip </b><br><br> <b> Location:</b><br> $country_notip  $country - $country_ext <br><br><b>IP Details:</b><br> $net_det <br></div><div id='divb$id' style='display:none'><b>$stro<br><br> Status:</b> $stat2 $status_notip<br><br>$ntip</div>"; //hidden div with the details
}

mysql_close($dbconn);

?>