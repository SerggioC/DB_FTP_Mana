<?php
$file=fopen("small_ftp_list.txt","r") or exit("Unable to open ftp_list.txt"); //abre o ficheiro

while (!feof($file)) { //enquanto n chegar ao fim do ficheiro, à ultima linha
$stro = fgets($file); //Saca uma linha do ficheiro em cada ciclo

$ftp_string = str_ireplace("ftp://","",$stro);
$at_pos = strrpos($ftp_string,"@");
$ip_port = substr($ftp_string,$at_pos + 1);
$ftp_ip = strtok($ip_port, ":");
ripe_riper($ftp_ip);
}
fclose($file); //fecha o ficheiro


function ripe_riper($ip){
$sock = fsockopen("whois.ripe.net", 43, $errno, $errstr, 200);
if (!$socks){ //are we set with telnet?
	fputs($sock, $ip."\n");
	while (!feof($sock)) $dump .= fgets($sock); //fgets($sock, 10240);
	if (strlen($dump) < 2) {
		ripe_riper($ip);
	} else {
		fclose($sock);
		//echo $dump."<br>";

		//$dump = str_replace("\n"," ",$dump);
		$dump = nl2br($dump);
		//echo $dump."<br>";
 		$pos_adr = strrpos($dump,"country");
		$country = substr($dump,$pos_adr+16,2);
		if ($country == " #") {
		$server = "http://ws.arin.net/whois/?queryinput=$ip"; //americano
		$country = "eu";
		}
		echo $country." "."<img src=\"img/$country".".gif \" onmouseover=\"Tip('<b>Country:</b><br>".$country."', BALLOON, true, ABOVE, true)\" onmouseout=\"UnTip()\"><br>";

		$pos_ctr = strrpos($dump,"netname");
		$net_det = substr($dump , $pos_ctr , $pos_adr - strlen($dump) );
		$net_det = nl2br($net_det);
		echo $net_det;

		$pos_ctex = strrpos($dump,"address");
		$ctex = substr($dump , $pos_ctex );
		$ctex_nl_pos = stripos($ctex,"\n");
		$country_ext = substr($ctex, 0 , $ctex_nl_pos - strlen($ctex));
		echo $country_ext."<br>"; 
		return;  

		//var_dump($dump."<br>"); //show result
		}
} else {
	unset($sock);
	$msg .= "Server down";
	echo $msg;
}
}

?>