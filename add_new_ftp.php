<?php //add_new_ftp.php

$stro = $_POST['stro'];
$ssl = $_POST['ssl'];
$country = $_POST['country'];
$status = $_POST['status'];
$team = $_POST['team'];
$details = $_POST['details'];
$stro_type = $_POST['stro_type'];
$today = getdate();
$tdate = $today[mday]."/".$today[mon]."/".$today[year]." ".$today[hours].":".$today[minutes];

$string_line = "\r\n".$stro." ,, ".$ssl." ,, ".$country." ,, ".$team." ,, ".$details." ,, ".$stro_type." ,, ".$tdate." ,, ".$status;

$file = fopen("det_list.txt","a+") or exit("Unable to open ftp_list.txt"); //abre o ficheiro 'a+'  escreve no final
fwrite($file,$string_line);
fclose($file);

$n=0;
$file=fopen("ftp_list.txt","r+") or exit("Unable to open ftp_list.txt"); //abre o ficheiro
while (!feof($file)) 
  {  $n++;fgets($file);  } //get number of lines in the file
fclose($file);


$ftp_string = str_ireplace("ftp://","",$stro);

$at_pos = strrpos($ftp_string,"@");
$ip_port = substr($ftp_string,$at_pos + 1);
$ftp_ip = strtok($ip_port, ":");
$ftp_port = strtok(":");

$user_pass = substr($ftp_string,0,$at_pos);
$ftp_user_name = strtok($user_pass, ":");
$ftp_pass = strtok(":");
///////////////////////// Tem de estar de acordo com open_ftp_file_list.php  //////////////////////////////////////
echo "<script type='text/javascript'>alert('want to add that???')</script>";
echo "<tr><td><input name='C_$n' type='checkbox'></td>";
echo "<td><a href=\"javascript:clip('$stro')\">".$stro."</a></td>";
echo "<td>".$ftp_user_name."</td>";
//echo "<td>".$ftp_pass."</td>";
echo "<td>".$ftp_ip."</td>";
//echo "<td>".$ftp_port."</td>";
echo "<td>".$ssl."</td>";
echo "<td>".$country."</td>";
echo "<td>".$team."</td>";
echo "<td>".$details."</td>";
echo "<td>".$stro_type."</td>";
echo "<td>".$tdate."</td>";
echo "<td id='l_$n'>".$status."</td>";
echo "<td><form action='status_check.php' method='post' onsubmit='return submitForm(this,$n)'><input type='submit' value='Check' class='bt'></form></td></tr>";




?>