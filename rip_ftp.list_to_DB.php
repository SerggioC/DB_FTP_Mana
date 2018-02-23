<?php //rip_ftp.list_to_DB.php
set_time_limit(0);
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
  
$filename = "my_test_ftp_list.txt";	//formated ftplist with details
$file=fopen($filename,"r") or exit("Unable to open $filename"); //abre o ficheiro para leitura
$contents = fread($file, filesize($filename)); //read all the file to $contents
fclose($file); //close 
$lines = explode("\n", $contents);		//stros in the txt file
$lines = array_unique($lines); 			//only UNIQUE entries. Dupes will be ignored.
$lines = array_keys(array_flip($lines));//restart indexes
$lines = str_replace("\n","",$lines); 
$lines = str_replace("\r","",$lines);	// remove returns

$explchr = chr(9); //chr 9 => TAB
for ($n = 0; $n < count($lines); $n++){
	$line_details[$n] = explode($explchr,$lines[$n]);
	$stro_td[$n] = $line_details[$n][0];
	$ssl_td[$n] = $line_details[$n][1];
	$details_td[$n] = $line_details[$n][2];
	$team_td[$n] = $line_details[$n][3];
	$stro_type_td[$n] = $line_details[$n][4];
	
	$ftp_string = str_ireplace("ftp://","",$stro_td[$n]);
	$at_pos = strrpos($ftp_string,"@");
	$ip_port = substr($ftp_string,$at_pos + 1);
	$ip[$n] = strtok($ip_port, ":");
	$ftp_port[$n] = strtok(":");
	$user_pass = substr($ftp_string,0,$at_pos);
	$ftp_user_name[$n] = strtok($user_pass, ":");
	$ftp_pass[$n] = strtok(":");
}
	$ip_unique1 = array_unique($ip); //ip's únicos, dont want to be banned from the whois servers, so minimize requests.
	$dup_ip = array_diff_assoc($ip, $ip_unique1); //ip's duplicados, not needed
	$ip_unique = array_keys(array_flip($ip_unique1)); // restart indexes, new keys

	///////////////////////////// SOME INFO //////////////////////////////////
	echo count($lines)." Entradas únicas no ficheiro txt<br>";
	echo count($ip_unique)." IP's únicos <br>";
	echo "Saved ".floor(100*(count($lines)-count($ip_unique))/count($lines))."% of IP's<br><br><br>";

for ($i=0; $i<count($ip_unique); $i++) {
	ripe_riper($ip_unique[$i],$i);
}

function ripe_riper($ip,$index){  //get details for unique ip's
global $loc_2_digit, $country_a, $country_ext_a, $net_det_a, $country_tdi;

//$whois_url = "whois.geektools.com";
$whois_url = "whois.completewhois.com";
$sock = fsockopen( $whois_url, 43, $errno, $errstr, 10);

if (!$socks){ //are we set with telnet?
	fputs($sock, $ip."\n\n");
	while (!feof($sock)) 
		$dump .= fgets($sock);
	if (strlen($dump) < 2) {
		ripe_riper($ip,$whois_url,$index);
	} else {
		fclose($sock);

	$dump = preg_replace("/(<[^>]+>)*(<[^>]+>)/is", "", $dump); //strip html tags also strip_tags($var);

if ( strpos($dump, "OrgName") == false ) { //if false -> exec //if you dont find orgname proceed!
	$pos_adr = strpos($dump,"country");
	$pos_nl_adr = strpos($dump, "\n", $pos_adr);
	$country = substr($dump, $pos_adr, $pos_nl_adr - $pos_adr);
	$country_a[$index] = strtoupper(substr($country, -2)); //++
	$country_ext_a[$index] = $loc_2_digit[ $country_a[$index] ];
	if($country_ext_a[$index] == "" ) { $country_a[$index] = "unn"; $country_ext_a[$index] = "Unknown";}
	$pos_range = strpos($dump,"inetnum");
	$net_det = substr($dump , $pos_range , $pos_adr - $pos_range );
	$net_det = str_replace("inetnum","IP Range",$net_det);
	$net_det = str_replace("'","\'",$net_det);
	$net_det = str_replace("\"","\'",$net_det);
	$net_det = str_replace("\n","<br>",$net_det);
	$net_det_a[$index] = str_replace("\r","<br>",$net_det);
	$result_tip = " <b>Country:</b><br> ".$country_td[$index]." - ".$country_ext_td[$index]."<br><b>Details:</b><br>".$net_det_td[$index]."<br><br>";

} elseif ( strpos($dump, "OrgName") != false ) {
 	$pos_ctr = strpos($dump,"Country");
	$pos_nl_ctr = strpos($dump, "\n", $pos_ctr);
	$country = substr($dump, $pos_ctr, $pos_nl_ctr - $pos_ctr);
	$country_a[$index] = strtoupper(substr($country, -2));
	$country_ext_a[$index] = $loc_2_digit[ $country_a[$index] ];
	if($country_ext_a[$index] == "" ) { $country_a[$index] = "unn"; $country_ext_a[$index] = "Unknown";}
	$pos_org = strrpos($dump,"OrgName");
	$net_det = substr($dump , $pos_org , $pos_ctr - $pos_org );
	$pos_range = strpos($dump,"NetRange");
	$pos_nl_range = strpos($dump,"\n",$pos_range);
	$range = substr($dump, $pos_range, $pos_nl_range - $pos_range);
	$net_det = $range."<br>".$net_det;
	$net_det = str_replace("'","\'",$net_det);
	$net_det = str_replace("\"","\'",$net_det);
	$net_det = str_replace("\n","<br>",$net_det);
	$net_det_a[$index] = str_replace("\r","<br>",$net_det);
	} else {
	$net_det_a[$index] = "";
	}

		}
} else {
	unset($sock);
	echo "$whois_url down";
	return false;
	}

}//endfunction

for ($i=0; $i<count($ip); $i++){			//repopulate ip details
	for ($j=0; $j<count($ip_unique); $j++){
		if($ip[$i] == $ip_unique[$j]) {
			$net_det_td[$i] = $net_det_a[$j];
			$country_ext_td[$i] = $country_ext_a[$j];
			$country_td[$i] = $country_a[$j];
		}
	}
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////   START GET STATUS DETAILS AND CONTENTS FOR ALL UNIQUE ftp's   ////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$path = "/";
for ($n = 0; $n < count($lines); $n++){
	$ssl = $ssl_td[$n];
	$ch = curl_init();
	$error_2 = "";

	if($ssl == "SSL" || $ssl == "ssl" || $ssl == "true" || $ssl == "1") {
		curl_setopt($ch, CURLOPT_URL, "ftps://$ftp_user_name[$n]:$ftp_pass[$n]@$ip[$n]:$ftp_port[$n]$path");
	} else {
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
		curl_close($ch);

		if(!$result['error']) {	$stat = "online"; // online
		} else {
		switch(substr($result['error'], -3, 3)) {
			case '530': $stat = "nologin"; // not logged in
			break;
			
			case '421':	$stat = "nologin"; // too many users
			break;
			
			default:
			if(substr($result['error'], -27) == "No such file or directory.")
			{
				$stat = "online"; // online
			} 
			else 
			{
				if($result['error'] != "couldn't connect to host")
				{
				$stat = "offline";
				} 
				else 
				{
					$stat = "offline"; // offline
				} // end if
			} // end if
		} // end switch
	} // end if

	$statcode_td[$n] = $stat;

	
	$ftp_file_list = explode("\n", $result['filelist']);

	$fmax[$n] = 0;
	$contents = "<b>FTP Contents:</b><br>";

	for ($i=0; $i < count($ftp_file_list); $i++) {
	$list_size = strlen($ftp_file_list[$i]); 
	if ($list_size > $fmax[$n]) $fmax[$n] = $list_size;
	$pos_3A = stripos($ftp_file_list[$i],chr(58)); // :
	$pos_0D = stripos($ftp_file_list[$i],chr(13)); // \n
	$sub = substr($ftp_file_list[$i],$pos_3A + 3, $pos_0D - $list_size); //extracted subtring from raw filename
	$contents = $contents.$sub."<br>";
	}
		
	$error_info = $result['error'];
	$error_info = str_replace("'","\'",$error_info);
	$error_info_td[$n] = str_replace(chr(13),"",$error_info);
	
	$error_num = $result['errno'];
	$error_num = str_replace("'","\'",$error_num);
	$error_num_td[$n] = str_replace(chr(13),"",$error_num);
	
	$contents = str_replace("'","\'",$contents);
	$contents = str_replace(chr(13),"",$contents);
	$contents_td[$n] = $contents;

	$today = getdate();
	$tdate[$n] = $today[mday]."-".$today[mon]."-".$today[year]." ".$today[hours].":".$today[minutes];

	if (strlen($line_details[$n][5]) <4 ){ 
	$added_t[$n] = $tdate[$n];
	} else {
	$added_t[$n] = $line_details[$n][5];
	}
		
	if ($stat == "online"){
		$last_online[$n] = $tdate[$n];
	} else {
		$last_online[$n] = "never";
	}
	
}//endfor get status, index $n

//setup  MySQL
$dbhost = "localhost";
$dbuser = "sergiocrz";
$dbpass = "myadmin";
$database = "ftpmanager";
$table = "standard";

// Make MySQL Connection
$dbconn = mysql_connect($dbhost, $dbuser, $dbpass);
if (!$dbconn)  {  die("Could not connect: " . mysql_error());  }

//Select the MySQL database
mysql_select_db($database) or die("Could not select database $database .". mysql_error());

//Insert the data to standard table
 for ($n = 0; $n < count($lines); $n++){
$qresult = mysql_query("INSERT INTO $table (stro, ftp_user_name, ftp_pass, ip, ftp_port, ssl_conn, country, team, details_simple, stro_type, last_time_check, status, details_ext, country_ext, error_message, error_num, whois_details, ftp_contents, stro_speed, stro_size, last_time_online, date_added, date_deleted, fmax)
VALUES('$stro_td[$n]', '$ftp_user_name[$n]', '$ftp_pass[$n]', '$ip[$n]', '$ftp_port[$n]', '$ssl_td[$n]', '$country_td[$n]', '$team_td[$n]', '$details_td[$n]', '$stro_type_td[$n]', '$tdate[$n]', '$statcode_td[$n]', '$details_td[$n]', '$country_ext_td[$n]', '$error_info_td[$n]', '$error_num_td[$n]', '$net_det_td[$n]', '$contents_td[$n]', '', '', '$last_online[$n]', '$added_t[$n]', '', '$fmax[$n]') 
");
var_dump($qresult);

} 

mysql_close($dbconn);
echo "DONE!";






?>