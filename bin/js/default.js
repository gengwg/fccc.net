/*	
	2008 Foster City Chinese Church
	www.fccc.net JavaScript
*/

/**************************************** mod=hymns ****************************************/
imgout=new Image(22,22);
imgin=new Image(22,22);

/////////////////BEGIN USER EDITABLE///////////////////////////////
	imgout.src="/bin/images/hymns/collapse_thead.gif";
	imgin.src="/bin/images/hymns/collapse_thead_collapsed.gif";
///////////////END USER EDITABLE///////////////////////////////////

//this switches expand collapse icons
function filter(imagename,objectsrc){
	if (document.images){
		document.images[imagename].src=eval(objectsrc+".src");
	}
}

//show OR hide funtion depends on if element is shown or hidden
function toggle_collapse(id) { 
	
	if (document.getElementById) { // DOM3 = IE5, NS6
		if (document.getElementById(id).style.display == "none"){
			document.getElementById(id).style.display = 'block';
			filter(("img"+id),'imgin');			
		} else {
			filter(("img"+id),'imgout');
			document.getElementById(id).style.display = 'none';			
		}	
	} else { 
		if (document.layers) {	
			if (document.id.display == "none"){
				document.id.display = 'block';
				filter(("img"+id),'imgin');
			} else {
				filter(("img"+id),'imgout');	
				document.id.display = 'none';
			}
		} else {
			if (document.all.id.style.visibility == "none"){
				document.all.id.style.display = 'block';
			} else {
				filter(("img"+id),'imgout');
				document.all.id.style.display = 'none';
			}
		}
	}
}


/**************************************** mod=church & view=programme ****************************************/
function viewProgramme() {
	programme.style.display="block";
	sermons.style.display="none";
}
function viewSermons() {
	sermons.style.display="block";
	programme.style.display="none";
}
if (document.images) {
	    pic10on= new Image(32,17);
	pic10on.src="../images/programme/text_download_on.gif";
	    pic11on= new Image(32,17);
	pic11on.src="../images/programme/text_broadband_on.gif";
	    pic12on= new Image(32,17);
	pic12on.src="../images/programme/text_narrowband_on.gif";

	    pic7on= new Image(32,17);
	pic7on.src="../images/programme/text_download_on.gif";
	    pic8on= new Image(32,17);
	pic8on.src="../images/programme/text_broadband_on.gif";
	    pic9on= new Image(32,17);
	pic9on.src="../images/programme/text_narrowband_on.gif";

	    pic4on= new Image(32,17);
	pic4on.src="../images/programme/text_download_on.gif";
	    pic5on= new Image(32,17);
	pic5on.src="../images/programme/text_broadband_on.gif";
	    pic6on= new Image(32,17);
	pic6on.src="../images/programme/text_narrowband_on.gif";

	    pic1on= new Image(32,17);
	pic1on.src="../images/programme/text_download_on.gif";
	    pic2on= new Image(32,17);
	pic2on.src="../images/programme/text_broadband_on.gif";
	    pic3on= new Image(32,17);
	pic3on.src="../images/programme/text_narrowband_on.gif";



	    pic10off= new Image(32,17);
	pic10off.src="../images/programme/text_download_off.gif";
	    pic11off= new Image(32,17);
	pic11off.src="../images/programme/text_broadband_off.gif";
	    pic12off= new Image(32,17);
	pic12off.src="../images/programme/text_narrowband_off.gif";

	    pic7off= new Image(32,17);
	pic7off.src="../images/programme/text_download_off.gif";
	    pic8off= new Image(32,17);
	pic8off.src="../images/programme/text_broadband_off.gif";
	    pic9off= new Image(32,17);
	pic9off.src="../images/programme/text_narrowband_off.gif";

	    pic4off= new Image(32,17);
	pic4off.src="../images/programme/text_download_off.gif";
	    pic5off= new Image(32,17);
	pic5off.src="../images/programme/text_broadband_off.gif";
	    pic6off= new Image(32,17);
	pic6off.src="../images/programme/text_narrowband_off.gif";

	    pic1off= new Image(32,17);
	pic1off.src="../images/programme/text_download_off.gif";
	    pic2off= new Image(32,17);
	pic2off.src="../images/programme/text_broadband_off.gif";
	    pic3off= new Image(32,17);
	pic3off.src="../images/programme/text_narrowband_off.gif";
}

function lightup(imgName) {
	if (document.images) {
		imgOn=eval(imgName + "on.src");
		document[imgName].src= imgOn;
	}
}

function turnoff(imgName) {
	if (document.images) {
		imgOff=eval(imgName + "off.src");
		document[imgName].src= imgOff;
	}
}

/**************************************** mod=hymns ****************************************/
/*
Floating Menu script-  Roy Whittle (http://www.javascript-fx.com/)
Script featured on/available at http://www.dynamicdrive.com/
This notice must stay intact for use
*/

var verticalpos="fromtop"	// "frombottom" or "fromtop"

function JSFX_FloatTopDiv()
{
	var startX = 10,	// position from left
	startY = 74;	// position from top
	var ns = (navigator.appName.indexOf("Netscape") != -1);
	var d = document;
	function ml(id)
	{
		var el=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id];
		if(d.layers)el.style=el;
		el.sP=function(x,y){this.style.left=x;this.style.top=y;};
		el.x = startX;
		if (verticalpos=="fromtop")
		el.y = startY;
		else{
		el.y = ns ? pageYOffset + innerHeight : document.body.scrollTop + document.body.clientHeight;
		el.y -= startY;
		}
		return el;
	}
	window.stayTopLeft=function()
	{
		if (verticalpos=="fromtop"){
		var pY = ns ? pageYOffset : document.body.scrollTop;
		ftlObj.y += (pY + startY - ftlObj.y)/8;
		}
		else{
		var pY = ns ? pageYOffset + innerHeight : document.body.scrollTop + document.body.clientHeight;
		ftlObj.y += (pY - startY - ftlObj.y)/8;
		}
		ftlObj.sP(ftlObj.x, ftlObj.y);
		setTimeout("stayTopLeft()", 10);
	}
	ftlObj = ml("divStayTopLeft");
	stayTopLeft();
}

/**************************************** mod=daycare ****************************************/
function toggleSpecific(elementid) {
  var node = document.getElementById(elementid);
  if(node.style.display == '') {
    node.style.display='none';
  }
  else {
    node.style.display = '';
  }
}
