<?php


define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'functions.php');


function includeTemplate( string  $nombre, bool $inicio = false ) {
    include TEMPLATES_URL . "/{$nombre}.php"; 
}

function isAuthenticated() {
    session_start();

    if(!$_SESSION['login']) {
        header('Location: /');
    }
}

function debug($variable) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}


// Valida tipo de petición
function validateContentType($type){
    $types = ['habitat', 'animal'];
    return in_array($type, $types);
}

// Muestra los mensajes
function showNotification($code) {
    $message = '';

    switch ($code) {
        case 1:
            $message = 'Propiedad Creado Correctamente';
            break;
        case 2:
            $message = 'Propiedad Actualizado Correctamente';
            break;
        case 3:
            $message = 'Propiedad Eliminado Correctamente';
            break;
        case 4:
            $message = 'Vendedor Registrado Correctamente';
            break;
        default:
            $message = false;
            break;
    }
    return $message;
}

