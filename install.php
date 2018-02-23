<?php

//This file will create the database and the tables used by the ftp manager

$dbhost = "localhost";
$dbuser = "sergiocrz";
$dbpass = "myadmin";
$dbname = "ftpmanager";

$dbconn = mysql_connect($dbhost, $dbuser, $dbpass);
if (!$dbconn)  {  die('Could not connect: ' . mysql_error());  }
if (mysql_query("CREATE DATABASE $dbname",$dbconn))
  {
  echo "Database $dbname created<br>";

// Create table in my_db database
mysql_select_db($dbname);
$sqlq = "CREATE TABLE standard(
stro_id TINYINT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(stro_id),
stro TINYTEXT NOT NULL,
ftp_user_name TINYTEXT,
ftp_pass TINYTEXT,
ip varchar(20),
ftp_port TINYTEXT,
ssl_conn varchar(5),
country varchar(5),
team varchar(40),
details_simple varchar(25),
stro_type varchar(20),
last_time_check varchar(30),
status varchar(30),
details_ext TEXT,
country_ext varchar(40),
error_message varchar(50),
error_num varchar(10),
whois_details TEXT,
ftp_contents TEXT,
stro_speed TINYINT,
stro_size TINYINT,
last_time_online varchar(30),
date_added varchar(30),
date_deleted varchar(30),
fmax TINYINT
)";
mysql_query($sqlq); echo "Table 'standardlist' Created<br>";

$sqlq2 = "CREATE TABLE deleted(
stro_id TINYINT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(stro_id),
stro TINYTEXT NOT NULL,
ftp_user_name TINYTEXT,
ftp_pass TINYTEXT,
ip varchar(20),
ftp_port TINYTEXT,
ssl_conn varchar(5),
country varchar(5),
team varchar(40),
details_simple varchar(30),
stro_type varchar(20),
last_time_check varchar(30),
status varchar(30),
details_ext TEXT,
country_ext varchar(40),
error_message varchar(50),
error_num varchar(10),
whois_details TEXT,
ftp_contents TEXT,
stro_speed TINYINT,
stro_size TINYINT,
last_time_online varchar(30),
date_added varchar(30),
date_deleted varchar(30),
fmax TINYINT
)";
mysql_query($sqlq2); echo "Table 'deleteddlist' Created";
  
  
  }
else
  {
  echo "Error creating $dbname database: " . mysql_error();
  }

mysql_close($dbconn);


?>