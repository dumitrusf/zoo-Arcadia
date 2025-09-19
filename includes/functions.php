<?php

define("TEMPLATES_URL", __DIR__ . "/templates");
define("FUNCTIONS_URL", __DIR__ . "functions.php");


function includeTemplate( string  $nombre, bool $inicio = false ) {
    include TEMPLATES_URL . "/{$nombre}.php"; 
}

if (!function_exists('get_row_class')) {
    
    function get_row_class(int $rowNumber): string
    {
        return ($rowNumber % 2 == 0) ? 'table-warning' : 'table-primary';

    }

    function get_cell_border_class(int $rowNumber): string
    {
        return ($rowNumber % 2 == 0) ? 'border border-start-5 border-top-0 border-bottom-0 border-end-5 border-primary' : 'border border-start-5 border-top-0 border-bottom-0 border-end-5 border-primary';
    
    }
    
}

