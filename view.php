<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head></head>
<body>

<?php

foreach( $messages as $val ) {
=======
<?php

foreach( $newMessages as $val ) {
>>>>>>> df898aa045c5da2cc9ec24124d6ffc59361f5dc6
	echo $val['sender'].'<br/>';
	echo $val['email'].'<br/>';
	echo $val['message'].'<br/>';
	echo '<hr/>';
}
<<<<<<< HEAD
?>

<form action="/" method="POST" >

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
=======

>>>>>>> df898aa045c5da2cc9ec24124d6ffc59361f5dc6
