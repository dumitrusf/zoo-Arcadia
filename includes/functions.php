<?php

define("TEMPLATES_URL", __DIR__ . "/templates");
define("FUNCTIONS_URL", __DIR__ . "functions.php");


function includeTemplate( string  $nombre, bool $inicio = false ) {
    include TEMPLATES_URL . "/{$nombre}.php"; 
}
