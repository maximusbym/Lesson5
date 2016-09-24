<?php

if( $_COOKIE['user'] ) {
    $adminCookie = $config['admin_login'].$config['admin_password'].$config['secret_application_key'];
    if( $_COOKIE['user'] === sha1($adminCookie) )
        $_SESSION['admin_user'] = 1;
}
