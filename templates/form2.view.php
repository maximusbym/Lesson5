

<?php

foreach( $data['messages'] as $val ) {
    echo $val['comment'].'<br/>';
    echo '<a href="/'.$val['file_link'].'" target="_blank">'.$val['file_link'].'</a><br/>';
    echo '<hr/>';
}
?>

<form action="/form2" method="POST" enctype="multipart/form-data">

    <label> Name: </label>
    <input type="text" name="name">
    <br/>
    <br/>
    <label> File: </label>
    <input type="file" name="file">
    <br/>
    <br/>
    <input type="submit" value="Save File" />

</form>
