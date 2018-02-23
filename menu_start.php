<?php

echo $_POST['section'];

//Connect to database
include("mysqlconn.php");

//Select the MySQL database
mysql_select_db($database) or die("Could not select database $database .". mysql_error());

//Queries
$qry1 = mysql_query("SELECT * FROM standard"); 
$n_s = mysql_num_rows($qry1);
echo "<br><br>Welcome to <strong>To FTP Manager</strong><br>A great tool to manage ftp lists, searching releases and to be in fashion!<br>";
echo "<br>Total records in standard table= ". $n_s."<br>";

$qry2 = mysql_query("SELECT * FROM deleted"); 
$n_d = mysql_num_rows($qry2); 
echo "Total records in deleted table = ". $n_d."<br>";

$qry3 = mysql_query("SELECT status FROM standard WHERE status = 'online'"); 
// keeps getting the next row until there are no more to get, get ALL the rows.
$i = 0;
while($row = mysql_fetch_array( $qry3 )) {
	$i++;
} 
echo "Number of <b style='color:green'>online</b> stros = ".$i."<br>";

$qry4 = mysql_query("SELECT status FROM standard WHERE status = 'offline'"); 
// keeps getting the next row until there are no more to get, get ALL the rows.
$i = 0;
while($row = mysql_fetch_array( $qry4 )) {
	$i++;
} 
echo "Number of <b style='color:red'>offline</b> stros = ".$i."<br>";

$qry5 = mysql_query("SELECT status FROM standard WHERE status = 'nologin'"); 
// keeps getting the next row until there are no more to get, get ALL the rows.
$i = 0;
while($row = mysql_fetch_array( $qry5 )) {
	$i++;
} 
echo "Number of <b style='color:orange'>'No Login'</b> stros = ".$i."<br><br>";

echo "<b>Total number of stros by country:</b><br>";

$qry6 = mysql_query("SELECT distinct(country_ext) FROM standard "); 
$qry7 = mysql_query("SELECT country_ext, count(*) FROM standard GROUP BY country_ext");
$qry8 = mysql_query("SELECT distinct(country) FROM standard "); 
// keeps getting the next row until there are no more to get, get ALL the rows.
while($row = mysql_fetch_array( $qry6 )) {
	$row3 = mysql_fetch_array( $qry8 ); //2 digit cntry
	echo "<img src=\"img/$row3[0]".".gif \" > ".$row['country_ext']." - ";
	$row2 = mysql_fetch_array( $qry7 );
	echo $row2[1]."<br>"; //the number
} 

echo "<br><b>Number of stros by stro type:</b><br>";
$qry9 = mysql_query("SELECT stro_type, count(*) FROM standard GROUP BY stro_type");
while($row = mysql_fetch_array( $qry9 )) {
	echo $row[0]." - ".$row[1]."<br>";
} 



?>