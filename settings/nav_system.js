
function changemenu(where){

/*classes = getElementsByClassName('menu_selected');*/
classes = document.getElementsByClassName('menu_selected');
class_id = classes[0].id;

document.getElementById(where).setAttribute('class','menu_selected');

if (where != class_id)
document.getElementById(class_id).setAttribute('class','menu_table');


url = "menu_start.php";
formData = "section="+where;

document.getElementById('mb1').innerHTML += "<img src='media/loadbar.gif'>";
if(window.XMLHttpRequest){
	var xmlReq = new XMLHttpRequest();
	} else if( window.ActiveXObject ) {
	var xmlReq = new ActiveXObject('Microsoft.XMLHTTP');
	}
	xmlReq.onreadystatechange = function(){
		if(xmlReq.readyState == 4){
		document.getElementById('mb1').innerHTML = xmlReq.responseText;
	}
}
xmlReq.open('POST', url, true);
xmlReq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xmlReq.send(formData);


}


document.getElementsByClassName = function(cl) {
	var retnode = [];
	var myclass = new RegExp('\\b'+cl+'\\b');
	var elem = this.getElementsByTagName('*');
		for (var i = 0; i < elem.length; i++) {
			var classes = elem[i].className;
			if (myclass.test(classes)) retnode.push(elem[i]);
		}
	return retnode;
};


function getElementsByClassName2(strClass, strTag, objContElm) { //this should have been implemented on all browsers!
  strTag = strTag || "*";
  objContElm = objContElm || document;
  var objColl = objContElm.getElementsByTagName(strTag);
  if (!objColl.length &&  strTag == "*" &&  objContElm.all) objColl = objContElm.all;
  var arr = new Array();
  var delim = strClass.indexOf('|') != -1  ? '|' : ' ';
  var arrClass = strClass.split(delim);
  for (var i = 0, j = objColl.length; i < j; i++) {
    var arrObjClass = objColl[i].className.split(' ');
    if (delim == ' ' && arrClass.length > arrObjClass.length) continue;
    var c = 0;
    comparisonLoop:
    for (var k = 0, l = arrObjClass.length; k < l; k++) {
      for (var m = 0, n = arrClass.length; m < n; m++) {
        if (arrClass[m] == arrObjClass[k]) c++;
        if (( delim == '|' && c == 1) || (delim == ' ' && c == arrClass.length)) {
          arr.push(objColl[i]);
          break comparisonLoop;
        }
      }
    }
  }
  return arr;
}

// To cover IE 5.0's lack of the push method
Array.prototype.push = function(value) {
  this[this.length] = value;
}
