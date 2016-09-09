<?php

// Наши данные, модель
$messages = array(
  0 => array(
    'sender' => 'max',
    'email' => 'max@xx.xx',
    'message' => ' text <p>text</p> <h1>text</h2> <br/><br/>text <hr/> text',
  ),
  1 => array(
    'sender' => 'max',
    'email' => 'max@xx.xx',
    'message' => 'text <p>text</p> <h1>text</h2> <br/><br/>text <hr/> text',
  ),
  2 => array(
    'sender' => 'max',
    'email' => 'max@xx.xx',
    'message' => 'text text text text text',
  )
);

// Очистка данных
function dataSanitize( $array ) {
		
	// принимаем значенния элементов по ссылке, они изменяться в передаваемом массиве
	foreach($array as $key => &$val) {
		
		$val['message'] = str_replace('<br/>', PHP_EOL, $val['message']);
		$val['message'] = ucfirst( trim( strip_tags($val['message'])));

		// Делает очистку тоже, по примеру strip_tags
		//$val['message'] = filter_var( $val['message'], FILTER_SANITIZE_STRING );
		
		// Можно и так изменять данные в массиве с глобальной области видимости
		//$array[$key]['message'] = str_replace('<br/>', PHP_EOL, $val['message']);
	}
	
	return $array;
}

// Сохраненние данных
function saveData( $data ) {

	// проверяем существует ли директория
	if( !file_exists('database') ) {
		// если нет, создаем
		mkdir('database');
	}
	// сохраняем данные массива, зашифрованные в строку
	$res = file_put_contents('database/database.txt', serialize($data));
	
	// возвращаем результат сохраненния
	return $res;
}

// Вычитка данных
function readData( $path ) {
	// считываем данные по полученному пути
	$tmp = file_get_contents($path);
	// расшифровываем данные со строки в массив
	$messages = unserialize($tmp);
	// возвращаем массив
	return $messages;
}

// Измененние в тексте перед выводом
function textChange( $array ) {
	// изменяем элементы массива как нам нужно
	foreach($array as $key => &$val) {
		$val['message'] = nl2br($val['message']);
	}	
	return $array;
}

// Бизнес логика приложения
$messages = dataSanitize($messages);
saveData($messages);
$newMessages = readData('database/database.txt');
$newMessages = textChange($newMessages);

// Вывод результатов
include "view.php";



