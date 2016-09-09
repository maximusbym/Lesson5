<?php

foreach( $newMessages as $val ) {
	echo $val['sender'].'<br/>';
	echo $val['email'].'<br/>';
	echo $val['message'].'<br/>';
	echo '<hr/>';
}

//You can even add more Dollar Signs

  $Bar = "a";
  $Foo = "Bar";
  $World = "Foo";
  $Hello = "World";
  $a = "Hello";

  echo $a; //Returns Hello
  echo ${$a}; //Returns World
  echo $$$a; //Returns Foo
  echo $$$$a; //Returns Bar
  echo $$$$$a; //Returns a

  echo $$$$$$a; //Returns Hello

