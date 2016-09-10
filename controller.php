<?php

// Бизнес логика приложения

// Если есть данные отправленные с формы, мы их сохраняем
if( isset($_POST['form']) ) {
	$dataForm = $_POST['form'];
	$isValid = validate($dataForm);
	if( $isValid ) {
		saveData($dataForm, MESSAGES_TXT_PATH);
	}
}

// Делаем выборку с файла, что бы показать юзеру 
$messages = readData(MESSAGES_TXT_PATH);
if( !empty($newMessages) ) {
	$messages = textChange($newMessages);
}