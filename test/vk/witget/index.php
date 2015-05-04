<?php
$myid = $_GET['id'];
?>
function myload(a1,a2) {
	setTimeout(function() {
		var a3 = document;
		a4 = a3.getElementsByTagName('script')[0];
		a5 = a3.createElement('script');
		a6 = escape(a3.referrer);
		a5.type = 'text/javascript';
		a5.async = true;
		a5.src = a2+"?id="+a1+"&a6="+a6+"&a7="+Math.random();
		a4.parentNode.insertBefore(a5, a4);
	},1)
}
myload('<?=$myid?>','/witget/index1.php');

