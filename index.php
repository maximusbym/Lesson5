<?php

$arr = [1,2,3];
$arr2 = [0,4,5];

$twoArrays = array_merge($arr, $arr2);

var_dump($twoArrays);

exit();

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

function dataSanitize( $array ) {
		
	foreach($array as $key => &$val) {
		
		$val['message'] = str_replace('<br/>', PHP_EOL, $val['message']);
		$val['message'] = ucfirst( trim( strip_tags($val['message'])));

		//$val['message'] = filter_var( $val['message'], FILTER_SANITIZE_STRING );
		
		//$array[$key]['message'] = str_replace('<br/>', PHP_EOL, $val['message']);
	}
	
	return $array;
}

function saveData( $data ) {

	if( !file_exists('database') ) {
		mkdir('database');
	}
	file_put_contents('database/database.txt', serialize($data));
	
	return;
}

function readData( $path ) {
	$tmp = file_get_contents($path);
	$messages = unserialize($tmp);
	return $messages;
}

function textChange( $array ) {
	foreach($array as $key => &$val) {
		$val['message'] = nl2br($val['message']);
	}	
	return $array;
}

$messages = dataSanitize($messages);
saveData($messages);


$newMessages = readData('database/database.txt');
$newMessages = textChange($newMessages);


include "view.php";



