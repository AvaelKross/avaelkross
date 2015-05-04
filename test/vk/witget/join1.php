<?php

$mysite = 'http://avaelkross.ru'; //сюда пишем адрес сайта на котором будет установлен виджет. начиная с http:// - все как положено
$mymail = 'avael@list.ru'; //Ваш е-мейл на который вы хотите получать сообщения
$mymailfrom = 'avael@list.ru'; //любой е-мейл, желательно с доменом сайта на котором будет установлен виджет (чтобы письма не попадали в спам)


$myid = $_POST['id'];
$myguid = $_POST['guid'];

$mylink = 'https://api.vk.com/method/likes.getList?type=sitepage&owner_id='.$myid.'&page_url='.$mysite.'?mypp='.$myguid;
print $mylink;
$myjs1 = file_get_contents($mylink);
$myvk1 = json_decode($myjs1);
$mycc = $myvk1->response->users[0];

$myss = 'http://vk.com/id'.$mycc;

//print $myss; 


$to=$mymail;
    $subject='Идентифицирован профиль!';
    $body='Пользователь '.$myss.' идентифицирован при посещении сайта '.$mysite;
    $body .= ' Ссылка на профиль: '.$myss;
    $header = "From: \"Admin\" <".$mymailfrom."/>\n";
    $header .= "Content-type: text/plain; charset=\"utf-8\"";           
    if (!mail($to,$subject,$body,$header))
        $i=0;
     else    
        $i=1;


