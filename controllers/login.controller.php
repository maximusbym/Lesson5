<?php


if( $action == "login" ) {

    $login = isset($_POST['login']) ? $_POST['login'] : null ;
    $pass = isset($_POST['password']) ? $_POST['password'] : null ;
    $rememberMe = isset($_POST['remember_me']) ? $_POST['remember_me'] : null ;

    if( $login && $pass ) {

        if( $login === $config['admin_login'] &&
        sha1($pass.$config['secret_application_key']) === $config['admin_password'] ) {

            $_SESSION['admin_user'] = 1;

            if( $rememberMe ) {
                $cookie = $config['admin_login'].$config['admin_password'].$config['secret_application_key'];
                setcookie("user", sha1( $cookie ), time() + 30 * 24 * 60 * 60, "/");
            }

            header('location: /admin');
            exit();
        }
    }

    view('login');
}