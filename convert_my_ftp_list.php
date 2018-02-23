<?php //convert_my_ftp_list.php

$loc_2_digit = array('AD' => 'Andorra', 'AE' => 'United Arab Emirates', 'AF' => 'Afghanistan', 'AG' => 'Antigua And Barbuda', 'Ai' => 'Anguilla'
  , 'AL' => 'Albania', 'AM' => 'Armenia', 'AN' => 'Netherlands Antilles', 'AO' => 'Angola', 'AP' => 'Non-Spec Asia Pas Location'
  , 'AR' => 'Argentina', 'AS' => 'American Samoa', 'AT' => 'Austria', 'AU' => 'Australia', 'AW' => 'Aruba'
  , 'AX' => 'Åland Islands', 'AZ' => 'Azerbaijan', 'BA' => 'Bosnia And Herzegowina', 'BB' => 'Barbados', 'BD' => 'Bangladesh'
  , 'BE' => 'Belgium', 'BF' => 'Burkina Faso', 'BG' => 'Bulgaria', 'BH' => 'Bahrain', 'BI' => 'Burundi'
  , 'BJ' => 'Benin', 'BM' => 'Bermuda', 'BN' => 'Brunei Darussalam', 'BO' => 'Bolivia', 'BR' => 'Brazil'
  , 'BS' => 'Bahamas', 'BT' => 'Bhutan', 'BW' => 'Botswana', 'BY' => 'Belarus', 'BZ' => 'Belize'
  , 'CA' => 'Canada', 'CD' => 'Congo The Democratic Republic Of The', 'CF' => 'Central African Republic', 'CG' => 'Congo', 'CH' => 'Switzerland'
  , 'CI' => 'Cote D\'Ivoire', 'CK' => 'Cook Islands', 'CL' => 'Chile', 'Cm' => 'Cameroon', 'CN' => 'China'
  , 'CO' => 'Colombia', 'CR' => 'Costa Rica', 'CS' => 'Serbia And Montenegro (Formally Czechoslovakia)', 'CU' => 'Cuba', 'CV' => 'Cape Verde'
  , 'CY' => 'Cyprus', 'CZ' => 'Czech Republic', 'DE' => 'Germany', 'DJ' => 'Djibouti', 'DK' => 'Denmark'
  , 'DO' => 'Dominican Republic', 'DZ' => 'Algeria', 'EC' => 'Ecuador', 'EE' => 'Estonia', 'EG' => 'Egypt'
  , 'ER' => 'Eritrea', 'ES' => 'Spain', 'ET' => 'Ethiopia', 'EU' => 'European Union', 'FI' => 'Finland'
  , 'FJ' => 'Fiji', 'Fm' => 'Micronesia Federated States Of', 'FO' => 'Faroe Islands', 'FR' => 'France', 'GA' => 'Gabon'
  , 'GB' => 'United Kingdom', 'GD' => 'Grenada', 'GE' => 'Georgia', 'GF' => 'French Guiana', 'GG' => 'Guernsey'
  , 'GH' => 'Ghana', 'GI' => 'Gibraltar', 'GL' => 'Greenland', 'GM' => 'Gambia', 'GP' => 'Guadeloupe'
  , 'GR' => 'Greece', 'GT' => 'Guatemala', 'GU' => 'Guam', 'GW' => 'Guinea-Bissau', 'GY' => 'Guyana'
  , 'HK' => 'Hong Kong', 'HN' => 'Honduras', 'HR' => 'Croatia (Local Name: Hrvatska)', 'HT' => 'Haiti', 'HU' => 'Hungary'
  , 'ID' => 'Indonesia', 'IE' => 'Ireland', 'IL' => 'Israel', 'IM' => 'Isle Of Man', 'IN' => 'India'
  , 'IO' => 'British Indian Ocean Territory', 'IQ' => 'Iraq', 'IR' => 'Iran (Islamic Republic Of)', 'IS' => 'Iceland', 'IT' => 'Italy'
  , 'JE' => 'Jersey', 'JM' => 'Jamaica', 'Jo' => 'Jordan', 'JP' => 'Japan', 'KE' => 'Kenya'
  , 'KG' => 'Kyrgyzstan', 'KH' => 'Cambodia', 'KI' => 'Kiribati', 'KN' => 'Saint Kitts And Nevis', 'KR' => 'Korea Republic Of'
  , 'KW' => 'Kuwait', 'KY' => 'Cayman Islands', 'KZ' => 'Kazakhstan', 'LA' => 'Lao People\'S Democratic Republic', 'LB' => 'Lebanon'
  , 'LC' => 'Saint Lucia', 'LI' => 'Liechtenstein', 'LK' => 'Sri Lanka', 'LR' => 'Liberia', 'LS' => 'Lesotho'
  , 'LT' => 'Lithuania', 'LU' => 'Luxembourg', 'LV' => 'Latvia', 'LY' => 'Libyan Arab Jamahiriya', 'MA' => 'Morocco'
  , 'MC' => 'Monaco', 'MD' => 'Moldova Republic Of', 'ME' => 'Montenegro', 'MG' => 'Madagascar', 'MH' => 'Marshall Islands'
  , 'MK' => 'Macedonia The Former Yugoslav Republic Of', 'ML' => 'Mali', 'MM' => 'Myanmar', 'MN' => 'Mongolia', 'MO' => 'Macau'
  , 'MP' => 'Northern Mariana Islands', 'MR' => 'Mauritania', 'MS' => 'Montserrat', 'MT' => 'Malta', 'MU' => 'Mauritius'
  , 'MV' => 'Maldives', 'MW' => 'Malawi', 'MX' => 'Mexico', 'MY' => 'Malaysia', 'MZ' => 'Mozambique'
  , 'NA' => 'Namibia', 'NC' => 'New Caledonia', 'NF' => 'Norfolk Island', 'NG' => 'Nigeria', 'NI' => 'Nicaragua'
  , 'NL' => 'Netherlands', 'NO' => 'Norway', 'NP' => 'Nepal', 'NR' => 'Nauru', 'NU' => 'Niue'
  , 'NZ' => 'New Zealand', 'OM' => 'Oman', 'PA' => 'Panama', 'PE' => 'Peru', 'PF' => 'French Polynesia'
  , 'PG' => 'Papua New Guinea', 'PH' => 'Philippines', 'PK' => 'Pakistan', 'PL' => 'Poland', 'PR' => 'Puerto Rico'
  , 'PS' => 'Palestinian Territory Occupied', 'PT' => 'Portugal', 'PW' => 'Palau', 'PY' => 'Paraguay', 'QA' => 'Qatar'
  , 'RO' => 'Romania', 'RS' => 'Serbia', 'RU' => 'Russian Federation', 'RW' => 'Rwanda', 'SA' => 'Saudi Arabia'
  , 'SB' => 'Solomon Islands', 'SC' => 'Seychelles', 'SD' => 'Sudan', 'SE' => 'Sweden', 'SG' => 'Singapore'
  , 'SI' => 'Slovenia', 'SK' => 'Slovakia (Slovak Republic)', 'SL' => 'Sierra Leone', 'SM' => 'San Marino', 'SN' => 'Senegal'
  , 'SR' => 'Suriname', 'SV' => 'El Salvador', 'SY' => 'Syrian Arab Republic', 'SZ' => 'Swaziland', 'TC' => 'Turks And Caicos Islands'
  , 'TG' => 'Togo', 'TH' => 'Thailand', 'TJ' => 'Tajikistan', 'TM' => 'Turkmenistan', 'TN' => 'Tunisia'
  , 'TO' => 'Tonga', 'TR' => 'Turkey', 'TT' => 'Trinidad And Tobago', 'TV' => 'Tuvalu', 'TW' => 'Taiwan Province Of China'
  , 'TZ' => 'Tanzania United Republic Of', 'UA' => 'Ukraine', 'UG' => 'Uganda', 'US' => 'United States', 'UY' => 'Uruguay'
  , 'UZ' => 'Uzbekistan', 'VA' => 'Holy See (Vatican City State)', 'VE' => 'Venezuela', 'VG' => 'Virgin Islands (British)', 'VI' => 'Virgin Islands (U.S.)'
  , 'VN' => 'Viet Nam', 'VU' => 'Vanuatu', 'WF' => 'Wallis And Futuna Islands', 'WS' => 'Samoa', 'YE' => 'Yemen'
  , 'ZA' => 'South Africa', 'ZM' => 'Zambia', 'ZW' => 'Zimbabwe', 'ZZ' => 'Reserved');

set_time_limit(0);
$filename = "my_ftp_list.txt";
$file=fopen($filename,"r") or exit("Unable to open $filename"); //abre o ficheiro para leitura
$contents = fread($file, filesize($filename)); //read all the file to $contents
fclose($file); //close 
$lines = explode("\n", $contents);
$lines = array_unique($lines); 			//only unique entries. Dupes will be ignored.
$lines = str_replace("\n","",$lines); 	//
$lines = str_replace("\r","",$lines);	// remove spaces and returns
$lines = str_replace(" ","",$lines);  	//
$lines = array_keys(array_flip($lines)); //restart indexes

$ip = array();

for ($n = 0; $n < count($lines); $n++){ //get all usernames, pwds, IPs, ports to diferent arrays
$line_details[$n] = explode(chr(9),$lines[$n]); //uma matriz $line_details
$stro = $line_details[$n][0];
$ftp_string = str_ireplace("ftp://","",$stro);
$at_pos = strrpos($ftp_string,"@");
$ip_port = substr($ftp_string,$at_pos + 1);
$ip[$n] = strtok($ip_port, ":");
$ftp_port[$n] = strtok(":");
$user_pass = substr($ftp_string,0,$at_pos);
$ftp_user_name[$n] = strtok($user_pass, ":");	//$ftp_user_name = rawurlencode(strtok($user_pass, ":"));
$ftp_pass[$n] = strtok(":");					//$ftp_pass = rawurlencode(strtok(":"));
}//endfor

$ip_unique1 = array_unique($ip); //ip's únicos, dont want to be banned from the whois servers, so minimize requests.
$dup_ip = array_diff_assoc($ip, $ip_unique1); //ip's duplicados, not needed
$ip_unique = array_keys(array_flip($ip_unique1)); // restart indexes, new keys

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////  START GET COUNTRY DETAILS   /////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
for ($i=0; $i<count($ip_unique); $i++) {
$ipu = $ip_unique[$i];	

$ch = curl_init();
//$ripe_url = "http://www.db.ripe.net/whois?form_type=simple&full_query_string=&searchtext=$ip&do_search=Search";
//$ripe_url = "http://www.iptuga.com/index.php?ip=$ip";
//$ripe_url = "http://whois.domaintools.com/$ip";

$xpcu = ceil(count($ip_unique)/3);
if ($i < $xpcu) {
$ripe_url="http://whois.europeregistry.com/displayWhois.php?zone=$ipu&Submit=Check+Domain" //global
} else if ($i >= $xpcu && $i < 2*$xpcu){
$ripe_url="http://www.zoneedit.com/whois.html?zone=$ipu";	//global
} else if ($i >= 2*$xpcu){
$ripe_url="http://www.ratite.com/whois/whois.cgi?domain=$ipu"; 		//global
}

  $header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,"; 
  $header[1] = "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5"; 
  $header[2] = "Cache-Control: max-age=0"; 
  $header[3] = "Connection: keep-alive"; 
  $header[4] = "Keep-Alive: 300"; 
  //$header[5] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7"; 
  //$header[6] = "Accept-Language: en-us,en;q=0.5"; 

	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch, CURLOPT_USERAGENT, "Opera/9.25 (Windows NT 5.1; U; en)");
	curl_setopt($ch, CURLOPT_ENCODING, "HTTP_ACCEPT_ENCODING:deflate, gzip, x-gzip, identity, *;q=0");
	curl_setopt($ch, CURLOPT_URL, $ripe_url);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 4);  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	$result['content'] = curl_exec($ch); //returns content
	curl_close($ch);

$dump = $result['content'];

// $pre_pos = stripos($dump, "<PRE>");			//firt position of <pre>
// $last_pre_pos = strripos($dump, "</PRE>")+6; 	//last position of </pre>
// $dump = substr($dump, $pre_pos, $last_pre_pos - $pre_pos );
$dump = preg_replace("/(<[^>]+>)*(<[^>]+>)/is", "", $dump); //remove html entities

if ( strpos($dump, "OrgName") == false ) { //if false -> exec //if you dont find orgname proceed!
	$pos_adr = strpos($dump,"country");
	$pos_nl_adr = strpos($dump, "\n", $pos_adr);
	$country = substr($dump, $pos_adr, $pos_nl_adr - $pos_adr);
	$country = str_replace(" ", "", $country);
	$country = strtoupper(substr($country, 8, 2));
	$country_ext = $loc_2_digit[$country];
	if($country_ext == "" ) { $country = "unn"; $country_ext = "Unknown";}
	$pos_range = strpos($dump,"inetnum");
	$net_det = substr($dump , $pos_range , $pos_adr - $pos_range );
	$net_det = str_replace("inetnum","IP Range",$net_det);
	$net_det = str_replace("'","\'",$net_det);
	$net_det = str_replace("\"","\'",$net_det);
	$net_det = str_replace("\n","<br>",$net_det);
	$net_det = str_replace("\r","<br>",$net_det);
	//echo $net_det."<br><br>";
	$result_tip = " <b>Country:</b><br> ".$country." - ".$country_ext."<br><b>Details:</b><br>".$net_det ;
	$image = "<img src=\"img/$country".".gif \" onmouseover=\"Tip('$result_tip', BALLOON, true, ABOVE, true)\" onmouseout=\"UnTip()\">";
	$country_tdi[$i] = $image." - ".$country_ext;
	//echo $result_tip;

} elseif ( strpos($dump, "OrgName") != false ) {

 	$pos_ctr = strpos($dump,"Country");
	$pos_nl_ctr = strpos($dump, "\n", $pos_ctr);
	$country = substr($dump, $pos_ctr, $pos_nl_ctr - $pos_ctr);
	$country = str_replace(" ", "", $country);
	$country = strtoupper(substr($country, 8, 2));
	$country_ext = $loc_2_digit[$country];
	if($country_ext == "" ) { $country = "unn"; $country_ext = "Unknown";}
	$pos_org = strrpos($dump,"OrgName");
	$net_det = substr($dump , $pos_org , $pos_ctr - $pos_org );
	$pos_range = strpos($dump,"NetRange");
	$pos_nl_range = strpos($dump,"\n",$pos_range);
	$range = substr($dump, $pos_range, $pos_nl_range - $pos_range);
	$net_det = $range.$net_det;
	$net_det = str_replace("'","\'",$net_det);
	$net_det = str_replace("\"","\'",$net_det);
	$net_det = str_replace("\n","<br>",$net_det);
	$net_det = str_replace("\r","<br>",$net_det);
	//echo $net_det."<br><br>";
	$result_tip = " <b>Country:</b><br> ".$country." - ".$country_ext."<br><b>Details:</b><br>".$net_det ;
	$image = "<img src=\"img/$country".".gif \" onmouseover=\"Tip('$result_tip', BALLOON, true, ABOVE, true)\" onmouseout=\"UnTip()\">";
	$country_tdi[$i] = $image." - ".$country_ext;
	} else {
	$country_tdi[$i] = "<img src=\"img/unn.gif\" > - Unknown";
	}

}//endfor whois riper

for ($i=0; $i<count($ip); $i++){			//repopulate ip details
	for ($j=0; $j<count($ip_unique); $j++){
		if($ip[$i] == $ip_unique[$j]) {
		$country_td[$i] = $country_tdi[$j];
		}
	}
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////   START GET STATUS DETAILS AND CONTENTS FOR ALL UNIQUE IPs   /////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$path = "/";

for ($n = 0; $n < count($lines); $n++){
$ssl = 1;  				//SSL STILL NOT WORKING
$ch = curl_init();
$error_2 = "";

if($ssl = 1) {
	curl_setopt($ch, CURLOPT_URL, "ftp://$ftp_user_name[$n]:$ftp_pass[$n]@$ip[$n]:$ftp_port[$n]$path");
} elseif($ssl = 0) {
	curl_setopt($ch, CURLOPT_URL, "ftp://$ftp_user_name[$n]:$ftp_pass[$n]@$ip[$n]:$ftp_port[$n]$path");
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

$status[$n] = "<img src=\"$stat\" onmouseover=\"Tip('<b>Server Response:</b><br>".$result_tip."', BALLOON, true, ABOVE, true, WIDTH, '$fmax.px')\" onmouseout=\"UnTip()\">";

$today = getdate();
$tdate[$n] = $today[mday]."-".$today[mon]."-".$today[year]." ".$today[hours].":".$today[minutes];

}//endfor get status

$file=fopen("det_list.txt","a+") or exit("Unable to open det_list.txt"); //abre o ficheiro para escrita dos detalhes em append mode
for ($n = 0; $n < count($lines); $n++){
$ssl = "";
if ($line_details[$n][1] == 'SSL') $ssl = "<img src='img/ssl.gif'>";
$string_line[$n] = $line_details[$n][0]." ,, ".$ssl." ,, ".$country_td[$n]." ,, ".$line_details[$n][3]." ,, ".$line_details[$n][2]." ,, ".$line_details[$n][4]." ,, ".$tdate[$n]." ,, ".$status[$n]."\r\n";
echo $string_line[$n]."<br>";
fwrite($file, $string_line[$n]);
}
fclose($file); //close 

echo "DONE!";

?>