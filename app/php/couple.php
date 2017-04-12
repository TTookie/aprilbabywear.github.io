<?
// ----------------------------конфигурация-------------------------- //

$adminemail="paveldenysov@gmail.com";  // e-mail админа
$email="paveldenysov@gmail.com"; // почта пользователя по умолчанию
$date=date("d.m.y"); // число.месяц.год
$time=date("H:i"); // часы:минуты:секунды
$backurl="/";  // На какую страничку переходит после отправки письма

//---------------------------------------------------------------------- //



// Принимаем данные с формы

$name=$_POST['lead_name'];
$phone=$_POST['lead_phone'];
$mail=$_POST['lead_email'];
$message=$_POST['lead_text'];

$msg="
Заявка - Вопрос из формы контактов!

Имя: $name
Телефон: $phone
Кратко вопрос: $message

";



 // Отправляем письмо админу

mail("$adminemail", "$date $time Сообщение
от $name", "$msg");



// Сохраняем в базу данных

$f = fopen("message.txt", "a+");

fwrite($f," \n $date $time Сообщение от $name");

fwrite($f,"\n $msg ");

fwrite($f,"\n ---------------");

fclose($f);



// Выводим сообщение пользователю

print "<script language='Javascript'><!--
function reload() {location = \"$backurl\"}; setTimeout('reload()', 3000);
//--></script>

<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

<div style=\"background: url(images/shattered.png); padding-top: 200px; height:100%;\">
<p style=\"font-family:'PT Sans'; font-size: 36px; font-weight:700; text-align:center;\">Спасибо. Ваш вопрос отправлен. Мы свяжемся с вами в течение 12 часов</p>
</div>";
exit;



?>