<?php

if( $action == 'form2' ) {

    if (isset($_POST['name']) && isset($_FILES['file']) ) {

        $comment = $_POST['name'];

        $fileExtension = pathinfo(
            $_FILES['file']['name'],
            PATHINFO_EXTENSION
        );

        $filename = uniqid().'.'.$fileExtension;
        $filePath = 'files/'.$filename;

        copy( $_FILES['file']['tmp_name'], $filePath );

        $dataForm = [
            'comment' => $comment,
            'file_link' => $filePath
        ];

        saveData($dataForm, FILES_TXT_PATH);
    }

    $messages = readData(FILES_TXT_PATH);

    view('form2', ['messages' => $messages]);

    exit();
}