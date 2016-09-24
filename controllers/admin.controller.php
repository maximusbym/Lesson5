<?php

if ( $action == 'admin') {

    $reset = isset($_POST['reset']) ? $_POST['reset'] : null ;

    if ( $reset ) {

    }

    view('admin');

}