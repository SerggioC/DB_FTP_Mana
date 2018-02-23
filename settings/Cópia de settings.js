// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=--=-=-=-
// |
// | JavaScript functions for the Pubposter
// ! Recoded by To @ UGC v3.5 02/2008
// | Coded by Noodles
// | Version 2.4.2 beta - July 2006
// | 
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=--=-=-=-

// ************************************************************************************
// * INITILISE THE PAGE
// * Setup select boxes from arrays, change the browser title, save message template
// ************************************************************************************
function init() {
// Add a dynamic 'post on all boards' button derived from the included *.JS files (Noodles)
// Alert if you forget some input and style the buttons

var funct = 'if (document.standaard.release.value == "") alert("Please Enter Release Name"); if (document.standaard.release.value == "") document.standaard.release.focus(); if (document.standaard.release.value == "") return; if (document.standaard.section.value == 0) alert("Please Select Release Section"); if (document.standaard.section.value == 0) document.standaard.section.focus(); if (document.standaard.section.value == 0) return; if (document.standaard.quicklink.value == "") alert("Please Enter FTP address"); if (document.standaard.quicklink.value == "") document.standaard.quicklink.focus(); if (document.standaard.quicklink.value == "") return; if (document.standaard.message.value == "") alert("Please Enter Some Message!"); if (document.standaard.message.value == "") document.standaard.message.focus(); if (document.standaard.message.value == "") return; ';

newbuttons ="<table border=0 cellspacing=3 cellpadding=0>"; j = 0;
var list = document.getElementById('board_js').getElementsByTagName('input');
for (var i = 0; i < list.length; ++i) //all the way!
	if (list[i].type == 'button'){
	funct += list[i].getAttribute('onClick') + ';';
	if (j == 7)	newbuttons += "<tr>";
newbuttons += "<td><input type='button' style='background-color:Moccasin; width:82px' value='" + list[i].getAttribute('value') + " ' onClick=' " + list[i].getAttribute('onClick') + " '></td> ";
j++;
	if (j == 7){ j = 0; newbuttons += "</tr>";}
}//end for

  funct = replace(replace(replace(funct,'}',''),'{',''),'function anonymous()','');
  newbuttons = replace(replace(replace(newbuttons,'}',''),'{',''),'function anonymous()','');
//  alert(newbuttons);
  document.getElementById("allbuttondiv").innerHTML="<input class='a' type='button' value='Post to All' onClick='" + funct + "' style='background-color:lightyellow; width: 100px;' >" ;
  document.getElementById("boards_js_styled").innerHTML = newbuttons;

}//end function init()

function replace(string,text,by) {
  var strLength = string.length
  var txtLength = text.length;

  if ((strLength == 0) || (txtLength == 0)) return string;
  var i = string.indexOf(text);
  if ((!i) && (text != string.substring(0,txtLength))) return string;
  if (i == -1) return string;

  var newstr = string.substring(0,i) + by;
  if (i+txtLength < strLength)
      newstr += replace(string.substring(i+txtLength,strLength),text,by);

  return newstr;
}

function selectstro() {
  len = document.standaard.strotemplate.length;
  i=0;
  stro = "none";
  for (i = 0; i < len; i++) {
  if (document.standaard.strotemplate[i].selected) {stro = document.standaard.strotemplate[i].value}
}
  document.standaard.quicklink.value = stro;
  checkip(document.standaard);
}

function limparls() {
document.title = titleoriginal;
document.standaard.subject.value = '';
document.standaard.release.value = '';
document.standaard.section.value = '';
	if (document.standaard.detailsinmsg.checked)
	document.standaard.message.value = document.standaard.message.value.replace('Release Name: ' + release_name , 'Release Name: ');
	if (document.standaard.detailsinmsg.checked == false) document.standaard.message.value = typedmessage + originalmessage;
release_name = '';
}

function resetdetails(){
  document.standaard.detailsinmsgID.checked = checkmsg;
  document.standaard.detailsinsubjID.checked = checksubj;
//  document.standaard.nickinsubjID.checked = checknick;
  stro_loc = '';
  stro_loc_ext = '';
  stro_speed = '';
  rls_size = '';
  for (i=0;i<document.standaard.radiolocgroup.length;i++) 	document.standaard.radiolocgroup[i].checked = false;
  for (i=0;i<document.standaard.radiospeedgroup.length;i++)	document.standaard.radiospeedgroup[i].checked = false;
  for (i=0;i<document.standaard.radiosizegroup.length;i++)	document.standaard.radiosizegroup[i].checked = false;
  SNBoxClicked();
}


function limpate() {
  changedmessage = '';
  typedmessage = '';
  document.title = titleoriginal;
  document.standaard.subject.value = '';
  document.standaard.release.value = '';
  release_name = '';
  document.standaard.section.value = '';
  document.standaard.quicklink.value = '';
  document.standaard.login.value = '';
  document.standaard.pass.value = '';
  document.standaard.ip.value = '';
  document.standaard.port.value = '';
  document.standaard.path.value = '';
  document.standaard.sslon.checked = false;
  document.standaard.strotemplate.value = '';
  document.standaard.message.value = originalmessage;
  document.standaard.recycleID.value = recycletime;
  document.standaard.detailsinmsgID.checked = checkmsg;
  document.standaard.detailsinsubjID.checked = checksubj;
  document.standaard.nickinsubjID.checked = checknick;
  document.standaard.teaminsubjID.checked= checkteam;
  stro_loc = '';
  stro_loc_ext = '';
  stro_speed = '';
  rls_size = '';
  for (i=0;i<document.standaard.radiolocgroup.length;i++) 	document.standaard.radiolocgroup[i].checked = false;
  for (i=0;i<document.standaard.radiospeedgroup.length;i++)	document.standaard.radiospeedgroup[i].checked = false;
  for (i=0;i<document.standaard.radiosizegroup.length;i++)	document.standaard.radiosizegroup[i].checked = false;
}

function limpastro() {
  document.standaard.quicklink.value = '';
  document.standaard.login.value = '';
  document.standaard.pass.value = '';
  document.standaard.ip.value = '';
  document.standaard.port.value = '';
  document.standaard.path.value = '';
  document.standaard.sslon.checked = false;
  document.standaard.strotemplate.value = '';
  for (i=0;i<document.standaard.radiolocgroup.length;i++) 	document.standaard.radiolocgroup[i].checked = false;
  for (i=0;i<document.standaard.radiospeedgroup.length;i++)	document.standaard.radiospeedgroup[i].checked = false;
  stro_loc = '';
  stro_loc_ext = '';
  stro_speed = '';
}

//function addtags() {
//  document.standaard.subject.value=fronttag+document.standaard.subject.value+backtag;
//}

function checkip(theform) {
var ftpstring=theform.quicklink.value+"/";
ftpstring=ftpstring.replace("FTP://","");
ftpstring=ftpstring.replace("ftp://","");
theform.login.value=ftpstring.substring(0,ftpstring.indexOf(":"));
ftpstring=ftpstring.substr(ftpstring.indexOf(":")+1);
theform.pass.value=ftpstring.substring(0,ftpstring.indexOf("@"));
ftpstring=ftpstring.substr(ftpstring.indexOf("@")+1);
theform.ip.value=ftpstring.substring(0,ftpstring.indexOf(":"));
ftpstring=ftpstring.substr(ftpstring.indexOf(":")+1);
theform.port.value=ftpstring.substr(0,ftpstring.indexOf("/"));
theform.path.value=ftpstring.substr(ftpstring.indexOf("/")+1);
}

function doaddhide() {
document.standaard.message.value="[hide]ftp://" + document.standaard.login.value + ":" + document.standaard.pass.value + "@" + document.standaard.ip.value + ":" + document.standaard.port.value + "[/hide]" + document.standaard.message.value;
}

function copytosubject() {
if ( document.standaard.release.value == "" ) {
	release_name = "";
	document.standaard.subject.value = "";
	document.title = titleoriginal;
	document.standaard.message.value = changedmessage;
	putonmsg();
	}

else if ( document.standaard.release.value != "" ){ 
	release_name = document.standaard.release.value;
	SNBoxClicked();
//	if (document.standaard.detailsinmsg.checked == false){
//	document.standaard.message.value = document.standaard.release.value + "\r" + typedmessage + "\r" + originalmessage;
//	}
	document.title = document.standaard.release.value + ' - ' + titleoriginal;}
	putonmsg();
}

function storemessage() {
 changedmessage = document.standaard.message.value;
 typedmessage = changedmessage.replace(originalmessage,"");
// alert(typedmessage);
 changedmessage = typedmessage + originalmessage;
}

function getRtime(){
recycletime = document.standaard.recycle.value;
putonmsg();
}


function putonmsg() {
	document.standaard.message.value = document.standaard.message.value.replace(details_msg,'');
	document.standaard.message.value = document.standaard.message.value.replace('Team: ' + team + " - " + team_ext , 'Team:');
	document.standaard.message.value = document.standaard.message.value.replace('Release Name: ' + release_name , 'Release Name:');
	document.standaard.message.value = document.standaard.message.value.replace('Release Size: ' + rls_size , 'Release Size:');
	document.standaard.message.value = document.standaard.message.value.replace('Recycle Time: ' + recycletime , 'Recycle Time:');
	document.standaard.message.value = document.standaard.message.value.replace('Release Type: ' + document.standaard.section.value , 'Release Type:');
	document.standaard.message.value = document.standaard.message.value.replace('FTP Location: ' + '.' + stro_loc + ' ' + stro_loc_ext , 'FTP Location:');
	document.standaard.message.value = document.standaard.message.value.replace('FTP Speed: ' + stro_speed , 'FTP Speed:');
	document.standaard.message.value = document.standaard.message.value.replace('Filler: ' + nick , 'Filler:');
	document.standaard.message.value = document.standaard.message.value.replace('SSL: YES' , 'SSL:' );
	document.standaard.message.value = document.standaard.message.value.replace('SSL: NO' , 'SSL:' );

if (document.standaard.detailsinmsg.checked == true){
	document.standaard.message.value = details_msg + originalmessage;
	document.standaard.message.value = document.standaard.message.value.replace('Team:', 'Team: ' + team + " - " + team_ext);
	document.standaard.message.value = document.standaard.message.value.replace('Release Name:' , 'Release Name: ' + release_name);
	document.standaard.message.value = document.standaard.message.value.replace('Release Size:' , 'Release Size: ' + rls_size);
	document.standaard.message.value = document.standaard.message.value.replace('Recycle Time:' , 'Recycle Time: ' + recycletime);
	document.standaard.message.value = document.standaard.message.value.replace('Release Type:' , 'Release Type: ' + document.standaard.section.value);
	document.standaard.message.value = document.standaard.message.value.replace('FTP Location:' , 'FTP Location: ' + '.' + stro_loc + ' ' + stro_loc_ext);
	document.standaard.message.value = document.standaard.message.value.replace('FTP Speed:' , 'FTP Speed: ' + stro_speed);
	document.standaard.message.value = document.standaard.message.value.replace('Filler:' , 'Filler: ' + nick);
if (document.standaard.sslon.checked) document.standaard.message.value = document.standaard.message.value.replace('SSL:' , 'SSL: YES');
else if (document.standaard.sslon.checked == false) document.standaard.message.value = document.standaard.message.value.replace('SSL:' , 'SSL: NO');
}

else if (document.standaard.detailsinmsg.checked == false){
	document.standaard.message.value = document.standaard.release.value + "\r" + typedmessage + "\r" + originalmessage;
}

}// end funct putonmsg


var currentlyActiveInputRef = false;
var currentlyActiveInputClassName = false;

function highlightActiveInput()
{
	if(currentlyActiveInputRef){
		currentlyActiveInputRef.className = currentlyActiveInputClassName;
	}
	currentlyActiveInputClassName = this.className;
	this.className = 'inputHighlighted';
	currentlyActiveInputRef = this;
}
//***************************************************************************************************************

function blurActiveInput()
{
	this.className = currentlyActiveInputClassName;
}
//***************************************************************************************************************

function initInputHighlightScript()
{
	var tags = ['INPUT','TEXTAREA'];
	
	for(tagCounter=0;tagCounter<tags.length;tagCounter++){
		var inputs = document.getElementsByTagName(tags[tagCounter]);
		for(var no=0;no<inputs.length;no++){
			if(inputs[no].className && inputs[no].className=='doNotHighlightThisInput')continue;
			
			if(inputs[no].tagName.toLowerCase()=='textarea' || (inputs[no].tagName.toLowerCase()=='input' && inputs[no].type.toLowerCase()=='text')){
				inputs[no].onfocus = highlightActiveInput;
				inputs[no].onblur = blurActiveInput;
			}
		}
	}
}
//***************************************************************************************************************

function getloc() {
for (i=0;i<document.standaard.radiolocgroup.length;i++) 
{ 
	if (document.standaard.radiolocgroup[i].checked) 
	{ 
	stro_loc = document.standaard.radiolocgroup[i].id;
	stro_loc_ext = document.standaard.radiolocgroup[i].value;
	SNBoxClicked();

		if (document.standaard.detailsinmsg.checked){
		a=1; // meter a info na mensagem!
		}
	} 
}// end for
putonmsg();
}// endfunction getloc()
//***************************************************************************************************************

function getspeed() {
for (i=0;i<document.standaard.radiospeedgroup.length;i++) 
{ 
	if (document.standaard.radiospeedgroup[i].checked) 
	{ 
	stro_speed = document.standaard.radiospeedgroup[i].value; 
	SNBoxClicked();
	} 
}// end for
putonmsg();
}// endfunction getspeed()

function getsize() {
for (i=0;i<document.standaard.radiosizegroup.length;i++) 
{ 
      if (document.standaard.radiosizegroup[i].checked) 
      { 
             rls_size = document.standaard.radiosizegroup[i].value; 
      } 

}// end for
putonmsg();
//alert(rls_size);
}// endfunction getsize()
//***************************************************************************************************************

function SNBoxClicked() {

if (document.standaard.release.value == "" &&  document.standaard.detailsinsubj.checked == false){ // 00
	if (document.standaard.nickinsubj.checked == true){
	backtag = " [/" + nick + "]";
	return;
	}
	if (document.standaard.nickinsubj.checked == false){
	backtag = "";
	return;
	}
}

if (document.standaard.release.value == "" &&  document.standaard.detailsinsubj.checked == true){  // 01
	getbacktag(); return;
}

if (document.standaard.release.value != "" &&  document.standaard.detailsinsubj.checked == false){ // 10
	
	if (document.standaard.nickinsubj.checked == true){
	backtag = " [/" + nick + "]";
	document.standaard.subject.value = fronttag + release_name + backtag;
	return;
	}
	if (document.standaard.nickinsubj.checked == false){
	backtag = "";
	document.standaard.subject.value = fronttag + release_name + backtag;
	return;
	}
}

if (document.standaard.release.value != "" &&  document.standaard.detailsinsubj.checked == true){  // 11
	getbacktag(); document.standaard.subject.value = fronttag + release_name + backtag; return;
}

}// endfunction SNBoxClicked()


function getfronttag(){

if (document.standaard.teaminsubj.checked == true) fronttag = "[" + team + "] ";
else if (document.standaard.teaminsubj.checked == false) fronttag = "";
SNBoxClicked();

}



//***************************************************************************************************************

function getbacktag(){

if (stro_loc == "" && stro_speed == "" && document.standaard.nickinsubj.checked == false) // 000
	backtag = "";
	
if (stro_loc == "" && stro_speed == "" && document.standaard.nickinsubj.checked == true)  // 001
	backtag = " [/" + nick + "]";
	
if (stro_loc == "" && stro_speed != "" && document.standaard.nickinsubj.checked == false) // 010
	backtag = " [" + stro_speed + "]";
	
if (stro_loc == "" && stro_speed != "" && document.standaard.nickinsubj.checked == true)  // 011
	backtag = " [" + stro_speed + "/" + nick + "]";

if (stro_loc != "" && stro_speed == "" && document.standaard.nickinsubj.checked == false) // 100
	backtag = " [." + stro_loc + "]";

if (stro_loc != "" && stro_speed == "" && document.standaard.nickinsubj.checked == true)  // 101
	backtag = " [." + stro_loc + "/" + nick + "]";

if (stro_loc != "" && stro_speed != "" && document.standaard.nickinsubj.checked == false) // 110
	backtag = " [" + stro_speed + "." + stro_loc + "]";

if (stro_loc != "" && stro_speed != "" && document.standaard.nickinsubj.checked == true)  // 111
	backtag = " [" + stro_speed + "." + stro_loc + "/" + nick + "]";

}
//***************************************************************************************************************

