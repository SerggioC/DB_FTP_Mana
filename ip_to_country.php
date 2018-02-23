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
$ch = curl_init();
//$ip = "212.93.235.48";
//$ip = "194.160.38.5";
//$ip = "212.200.228.231";		// Usar este file ao adicionar um stro novo
//$ip = "212.93.235.48";		//SACA OS DADOS DE IP DA RIPE.NET E APRESENTA O NOME DO PAÍS, PAÍS COM CODIGO DE 2 DIGITOS, E NETNAME
$ripe_url="http://www.db.ripe.net/whois?form_type=simple&full_query_string=&searchtext=$ip&do_search=Search";

	curl_setopt($ch, CURLOPT_URL, $ripe_url);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 4);  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$result['content'] = curl_exec($ch); //returns content

	curl_close($ch);

$dump = str_replace("\n"," ",$result['content']);

$pos_adr = strrpos($dump,"country");
$country = substr($dump,$pos_adr+17,2);
echo $country." "."<img src=\"img/$country".".gif \" onmouseover=\"Tip('<b>Country:</b><br>".$country."', BALLOON, true, ABOVE, true)\" onmouseout=\"UnTip()\"><br>";

$pos_ctr = strrpos($result['content'],"netname");
$net_det = substr($result['content'] , $pos_ctr , $pos_adr - strlen($result['content']) );
$net_det = nl2br($net_det);
echo $net_det;

$pos_ctex = strrpos($result['content'],"address");
$ctex = substr($result['content'] , $pos_ctex );
$ctex_nl_pos = stripos($ctex,"\n");
$country_ext = substr($ctex, 0 , $ctex_nl_pos - strlen($ctex));
echo $country_ext."<br>";
return;
}
?>