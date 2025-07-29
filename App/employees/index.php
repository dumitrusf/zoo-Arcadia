<?php

$controller = "pages";
$action = "start";


if ( isset( $_GET["controller"]) && isset( $_GET["action"]) ) {

    if(($_GET["controller"] !== "") && ($_GET["action"] !== "")){

        $controller = $_GET["controller"];
        $action = $_GET["action"];
    }
    
    
    // print_r($_GET);
    // print_r($controller . "\n");
    // print_r($action);
}

require_once __DIR__ . "/views/template.php";



?>