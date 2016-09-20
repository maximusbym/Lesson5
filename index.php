<?php
session_start();

var_dump( mail('mail@mail.com',
    'Hello',
    'How do you do?') );

exit();
//==============================
include "config.php";
$config = [
    'admin_login' => 'admin',
    'admin_pass' => md5('123123')
];
//==============================

//==============================
include "user_filter.php";

if( $_COOKIE['user_id'] ) {
    if( $_COOKIE['user_pass'] ) {
        if( md5($_COOKIE['user_pass']) === $config['admin_pass'] )
        $_SESSION['active_user'] = 1;
    }
}
//==============================


// Константа - путь к нашей базе сообщений
define( "MESSAGES_TXT_PATH", 'database/database.txt');
define( "FILES_TXT_PATH", 'database/database.txt');

// Наши функции - помощники
include "helpers.php";

// Бизнес логика приложения - контролирует то, что происходит в программе
include "controller.php";




