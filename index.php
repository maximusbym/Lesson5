<?php

session_start();

// установка кук
//setcookie("user","13", time() + 30 * 24 * 60 * 60, "/");
//setcookie("pass",md5("pass"), time() + 30 * 24 * 60 * 60, "/");

//// часовые пояса
//date_default_timezone_set("UTC");
//echo "UTC:".date("H:i",time());
//echo "<br>";
//
//date_default_timezone_set("Europe/Kiev");
//echo "Europe/Kiev:".date("H:i",time());
//echo "<br>";
//
//date_default_timezone_set("Asia/Bangkok");
//echo ini_get('date.timezone');
//echo '<br/>';
//
//// юникс-время
//$unixTime = time();
//echo $unixTime;
//echo "<br>";

// вывод даты
//echo date( "d-m-Y H:i", time() + 24 * 60 * 60 );

// провверка валидности даты по календарю
//var_dump(checkdate(12, 31, 2000)); // true
//var_dump(checkdate(2, 29, 2001)); // false - год не высокосный

//$date = "1.6.16 19-59";
//$time = "16H30";
//// ручная сборка даты через mktime
//echo date('D d/m/Y H.i', mktime(19, 59, 0, 6, 1, 2016));
//echo "<br>";

//// считка даты по стандарту
//echo strtotime("22.09.2016 00:00 Europe/Amsterdam");
//echo "<br>";


//// Отправка фала, будем передавать pptx
//header('Content-Type: application/vnd.openxmlformats-officedocument.presentationml.presentation');
//
//// Который будет называться downloaded.pptx
//header('Content-Disposition: attachment; filename="downloaded.pptx"');
//
//// Исходный файл
//readfile('files/57dadc2305be7');
//
//// $_FILES['input_tag_name']['type']
//

// Отправка емейла
//mail('xx@xx.com',
//    'Hello',
//    'How do you do?');

//
////============================== логин и пароль админа, где-то вынесено
//include "config.php";
//$config = [
//    'admin_login' => 'admin',
//    'admin_pass' => md5('123123')
//];
////==============================
//
////============================== проверка уже когда-то залогиневшихся юзеров
//include "user_filter.php";
//
//if( $_COOKIE['user_id'] && $_COOKIE['user_pass'] ) {
//    if( md5($_COOKIE['user_pass']) === $config['admin_pass'] )
//        $_SESSION['active_user'] = 1;
//}
////==============================

// Константа - путь к нашей базе сообщений
define( "MESSAGES_TXT_PATH", 'database/database.txt');
define( "FILES_TXT_PATH", 'database/database.txt');

// Наши функции - помощники
include "helpers.php";

// Бизнес логика приложения - контролирует то, что происходит в программе
include "controller.php";




