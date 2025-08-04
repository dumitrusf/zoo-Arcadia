<?php

include_once __DIR__ . "/../../../database/connection.php";
// Incluyo el archivo que tiene la clase DB para poder conectarme a la base de datos.

DB::createInstance();
// Llamo al método estático createInstance() de la clase DB.
// Este método me devuelve una conexión PDO lista para usar, siguiendo el patrón Singleton.
// Si es la primera vez que se llama, crea la conexión. Si ya existe, reutiliza la misma.

class EmployeesGestController{
    public function start(){
        include_once __DIR__ . "/../views/gest/start.php";
    }
    public function create(){
        if($_POST){
            print_r($_POST);
        }
        include_once __DIR__ . "/../views/gest/create.php";
    }
    public function edit(){
        include_once __DIR__ . "/../views/gest/edit.php";
    }
}
