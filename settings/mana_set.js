function verify_all(tid){
var list = document.getElementById('myTable'+tid).getElementsByTagName('input');
	for (var i = 0; i < list.length; ++i) {
	if (list[i].type == 'button' && list[i].value=='Check') {
		list[i].click(); 
		}
	}//end for
}//end funct


function submitForm(line_n,tid){ //used on status check clicked f(line number, table id)
nid = 'l_'+tid+'_'+line_n;
document.getElementById(nid).innerHTML = "<img src=\"img/loader.gif\" onmouseover=\"Tip('Loading...', BALLOON, true, ABOVE, true, WIDTH, '0px')\" onmouseout=\"UnTip()\">"; //++

if(window.XMLHttpRequest){
	var xmlReq = new XMLHttpRequest();
} else if(window.ActiveXObject) {
	var xmlReq = new ActiveXObject('Microsoft.XMLHTTP');
}

xmlReq.onreadystatechange = function(){
if(xmlReq.readyState == 4){

nid = 'tr_'+tid+'_'+line_n;
document.getElementById(nid).innerHTML = xmlReq.responseText;

//estava isto:
//nid = 'l_'+tid+'_'+line_n;
//document.getElementById(nid).innerHTML = xmlReq.responseText;

}

}

//formData = "username=johndoe" + "&valor2=" + v;
formData = "line=" + line_n + "&" + "tid=" + tid;
//xmlReq.open(f.method, f.action, true);
xmlReq.open('POST', 'status_check.php', true);
xmlReq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xmlReq.send(formData);
return false;
}



//Get ftp details on the fly, used with ftp textbox Onchange
function submitftp(id){
stro = document.getElementById('ftp_id_'+id).value;
stro.replace(/\n/g,'');
stro.replace(/\r/g,'');
stro.replace(/ /g,'');
if (stro == '') return;
get_content(id);

inserte = 'country_'+id;
document.getElementById(inserte).innerHTML = "<img src=\"img/loader.gif\" onmouseover=\"Tip('Loading...', BALLOON, true, ABOVE, true, WIDTH, '0px')\" onmouseout=\"UnTip()\" style=\"float: center\">";
if(window.XMLHttpRequest){
	var xmlReq = new XMLHttpRequest();
} else if(window.ActiveXObject) {
	var xmlReq = new ActiveXObject('Microsoft.XMLHTTP');
}

xmlReq.onreadystatechange = function(){
if(xmlReq.readyState == 4){
document.getElementById(inserte).innerHTML = xmlReq.responseText;
}

}

//formData = "username=johndoe" + "&valor2=" + v;
formData = "stro=" + stro; 
//xmlReq.open(f.method, f.action, true);
xmlReq.open('POST', 'add_ftp_check.php', true);
xmlReq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xmlReq.send(formData);

return false;
}

function get_content(id){ // get ftp content and status on text change

stro = document.getElementById('ftp_id_'+id).value;

document.getElementById('status_'+id).innerHTML = "<img src=\"img/loader.gif\" onmouseover=\"Tip('Loading...', BALLOON, true, ABOVE, true, WIDTH, '0px')\" onmouseout=\"UnTip()\" style=\"float: center\">";
if(window.XMLHttpRequest){
	var xmlReq = new XMLHttpRequest();
} else if(window.ActiveXObject) {
	var xmlReq = new ActiveXObject('Microsoft.XMLHTTP');
}

xmlReq.onreadystatechange = function(){
if(xmlReq.readyState == 4){
document.getElementById('status_'+id).innerHTML = xmlReq.responseText;
}

}

//formData = "username=johndoe" + "&valor2=" + v;
formData2 = "stro=" + stro; 
//xmlReq.open(f.method, f.action, true);
xmlReq.open('POST', 'add_ftp_status.php', true);
xmlReq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xmlReq.send(formData2);
return false;


}



//save ftp and details used with save button clicked
function save_stro(id){

if(window.XMLHttpRequest){
	var xmlReq = new XMLHttpRequest();
} else if(window.ActiveXObject) {
	var xmlReq = new ActiveXObject('Microsoft.XMLHTTP');
}

xmlReq.onreadystatechange = function(){
	if(xmlReq.readyState == 4){
	//main_t_body = document.getElementById('t_main_body').innerHTML;
	document.getElementById('t_main_body1').innerHTML += xmlReq.responseText; //insert the new table row with all the details
	}
}

//formData = "username=johndoe" + "&valor2=" + v;
stro = "stro=" + document.getElementById('ftp_id_'+id).value;
ssl = "ssl=" + document.getElementById('ssl_'+id).checked;
country = "country="+document.getElementById('country_'+id).innerHTML;
status = "status="+document.getElementById('status_'+id).innerHTML
team = "team=" + document.getElementById('team_id_'+id).value;
details = "details=" + document.getElementById('details_id_'+id).value;
cena = document.getElementById('stro_type_id_'+id).selectedIndex;
stro_type = "stro_type=" + document.getElementById('stro_type_id_'+id)[cena].value;
formData = stro + "&" + ssl + "&" + country + "&" + team + "&" + details + "&" + stro_type + "&" + status;
xmlReq.open('POST', 'add_new_ftp.php', true);
xmlReq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xmlReq.send(formData);
return false;
}


function reset_add(id){
document.getElementById('ftp_id_'+id).value = "";
document.getElementById('ssl_'+id).checked = false;
document.getElementById('country_'+id).innerHTML = "Country";
document.getElementById('status_'+id).innerHTML = "Status";
document.getElementById('team_id_'+id).value = "";
document.getElementById('details_id_'+id).value = "";
document.getElementById('stro_type_'+id).selectedIndex = "";
}


function togle(id) { //Show hide details table
//id is hidden div id id = 1_1 1_2 1_3 1_4 ... 2_1  2_2  2_3  2_4
//id1, id2 = diva1_1 divb1_1  diva1_2... divb1_2  diva2_2  divb2_2...

document.getElementById('det_ftp_table').setAttribute('lili',id);

id1 = 'diva' + id;
id2 = 'divb' + id;

if (document.getElementById('det_ftp_table').style.display == "none"){
document.getElementById('det_ftp_table').style.display = "";
document.getElementById('ip_details_id').innerHTML = document.getElementById(id1).innerHTML;
document.getElementById('ftp_contents_id').innerHTML = document.getElementById(id2).innerHTML;

} else if (document.getElementById('det_ftp_table').style.display == "" && document.getElementById('ftp_contents_id').innerHTML == document.getElementById(id2).innerHTML){

document.getElementById('det_ftp_table').style.display = "none";

} else if (document.getElementById('det_ftp_table').style.display == "" && document.getElementById('ftp_contents_id').innerHTML != document.getElementById(id2).innerHTML){
document.getElementById('det_ftp_table').style.display = "";
document.getElementById('ip_details_id').innerHTML = document.getElementById(id1).innerHTML;
document.getElementById('ftp_contents_id').innerHTML = document.getElementById(id2).innerHTML;

}

}//end function togle

function expand_(to){ //go to next or previous stro
line = document.getElementById('det_ftp_table').getAttribute('lili');
l = parseInt(line.substring(2));
t = line.substring(0,1);
if (to == 'next' ){
	nextline = l + 1; nextline = String(nextline);
} else if (to == 'back' ) {
	nextline = l - 1; nextline = String(nextline);
}
id1 = 'diva' + t + '_' + nextline;
id2 = 'divb' + t + '_' + nextline;
document.getElementById('ip_details_id').innerHTML = document.getElementById(id1).innerHTML;
document.getElementById('ftp_contents_id').innerHTML = document.getElementById(id2).innerHTML;
document.getElementById('det_ftp_table').setAttribute('lili', t + '_' + nextline);
}


function hidedet_table(){ document.getElementById('det_ftp_table').style.display = "none"; }


function verify_lines(tid){

//if ( tid == 2) {id_t2 = "2_"; } else {id_t2 = ""; tid = "";}

var list = document.getElementById('myTable'+tid).getElementsByTagName('input');

for (var i = 0; i < list.length; ++i) {
	if (list[i].type == 'checkbox') {
		if (list[i].checked) {
			nid = 'c_'+tid+'_';
			id = list[i].id.replace(nid,''); //++
			submitForm(id,tid);
		}
	}
}//end for
}//end funct

function delete_(id){
answer = confirm("This Stro will be moved to 'Deleted List'. Are you sure?");

	if (answer){
		document.getElementById('c_'+id).checked = true;
		delete_lines();
	} else {
		return;
	}

}

function delete_lines(){
	
	list = document.getElementById('myTable1').getElementsByTagName('input');
	n=0;
	line = new Array();
	for (var i = 0; i < list.length; ++i) {
		if (list[i].type == 'checkbox' && list[i].checked == true) {
			nid = 'c_1_';
			line[n] = list[i].id.replace(nid,'');
			
			n++;
		}
	}//end for

for (i = 0; i < line.length; i++) {
	trid = 'tr_1_' + line[i];

	document.getElementById('t_main_body2').innerHTML += document.getElementById(trid).innerHTML;
	
	el_diva = document.getElementById('diva1_' + line[i]);
	el_divb = document.getElementById('divb1_' + line[i]);

	//diva_inner = "<div>" + line[i] + el_diva.innerHTML + "</div>";
	//document.getElementById('t_main_body2').innerHTML += diva_inner;
	//divb_inner = "<div style='display:none' id='divb2_'" + line[i] "'>" + el_divb.innerHTML + "</div>";
	//document.getElementById('t_main_body2').innerHTML += divb_inner;
	el_tr = document.getElementById(trid);
	el_tr.parentNode.removeChild(el_tr);
	el_diva.parentNode.removeChild(el_diva);
	el_divb.parentNode.removeChild(el_divb);

request(line[i]);

}
} //end funct delete_lines()

function request(line){

	if(window.XMLHttpRequest){
		var xmlReq = new XMLHttpRequest();
	} else if(window.ActiveXObject) {
		var xmlReq = new ActiveXObject('Microsoft.XMLHTTP');
	}
	
	xmlReq.onreadystatechange = function(){
		if(xmlReq.readyState == 4){
		//xmlReq.responseText;
		//alert('Line '+trid+' Moved to delete list.');
		}
	}
	
		//formData = "username=johndoe" + "&valor2=" + v;
		formData = "line=" + line; 
		//xmlReq.open(f.method, f.action, true);
		xmlReq.open('POST', 'delete_ftp.php', true);
		xmlReq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlReq.send(formData);
		return false;
}


function clip(inElement) {
	
		var flashcopier = 'flashcopier';
		if(!document.getElementById(flashcopier)) {
		  var divholder = document.createElement('div');
		  divholder.id = flashcopier;
		  document.body.appendChild(divholder);
		}
		document.getElementById(flashcopier).innerHTML = '';
		var divinfo = '<embed src="settings/_clipboard.swf" FlashVars="clipboard='+escape(inElement)+'" width="0" height="0" type="application/x-shockwave-flash"></embed>';
		document.getElementById(flashcopier).innerHTML = divinfo;
	}


function set_(what,tid){
list = document.getElementById('t_main_body'+tid).getElementsByTagName('tr');
list2 = document.getElementById('t_main_body'+tid).getElementsByTagName('input');

if (what == 'none') {
for (var i = 0; i < list2.length; ++i) {
	if (list2[i].type == 'checkbox') 
	list2[i].checked = false;
}//end for

} else if (what == 'invert') {
for (var i = 0; i < list2.length; i++) {
	if (list2[i].type == 'checkbox' && list2[i].checked == true){
	list2[i].checked = false;
	} else if (list2[i].type == 'checkbox' && list2[i].checked == false){
	list2[i].checked = true;
	}
}//end for

} else {

for (i = 0; i < list.length; i++) {
	if ( list[i].innerHTML.search(what+'.gif') > 0) {
		id = list[i].id.replace('tr_'+tid+'_','');
		nid = 'c_'+tid+'_'+id; //++
		if (document.getElementById(what+tid).checked == true){
			document.getElementById(nid).checked = true;
		} else if (document.getElementById(what+tid).checked == false){
			document.getElementById(nid).checked = false;
		}
		//alert(id);	
	}
}//end for

}

}


function hide_(what){

if (what == 'next'){
document.getElementById(what).style.display = 'none';
document.getElementById('previous').style.display = '';
} else if (what == 'previous'){
document.getElementById(what).style.display = 'none';
document.getElementById('next').style.display = '';
}

}
