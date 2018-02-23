<html>
<head>
<title>.: To FTP Manager :.</title>

<link rel="stylesheet" type="text/css" href="settings/man_style.css">
<script type="text/javascript" src="settings/table_sort.js"></script>
<script type="text/javascript" src="settings/mana_set.js"></script>
<script type="text/javascript" src="settings/mootools.js"></script>
<script type="text/javascript" src="settings/sliding-tabs.js"></script>

</head>

<body>
<script type="text/javascript" src="settings/wz_tooltip.js"></script> 
<script type="text/javascript" src="settings/tip_balloon.js"></script>
<center>
<br> 
<strong style="font-size: 24px; font-family:'Comic Sans MS'; color: orange; font-style: italic;">To FTP Manager</strong></center>
<br>
<br>
<center>
<span style="font-size: x-small"><strong >Add new FTP: </strong></span>
<table id="ad_ftp">
	<thead>
		<tr>
			<td style="height: 20px">Full FTP Address</td>
			<td style="height: 20px">SSL</td>
			<td style="height: 20px">Country</td>
			<td style="height: 20px">Status</td>
			<td style="height: 20px">Team</td>
			<td style="height: 20px">Details</td>
			<td style="height: 20px">Stro Type </td>
			<td style="height: 20px">Add</td>
			<td style="height: 20px">Reset</td>
		</tr>
	</thead>

	<tr>
<!-- <form name="autoget" action='add_ftp_check.php' method='POST' onsubmit='return submitftp(this,1)'></form> -->
<td><input id="ftp_id_1" name="ftp_1" type="text" class="i" style="width: 270px;" onchange="return submitftp(1)"></td>
			<td><input name="SSL_add_1" id="ssl_1" type="checkbox"></td>
			<td id="country_1">Country</td>
			<td id="status_1">Status</td>
			<td><input id="team_id_1" name="team_1" type="text" class="i" style="width: 120px;" ></td>
			<td><input id="details_id_1" name="details_1" type="text" class="i" style="width: 170px;"></td>
			<td>
			<select name="stro_type_1" id="stro_type_id_1" class="i" style="width: 100px; height:20px">
				<option value="">Select Type</option>
				<option value="Mirror Leech">Mirror Leech</option>
				<option value="Mirror Fill">Mirror Fill</option>
				<option value="Racer Leech">Racer Leech</option>
				<option value="Racer Fill">Racer Fill</option>
				<option value="Team Dump">Team Dump</option>
				<option value="Private FTP">Private FTP</option>
				<option value="Public FTP">Public FTP</option>
				<option value="Other">Other</option>
			</select>
						
			</td>
			<td><input name="Submit_stro" type="submit" value="save" class="bt" onclick="save_stro(1)"></td>
			<td><input name="reset1" type="button" value="reset" class="bt" onclick="reset_add(1)"></td>
	</tr>
	<tr>
			<td><input id="ftp_id_2" class="i" name="ftp_2" type="text" style="width: 270px;" onchange="return submitftp(2)"></td>
			<td><input name="SSL_add_2" id="ssl_2" type="checkbox"></td>
			<td id="country_2">Country</td>
			<td id="status_2">Status</td>
			<td><input id="team_id_2" name="team_2" type="text" class="i" style="width: 120px;"></td>
			<td><input id="details_id_2" name="details_2" type="text" class="i" style="width: 170px;"></td>
			<td>
			<select name="stro_type_2" id="stro_type_id_2" class="i" style="width: 100px; height:20px">
				<option value="">Select Type</option>
				<option value="Mirror Leech">Mirror Leech</option>
				<option value="Mirror Fill">Mirror Fill</option>
				<option value="Racer Leech">Racer Leech</option>
				<option value="Racer Fill">Racer Fill</option>
				<option value="Team Dump">Team Dump</option>
				<option value="Private FTP">Private FTP</option>
				<option value="Public FTP">Public FTP</option>
				<option value="Other">Other</option>
			</select>
</td>
			<td><input name="Submit_stro" type="submit" value="save" class="bt" onclick="save_stro(2)"></td>
			<td><input name="reset2" type="button" value="reset" class="bt"  onclick="reset_add(2)"></td>
	</tr>
</table>

<br>
<div id="insert"></div>
<br>

<table id="det_ftp_table" style="display:none">
	<thead>
		<tr>
			<td style="height: 20px">IP Details</td>
			<td style="height: 20px">Ftp Content and Status</td>
			<td style="width: 66px" align="right">
			<img alt="back" src="img/back.gif" float="left" onClick="expand_('back')">&nbsp;&nbsp;			
			<img alt="next" src="img/forward.gif"  float="left" onClick="expand_('next')">&nbsp;&nbsp;
			<img alt="close" src="img/close.jpg" float="right" onClick="hidedet_table()" onmouseover="Tip('close', BALLOON, true, ABOVE, true, WIDTH, '40px')" onmouseout="UnTip()"></td>
		</tr>
	</thead>

	<tr id="togledtable">
			<td id="ip_details_id" valign="top" width="350px" height="350px"></td>
			<td colspan='2' id="ftp_contents_id" valign="top" width="350px" height="350px"></td>
	</tr>
</table>
<br>
<br>
<p style="font-size: xx-small; text-align:left; text-indent: 100px; color:yellow" >
<b>Click on the headings to sort. Click on FTP address to copy to clipboard.</b>
</p>
<!-- <form action="ajax_output.php" method="post" onsubmit="return submitForm(this,7)"><input type="submit" value="send" class="bt"></form> -->
<ul id="buttons" style="display:none">
	<li>Alpha</li>
	<li>Beta</li>
</ul>
<div align="right" style="margin-right:50px">
<img src=img/original.gif alt="" id="previous" style="display:none" onclick="hide_('previous')">
<img src=img/deleted.gif alt="" id="next" onclick="hide_('next')"></div>
	<div id="wrapper">
		<div id="heading"></div>
		<div id="panes">
			<div id="content" style="color:white">
				<div>

<caption style="font-size: xx-small; font-family: Verdana; color: #FFFFFF; text-align:left">
<span style="color: #FFFFFF; ">Set Selections:
<input name="radio" type="checkbox" id="online1" onchange="set_('online',1)"><label for="online1" style="color: #00FF00"> Online&nbsp; </label>
<input name="radio" type="checkbox" id="offline1" onClick="set_('offline',1)"><label for="offline1" style="color: #FF0000"> Offline&nbsp; </label>
<input name="radio" type="checkbox" id="nologin1" onClick="set_('nologin',1)"><label for="nologin1" style="color: #FFFF00"> Others&nbsp; </label>
<input type="button" value="Invert" id="invert1" onClick="set_('invert',1)" class="bt" style="background-color: orange">
<input name="radio" type="button" id="none1" value="None" onClick="set_('none',1)" class="bt" style="background-color: orange">

</span>

<span>&nbsp;&nbsp;&nbsp;&nbsp;
<input type='button' value='Delete Selected' onClick='delete_lines()' style='background-color: silver; border: gray; width: 110px; height:20px' >
<input type='button' value='Check Selected' onClick='verify_lines(1)' style='background-color:lightyellow; border: gray; width: 110px; height:20px' >
<input type='button' value='Check all Servers' onClick='verify_all(1)' style='background-color: #FFCC66; border: gray; width: 110px; height:20px' >
</span>
</caption>



		
<table id="myTable1" cellspacing=1 style="margin-top:2px">
	<!-- 
	id of <col> tags should be "col" + index of table(1 = first table, 2 = second table) + _ (underscore) + column index(1.2.3.4...)
	-->
	<colgroup>
		<col id="col1_1">
		<col id="col1_2">
		<col id="col1_3">
		<col id="col1_4">
		<col id="col1_5">
		<col id="col1_6">
		<col id="col1_7">
		<col id="col1_8">
		<col id="col1_9">	
		<col id="col1_10">
		<col id="col1_11">
		<col id="col1_12">
	</colgroup>

	<thead onmouseover="Tip('Click here to sort', BGCOLOR, '#B3E6F7', WIDTH, '100px', ABOVE, true, OFFSETX, -110, STICKY, false, DURATION, 2500, SHADOW, false)" onmouseout="UnTip()" style="color:">
		<tr>
			<td>id</td>
			<td>Full FTP Address</td>
			<td>FTP IP</td>
			<td>SSL</td>
			<td>Country</td>
			<td>Team</td>
			<td>Details</td>
			<td>Stro Type</td>
			<td>Last Check</td>
			<td>Status</td>
			<td>Check</td>
			<td>Options</td>
		</tr>
	</thead>
	<tbody id="t_main_body1" >
	
	
		<?php include("open_ftp_file_list.php"); ?>
	
	</tbody>
</table>
	



				</div>
				
				
				<div>



<caption style="font-size: xx-small; font-family: Verdana; color: #FFFFFF; text-align:left;">
<span style="color: #FFFFFF; ">Set Selections:
<input name="radio" type="checkbox" id="online2" onchange="set_('online',2)"><label for="online2" style="color: #00FF00"> Online&nbsp; </label>
<input name="radio" type="checkbox" id="offline2" onClick="set_('offline',2)"><label for="offline2" style="color: #FF0000"> Offline&nbsp; </label>
<input name="radio" type="checkbox" id="nologin2" onClick="set_('nologin',2)"><label for="nologin2" style="color: #FFFF00"> Others&nbsp; </label>
<input type="button" value="Invert" id="invert2" onClick="set_('invert',2)" class="bt" style="background-color: orange">
<input name="radio" type="button" id="none2" value="None" onClick="set_('none',2)" class="bt" style="background-color: orange">

</span>

<span>&nbsp;&nbsp;&nbsp;&nbsp;
<input type='button' value='Restore Selected' onClick='restore_lines(2)' style='background-color: silver; border: gray; width: 110px; height:20px' >
<input type='button' value='Check Selected' onClick='verify_lines(2)' style='background-color:lightyellow; border: gray; width: 110px; height:20px' >
<input type='button' value='Check all Servers' onClick='verify_all(2)' style='background-color: #FFCC66; border: gray; width: 110px; height:20px' >
</span>
</caption>





	<table id="myTable2" cellspacing=1 style="background-color: #EFEFEF; margin-top:10px">
	<!-- 
	id of <col> tags should be "col" + index of table(1 = first table, 2 = second table) + _ (underscore) + column index(1.2.3.4...)
	-->
	<colgroup>
		<col id="col2_1">
		<col id="col2_2">
		<col id="col2_3">
		<col id="col2_4">
		<col id="col2_5">
		<col id="col2_6">
		<col id="col2_7">
		<col id="col2_8">
		<col id="col2_9">	
		<col id="col2_10">
		<col id="col2_11">
		<col id="col2_12">
	</colgroup>

	<thead onmouseover="Tip('Click here to sort', BGCOLOR, '#B3E6F7', WIDTH, '100px', ABOVE, true, OFFSETX, -110, STICKY, false, DURATION, 2500, SHADOW, false)" onmouseout="UnTip()" style="color:">
		<tr>
			<td>id</td>
			<td>Full FTP Address</td>
			<td>FTP IP</td>
			<td>SSL</td>
			<td>Country</td>
			<td>Team</td>
			<td>Details</td>
			<td>Stro Type</td>
			<td>Last Check</td>
			<td>Status</td>
			<td>Check</td>
			<td>Options</td>
		</tr>
	</thead>
	<tbody id="t_main_body2" >

	
	

	
	</tbody>
</table>

<script type="text/javascript" language='javascript'>
document.getElementById('t_main_body2').innerHTML = "<img src='img/loadbar.gif'>";
if(window.XMLHttpRequest){
	var xmlReq = new XMLHttpRequest();
	} else if( window.ActiveXObject ) {
	var xmlReq = new ActiveXObject('Microsoft.XMLHTTP');
	}
	xmlReq.onreadystatechange = function(){
		if(xmlReq.readyState == 4){
		document.getElementById('t_main_body2').innerHTML = xmlReq.responseText;
	}
}
xmlReq.open('POST', 'open_ftp_file_list.php', true);
xmlReq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xmlReq.send("table=deleted");
</script>

				</div>
			</div>
		</div>
	</div>
	

<br>
<br>
<br>
<br>
</center>

<script type="text/javascript">
initSortTable('myTable1',Array('N','S','S','S','S','N','S','S','S','S','S','S')); //S - String; N - Numeric 
initSortTable('myTable2',Array('N','S','S','S','S','N','S','S','S','S','S','S')); //S - String; N - Numeric 

window.addEvent('load', function () {
	slidingtabs = new SlidingTabs('buttons', 'panes');

	// this sets up the previous/next buttons, if you want them
	$('previous').addEvent('click', slidingtabs.previous.bind(slidingtabs));
	$('next').addEvent('click', slidingtabs.next.bind(slidingtabs));
});
</script>
<br>
</body>
</html>