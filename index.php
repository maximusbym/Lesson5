<?php

var_dump( $_SERVER['REQUEST_URI'] );

if (strpos($_SERVER['REQUEST_URI'], 'guestbook') !== false) {
	
	// include "GuestBook.php";
	
	$arr = [
		[
			'name' => "Vasya",
			'email' => 'vasya@gmail.com',
			'message' => 'Hi!'
		]
	];
	
	var_dump( json_encode( $arr ) );
	
	$messages = json_decode( file_get_contents( 'db.txt' ) );
	
	array_unshift( $arr, $messages );
	
	file_put_contents( 'db.txt', json_encode( $arr ) );
	
	
	
	include "GuestBookView.php";
	
	foreach( $arr as $message )
	
}
else {
	
	
}

die('bye');

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
