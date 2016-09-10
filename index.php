<?php

// Константа - путь к нашей базе сообщений
define( "MESSAGES_TXT_PATH", 'database/database.txt');

// Наши функции - помощники
include "helpers.php";

// Бизнес логика приложения - контролирует то, что происходит в программе
include "controller.php";

// Вывод результатов юзеру
include "view.php";

