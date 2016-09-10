<?php

// Наши функции - помощники

// Валидация данных
function validate( $array ) {

	// принимаем значенния элементов по ссылке, они изменяться в передаваемом массиве
	foreach($array as $key => $val) {
	
		// Проверяем полученное значение "имя" на длину
		if( $key == 'sender' ) {
			if ( strlen($val) > 255 ) {
				echo "<h3>error: need less charackters</h3>";
				
				// данные невалидные, возвращаем FALSE
				return false;
			}
		}
		// Проверяем "почту" на валидность
		if( $key == 'email' ) {
			// Любая из данных функций делает проверку на наличие "@" в строке:
			// filter_var($val, FILTER_VALIDATE_EMAIL)
			// strstr($val, '@')
			// preg_match("/@/",$val)
			if ( !filter_var($val, FILTER_VALIDATE_EMAIL) || strlen($val) > 255 ) {
				echo "<h3>error: wrong email</h3>";
				return false;
			}
		}		
		if( $key == 'message' ) {
			if( strlen( trim( $val ) ) > 5000 ) {
				echo "<h3>error: string too long</h3>";
				return false;
			}
		}
	}
	
	// Все проверки пройшли успешно
	return true;
}

// Сохраненние данных
function saveData( $data, $path ) {

	// проверяем существует ли директория
	if( !file_exists('database') ) {
		// если нет, создаем
		mkdir('database');
	}
	
	// Читаем существующие данные
	$oldMessages = readData($path);
	
	// Если их нету, создаем массив с текущими данным
	if( !$oldMessages ) {
		$allMessages = [$data];
	}
	else {
		// если есть, добавляем новое сообщение в конец предыдущих
		$allMessages = $oldMessages;
		array_push($allMessages, $data);
	}
	
	// сохраняем все данные, зашифрованные в строку
	$res = file_put_contents($path, serialize( $allMessages ));
	
	// возвращаем результат сохраненния
	return $res;
}

// Вычитка данных
function readData( $path ) {
	
	// Проверяем или файл существует
	if( file_exists($path) ) {
		
		// считываем данные по полученному пути в строку
		$tmpString = file_get_contents($path);
		// расшифровываем данные со строки в массив
		$messages = unserialize($tmpString);
		// возвращаем массив
		return $messages ? $messages : [] ;
	}
	else {
		// если не существует, возвращаем пустой массив
		return [];
	}
}

// Измененние в тексте перед выводом
function textChange( $array ) {
	
	// изменяем элементы массива как нам нужно
	foreach($array as $key => &$val) {
		if( $key == 'message' ) {
			$val = nl2br($val);
		}
	}
	return $array;
}