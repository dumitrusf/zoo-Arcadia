<?php

include_once __DIR__ . "/../../../database/connection.php";
// Incluyo el archivo que tiene la clase DB para poder conectarme a la base de datos.

DB::createInstance();
// Call the static method createInstance() of the DB class.
// This method returns a PDO connection ready to use, following the Singleton pattern.
// If it is the first time it is called, it creates the connection. If it already exists, it reuses the same one.

class EmployeesPagesController{
    public function start(){
        // Include the view to display the start page (just a code chore (a test!))
        include_once __DIR__ . "/../employees/gest/start.php";
    }
}

?>