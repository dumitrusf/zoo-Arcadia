<?php

require_once __DIR__ . '/../includes/functions.php';

// Si en la URL con get domain no obtenemos el domain por que no hay nada dado, se dara por defecto al dominio employees
$domain = $_GET["domain"] ?? "employees";

// Si en la URL con get controller no obtenemos el controller por que no hay nada dado, se dara por defecto al controlador pages, entonces seria ya... employees/pages en este punto
$controller = $_GET["controller"] ?? "pages";


// Si en la URL con get action no obtenemos el action por que no hay nada dado, se dara por defecto al action start, entonces seria ya... employees/pages/start
$action = $_GET["action"] ?? "start";


// Para construir la ruta del archivo hacia el controlador buscaríamos en donde estamos actualmente con DIR (pues estamos en App) y por consiguiente la ruta de lo que guardamos en $controller, domain y action:
include_once __DIR__ . "/" . $domain . "/controllers/" . $domain . "_" . $controller . "_controller.php";


// Construimos el nombre de la clase del controlador dinámicamente.
// Esto creará el nombre de clase: "EmployeesPagesController"
$controllerClassName = ucfirst($domain) . ucfirst($controller) . "Controller";

// 6️⃣ Capturar la salida del controlador usando output buffering
ob_start(); // Empezar a capturar la salida
$controllerInstance = new $controllerClassName();
$controllerInstance->$action();
$viewContent = ob_get_clean(); // Capturar y limpiar el buffer

// 7️⃣ Para mostrar el template de cada dominio  
require_once __DIR__ . "/{$domain}/views/template.php";
?>