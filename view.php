<?php

foreach( $newMessages as $val ) {
	echo $val['sender'].'<br/>';
	echo $val['email'].'<br/>';
	echo $val['message'].'<br/>';
	echo '<hr/>';
}

