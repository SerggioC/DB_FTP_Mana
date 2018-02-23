<?php //delete_ftp.php

$line_n = intval($_POST['line']);

$filename = "det_list.txt";
$file=fopen($filename,"r+") or exit("Unable to open $filename"); //abre o ficheiro para escrita em append mode
for ($i=0; $i < $line_n; $i++) { //from $i=0 até end of file
$stro_line = fgets($file); //procura a linha correspondente a $n_line
}
rewind($file);
$filecontent = fread($file, filesize($filename)); //read all the file to $contents
fclose($file); //close 

$newcontent = str_replace($stro_line,"",$filecontent);
$filename = "det_list.txt";
$file=fopen($filename,"w") or exit("Unable to open $filename"); //abre o ficheiro para escrita em write only truncate to 0
fwrite($file, $newcontent);
fclose($file); //close 

$filename = "delete_list.txt";
$file=fopen($filename,"a+") or exit("Unable to open $filename");
fwrite($file, $stro_line);
fclose($file); //close

?>