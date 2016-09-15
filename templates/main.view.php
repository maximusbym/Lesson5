<!DOCTYPE html>
<html>
<head></head>
<body>

<?php

foreach( $messages as $val ) {
	echo $val['sender'].'<br/>';
	echo $val['email'].'<br/>';
	echo $val['message'].'<br/>';
	echo '<hr/>';
}
?>

<form action="/" method="POST" enctype="multipart/form-data">

	<label>Name:</label>
	<input type="text" name="form[sender]" />
	<br/>
	<br/>
	<label>Email:</label>
	<input type="text" name="form[email]" />
	<br/>
	<br/>
	<label>Message:</label>
	<textarea name="form[message]"></textarea>
	<br/>
	<br/>
	<input type="submit" value="SEND">

</form>

</body>
</html>