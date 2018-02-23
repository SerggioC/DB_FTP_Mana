<?php
//setup  MySQL
$dbhost = "localhost";
$dbuser = "sergiocrz";
$dbpass = "myadmin";
$database = "ftpmanager";

// Make MySQL Connection
$dbconn = mysql_connect($dbhost, $dbuser, $dbpass);
if (!$dbconn)  {  die("Could not connect: " . mysql_error());  }
?>