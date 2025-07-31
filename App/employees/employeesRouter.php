<?php


// Obtenemos el dominio actual ('employees') a partir del directorio del router.
$domain = basename(__DIR__);

echo $domain . " " . $controller . " " . $action . "\n";


// Incluimos el archivo del controlador de forma dinámica usando el dominio.
// Para ?controller=pages, buscará: .../controllers/employees_pages_controller.php
include_once __DIR__ . "/controllers/" . $domain . "_" . $controller . "_controller.php";

// Construimos el nombre de la clase del controlador dinámicamente.
// Esto creará el nombre de clase: "EmployeesPagesController"
$controllerClassName = ucfirst($domain) . ucfirst($controller) . "Controller";

// Instanciamos el controlador y llamamos a la acción.
$controllerInstance = new $controllerClassName();
$controllerInstance->$action();

?>

