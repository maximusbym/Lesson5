<?php

// Бизнес логика приложения

//ROUTING
if( $_SERVER['REQUEST_URI'] != '/' ) {
    $urlArray = explode('/', $_SERVER['REQUEST_URI']);
    $urlArray = array_filter($urlArray);
    $action = $urlArray[1];
    if( isset($urlArray[2]) ) {
        $subAction = $urlArray[2];
    }
}
else {
    $action = 'main';
}


if( $action == 'main' ) {
    // Если есть данные отправленные с формы, мы их сохраняем
    if (isset($_POST['form'])) {
        $dataForm = $_POST['form'];
        $isValid = validate($dataForm);
        if ($isValid) {
            saveData($dataForm, MESSAGES_TXT_PATH);
        }
    }

    // Делаем выборку с файла, что бы показать юзеру
    $messages = readData(MESSAGES_TXT_PATH);
    if (!empty($newMessages)) {
        $messages = textChange($newMessages);
    }
}
else if( $action == 'form2' ) {

    if (isset($_POST['name']) && isset($_FILES['file']) ) {

        $name = $_POST['name'];

        copy( $_FILES['file']['tmp_name'], 'files/'.uniqid() );



//        $dataForm = $_POST['form'];
//        $isValid = validate($dataForm);
//        if ($isValid) {
//            saveData($dataForm, MESSAGES_TXT_PATH);
//        }
    }
}
elseif ( $action == 'admin ') {

    $login = $_POST['login'];
    $pass = $_POST['pass'];

    if ( $login && $pass &&
        md5($_COOKIE['user_pass']) === $config['admin_pass'] &&
        $login === $config['admin_login']
    ) {

        $_SESSION['admin_user'] = 1;

        if( $_POST['remember_me'] ) {
            setcookie("user_login", "13", time() + 30 * 24 * 3600, '/');
            setcookie("user_password", md5("123123"), time() + 30 * 24 * 3600, '/');
        }

    }
    else {
        $_SESSION['admin_user'] = 0;
    }

    if( $_SESSION['admin_user'] == 1 ) {
        include "templates/admin.main.php";
    }
    else {
        include "templates/login.form.php";
    }
}
else {
    header("HTTP/1.1 404 Not Found");
}

include "view.controller.php";
