<?php

if( $action == "login" ) {

    $login = isset($_POST['login']) ? $_POST['login'] : null ;
    $pass = isset($_POST['password']) ? $_POST['password'] : null ;
    // $rememberMe = isset($_POST['remember_me']) ? $_POST['remember_me'] : null ;

    if( $login && $pass ) {

		$checkId = checkUserExists($login, $pass);
		// (null | int) checkUserExists()
		// $res = "SELECT FROM `users` WHERE login = $login, pass = $pass;"
	
        // if( $login === $config['admin_login'] &&
        // sha1($pass.$config['secret_application_key']) === $config['admin_password'] ) {

		if( $checkId ) {
			$_SESSION['user'] = $checkId;
		}
            // $_SESSION['admin_user'] = 1;

		$date = date('Y-m-d H:i:s');	// MySQL date format
			
		"INSERT INTO users SET last_activity = '".date('Y-m-d H:i:s')."'";
			
		// FILE: basket.controller.php
		if( $_action == 'buy-product' && $_id) {
			if( $_SESSION['user'] ) {
				$_SESSION['basket'][] = $_id;
			}
			else {
				$_SESSION['flash'] = 'Зареєструйтеся будь ласка.';
				header('location: /login');
				exit();
			}
		}
			
			
		//HTML BUT BUTTON: <form method="post" action="/buy-product/{id}"><button>BUY</button></form>
			
		// ROUTE: /basket
		// HTML:
		$i = 0;
		foreach( $_SESSION['basket'] as $productId ) {
			$product = getProductById( $productId );
			echo ++$i . $product['title'];
		}
			
		// <form>..email, phone, comment	
			
		// ROUTE: /order POST 
		// MySQL: busket array to string
		serialize( $_SESSION['basket'] );
		json_encode( $_SESSION['basket'] );
		
		
		
			
			
			
			
            if( $rememberMe ) {
                $cookie = $config['admin_login'].$config['admin_password'].$config['secret_application_key'];
                setcookie("user", sha1( $cookie ), time() + 30 * 24 * 60 * 60, "/");
            }

            // header('location: /admin');
            // exit();
        // }
    }

    view('login');
}