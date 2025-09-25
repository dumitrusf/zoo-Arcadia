
<?php

include_once __DIR__ . "/../models/user.php";

require_once __DIR__ . "/../../employees/models/employee.php";

require_once __DIR__ . "/../../roles/models/role.php";

include_once __DIR__ . "/../../../database/connection.php";
// Incluyo el archivo que tiene la clase DB para poder conectarme a la base de datos.

DB::createInstance();
// Llamo al método estático createInstance() de la clase DB.
// Este método devuelve una conexión PDO lista para usar, siguiendo el patrón Singleton.
// Si es la primera vez que se llama, crea la conexión. Si ya existe, reutiliza la misma.

class UsersGestController
{
    public function start()
    {

        $users = User::check();
        // print_r($users);



        include_once __DIR__ . "/../views/gest/start.php";
    }



    
}
