<?php  //whois_ripper.php

$loc_2_digit = array('AD' => 'Andorra', 'AE' => 'United Arab Emirates', 'AF' => 'Afghanistan', 'AG' => 'Antigua And Barbuda', 'Ai' => 'Anguilla'
  , 'AL' => 'Albania', 'AM' => 'Armenia', 'AN' => 'Netherlands Antilles', 'AO' => 'Angola', 'AP' => 'Non-Spec Asia Pas Location'
  , 'AR' => 'Argentina', 'AS' => 'American Samoa', 'AT' => 'Austria', 'AU' => 'Australia', 'AW' => 'Aruba'
  , 'AX' => 'Åland Islands', 'AZ' => 'Azerbaijan', 'BA' => 'Bosnia Herzegowina', 'BB' => 'Barbados', 'BD' => 'Bangladesh'
  , 'BE' => 'Belgium', 'BF' => 'Burkina Faso', 'BG' => 'Bulgaria', 'BH' => 'Bahrain', 'BI' => 'Burundi'
  , 'BJ' => 'Benin', 'BM' => 'Bermuda', 'BN' => 'Brunei Darussalam', 'BO' => 'Bolivia', 'BR' => 'Brazil'
  , 'BS' => 'Bahamas', 'BT' => 'Bhutan', 'BW' => 'Botswana', 'BY' => 'Belarus', 'BZ' => 'Belize'
  , 'CA' => 'Canada', 'CD' => 'Congo The Democratic Republic Of The', 'CF' => 'Central African Republic', 'CG' => 'Congo', 'CH' => 'Switzerland'
  , 'CI' => 'Cote D\'Ivoire', 'CK' => 'Cook Islands', 'CL' => 'Chile', 'Cm' => 'Cameroon', 'CN' => 'China'
  , 'CO' => 'Colombia', 'CR' => 'Costa Rica', 'CS' => 'Serbia & Montenegro', 'CU' => 'Cuba', 'CV' => 'Cape Verde'
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
  , 'KG' => 'Kyrgyzstan', 'KH' => 'Cambodia', 'KI' => 'Kiribati', 'KN' => 'Saint Kitts And Nevis', 'KR' => 'Korea'
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

function ripe_riper($ip){
global $loc_2_digit;
$ch = curl_init();
//$ripe_url = "http://www.db.ripe.net/whois?form_type=simple&full_query_string=&searchtext=$ip&do_search=Search";
//$ripe_url = "http://www.iptuga.com/index.php?ip=$ip"; //$ripe_url = "http://whois.domaintools.com/$ip";

//$ripe_url="http://whois.europeregistry.com/displayWhois.php?zone=$ip&Submit=Check+Domain" //global (adicional check needed)
$ripe_url="http://www.zoneedit.com/whois.html?zone=$ip";	//global
//$ripe_url="http://www.ratite.com/whois/whois.cgi?domain=$ip"; 		//global, change this if you get banned from whois server

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
	//curl_setopt($ch, CURLOPT_FTP_SSL, CURLFTPSSL_TRY);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 4);  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	$result['content'] = curl_exec($ch); //returns content
	curl_close($ch);

$dump = $result['content'];

$pre_pos = stripos($dump, "<PRE>");			//firt position of <pre>
$last_pre_pos = strripos($dump, "</PRE>")+6; 	//last position of </pre>
$dump = substr($dump, $pre_pos, $last_pre_pos - $pre_pos );

if ( strpos($dump, "OrgName") == false ) { //if false -> exec //if you dont find orgname proceed!
	$pos_adr = strpos($dump,"country");
	$pos_nl_adr = strpos($dump, "\n", $pos_adr);
	$country = substr($dump, $pos_adr, $pos_nl_adr - $pos_adr);
	$country = str_replace(" ", "", $country);
	$country = strtoupper(substr($country, 8, 2));
	$country_ext = $loc_2_digit[$country];
	if($country_ext == "" ) { $country = "unn"; $country_ext = "Unknown";}
	//$pos_ctr = strrpos($dump,"netname");
	$pos_range = strpos($dump,"inetnum");
	$net_det = substr($dump , $pos_range , $pos_adr - $pos_range );
	$net_det = str_replace("inetnum","IP Range",$net_det);
	//$net_det = substr($dump , $pos_ctr , $pos_adr - $pos_ctr ); //	$net_det = substr($dump , $pos_ctr , $pos_adr - strlen($dump) );
	$net_det = str_replace("'","\'",$net_det);
	$net_det = str_replace("\"","\'",$net_det);
	$net_det = preg_replace ("/(<[^>]+>)*(<[^>]+>)/is", "", $net_det); //remove html entities
	$net_det = str_replace("\n","<br>",$net_det);
	$net_det = str_replace("\r","<br>",$net_det);
	//echo $net_det."<br><br>";
	$result_tip = " <b>Country:</b><br> ".$country." - ".$country_ext."<br><b>Details:</b><br>".$net_det ;
	echo "<img src=\"img/$country".".gif \" onmouseover=\"Tip('$result_tip', BALLOON, true, ABOVE, true)\" onmouseout=\"UnTip()\"> ";
	echo $country." - ".$country_ext."<br>";
	//echo $result_tip;

	return;
} elseif ( strpos($dump, "OrgName") != false ) {

 	$pos_ctr = strpos($dump,"Country");
	$pos_nl_ctr = strpos($dump, "\n", $pos_ctr);
	$country = substr($dump, $pos_ctr, $pos_nl_ctr - $pos_ctr);
	$country = str_replace(" ", "", $country);
	$country = strtoupper(substr($country, 8, 2)); //should be US anyway...
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
	$net_det = preg_replace ("/(<[^>]+>)*(<[^>]+>)/is", "", $net_det);  //remove html entities
	$net_det = str_replace("\n","<br>",$net_det);
	$net_det = str_replace("\r","<br>",$net_det);
	//echo $net_det."<br><br>";
	$result_tip = " <b>Country:</b><br> ".$country." - ".$country_ext."<br><b>Details:</b><br>".$net_det ;
	echo "<img src=\"img/$country".".gif \" onmouseover=\"Tip('$result_tip', BALLOON, true, ABOVE, true)\" onmouseout=\"UnTip()\"> ";
	echo $country." - ".$country_ext;
	//echo $result_tip;
	} else {
	echo "Country";
	}

}//end function riper

?>