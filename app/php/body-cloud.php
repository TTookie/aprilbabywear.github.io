<?php
// ----------------------------конфигурация-------------------------- //

$adminemail="babywear.work@gmail.com, mar.klimishina@gmail.com";  // e-mail админа
$email="babywear.work@gmail.com, mar.klimishina@gmail.com"; // почта пользователя по умолчанию
$date=date("d.m.y"); // число.месяц.год
$time=date("H:i"); // часы:минуты:секунды
$backurl="/spasibo";  // На какую страничку переходит после отправки письма

//---------------------------------------------------------------------- //



// Принимаем данные с формы

$city=$_POST['lead_city'];
$phone=$_POST['lead_phone'];
$delivery=$_POST['lead_delivery'];
$message=$_POST['lead_text'];

$msg="
Заявка на боди Облако

Город: $city
Телефон: $phone
Способ доставки: $delivery

";



 // Отправляем письмо админу

mail("$adminemail", "$date $time Сообщение на боди Облако
из $city", "$msg");



// Сохраняем в базу данных

$f = fopen("message.txt", "a+");

fwrite($f," \n $date $time Перезвоните от $phone");

fwrite($f,"\n $msg ");

fwrite($f,"\n ---------------");

fclose($f);



// Выводим сообщение пользователю

print "<script language='Javascript'><!--
function reload() {location = \"$backurl\"}; setTimeout('reload()', 0);
//--></script>

<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

<div style=\"background: url(images/shattered.png); padding-top: 200px; height:100%;\">
<p style=\"font-family:'PT Sans'; font-size: 36px; font-weight:700; text-align:center;\">Спасибо. Ваш запрос отправлен. Мы свяжемся с вами скоро-скоро :) </p>
</div>";
exit;



?>