<?php
session_start();

////======== конфиги сайта
include "config.php";

////======== проверка уже когда-то залогиневшихся юзеров
include "user_check.php";

// Константа - путь к нашей базе сообщений
define( "MESSAGES_TXT_PATH", 'database/database.txt');
define( "FILES_TXT_PATH", 'database/form2database.txt');

// Наши функции - помощники
include "helpers.php";

// Роутинг - определяем $action
include "routing.php";

// Бизнес логика приложения - контролирует то, что происходит в программе
include "controller.php";
