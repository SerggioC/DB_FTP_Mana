<html>
<head>
<meta http-equiv="Content-Language" content="pt">
<title>.: To MENU NAV SYSTEM:.</title>

<link rel="stylesheet" type="text/css" href="settings/man_style.css">
<script type="text/javascript" src="settings/nav_system.js"></script>
<style type="text/css"> 

.top_l{
	/*background-image:url('nav_img/topleft.gif');*/
	background-image:url('nav_img/topleft.gif');
	background-repeat:no-repeat;
	background-position:right bottom;
	width:11px;
}

.bar_t{
	background-image:url('nav_img/topbar.gif');
	background-repeat: repeat-x;
	background-position:bottom;
}

.top_r{
	background-image:url('nav_img/topright.gif');
	background-repeat:no-repeat;
	background-position:left bottom;
	width:11px;
}

.bar_l{
	background-image:url('nav_img/leftbar.gif');
	background-repeat: repeat-y;
	background-position:right top;
}

.bar_r{
	background-image:url('nav_img/rightbar.gif');
	background-repeat: repeat-y;
	background-position:left top;
}

.bot_l{
	background-image:url('nav_img/bottomleft.gif');
	background-repeat:no-repeat;
	background-position:right top;
}

.bar_b{
	background-image:url('nav_img/bottombar.gif');
	background-repeat: repeat-x;
	background-position:top;
}

.bot_r{
	background-image:url('nav_img/bottomright.gif');
	background-repeat:no-repeat;
	background-position:left top;
}

.fbody{
	background-color:#EDEBD5;
	padding:0 10 0 0;
	text-align:justify;
	vertical-align:top;
	width:400px;
}

.menu_selected{
	height:27px;
	padding: 0 5 0 10;
	text-align:left;
	font-size:11px;
	font-weight:bolder;
	color: #E67300;
	background-image: url('nav_img/bselected2.gif');
	background-repeat:no-repeat;
}

.menu_table{
	height:27px;
	padding: 0 5 0 10;
	text-align:left;
}

#nav_table tr:hover{
	background-image: url('nav_img/bselected2.gif');
	font-size:11px;
	font-weight:bolder;
	color: #660033;
	cursor:default;
	background-repeat:repeat-y;
}

#nav_table{
	background-image:url('nav_img/bunselected2.gif');
	position:relative;
	top:20px;
	background-repeat:repeat-y;
}

.content_table{
	position:absolute;
	left:110px;
	padding:0 0 0 0;
}

</style>


</head>

<body onload="changemenu('start')">



<br><br><br><br>

<table width="900" cellspacing="0" border="0"> <!-- The nesting table -->
<tr><td>

	<table id="nav_table" width="120" cellspacing="0" cellpadding="0" align="left" border="0"> <!-- The menu table -->
		<tr class="menu_selected" onclick="changemenu('start')" id="start"><td>&nbsp;&nbsp;Start Section</td></tr>
		<tr class="menu_table" onclick="changemenu('add')" id="add"><td>&nbsp;&nbsp;Add Stro's</td></tr>
		<tr class="menu_table" onclick="changemenu('edit')" id="edit"><td>&nbsp;&nbsp;Edit Stro</td></tr>
		<tr class="menu_table" onclick="changemenu('search')" id="search"><td>&nbsp;&nbsp;Search Release</td></tr>
		<tr class="menu_table"onclick="changemenu('stats')" id="stats"><td>&nbsp;&nbsp;Statistics</td></tr>
	</table>
	
<table class="content_table" align="right" cellpadding="0" cellspacing="0" style="width: 800px"> <!-- The contents table -->
<tr><td class="top_l"> </td><td class="bar_t"></td><td class="bar_t"></td><td class="top_r"> </td></tr> 
<tr id="menu_row"><td class="bar_l"> </td>
<td class="fbody" id="mb1"></td>
<td class="fbody" id="mb2">testing something greek and latin to fill the table so 
	ther&#39;s nothing more to read here, Just a bunch of text to fill this in! 
	thats nicetesting something greek and latin to fill the table so ther&#39;s 
	nothing more to read here,<br><br><br>	 Just a bunch of text to fill this in! thats nicetesting 
	something greek and latin to fill the table so ther&#39;s nothing more to read 
	to fill this in! thats nice</td>
<td class="bar_r"> </td></tr> 
<tr><td class="bot_l"> </td><td class="bar_b"></td><td class="bar_b"></td><td class="bot_r"> </td></tr> 
</table>


</td>
</tr>
</table>
<br>
<br>
<br>


&nbsp;


</body>


</html>