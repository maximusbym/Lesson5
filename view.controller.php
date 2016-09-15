<?php

include "templates/header.php";

if( $action == 'main' ) {
    include "templates/main.view.php";
}
else if( $action == 'form2' ) {
    include "templates/form2.view.php";
}
else {
    echo "NOT FOUND <br/> GO TO <a href='/'>MAIN PAGE</a>!";
}
