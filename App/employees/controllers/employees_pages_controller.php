<?php

include_once __DIR__ . "/../../../database/connection.php";
// Incluyo el archivo que tiene la clase DB para poder conectarme a la base de datos.

DB::createInstance();
// Llamo al método estático createInstance() de la clase DB.
// Este método me devuelve una conexión PDO lista para usar, siguiendo el patrón Singleton.
// Si es la primera vez que se llama, crea la conexión. Si ya existe, reutiliza la misma.

class EmployeesPagesController{
    public function start(){
        include_once __DIR__ . "/../views/pages/start.php";
    }
    public function error(){
        include_once __DIR__ . "/../views/pages/error.php";

    }

}

?>