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

//$ip = "212.93.235.48";
//$ip = "194.160.38.5";
//$ip = "212.200.228.231";
//$ip = "212.93.235.48";		//SACA OS DADOS DE IP DA RIPE.NET E APRESENTA O NOME DO PAÍS, PAÍS COM CODIGO DE 2 DIGITOS, E NETNAME
//$ripe_url="http://www.db.ripe.net/whois?form_type=simple&full_query_string=&searchtext=$ip&do_search=Search";
$url="whois.ripe.net";

$fp = fsockopen($url, 43, $errno, $errstr, 30);

var_dump($fp);
	


}
?>