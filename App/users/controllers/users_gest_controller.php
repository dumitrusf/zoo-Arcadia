
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
            $is_active = $_POST['is_active'];
        // print_r($users);



        include_once __DIR__ . "/../views/gest/start.php";
    }


    public function create()
    {

        $roles = Role::check();
        $employees = Employee::withoutUsersEmployee();
        
        if ($_POST) {
            // print_r($_POST);
            $username = $_POST['username'];
            $password = $_POST['psw'];
            $role = $_POST['role'];
            $employee = $_POST['employee'];
            
            // Convertir string vacío a NULL para employee_id
            $role_id = empty($role) ? null : (int)$role;
            $employee_id = empty($employee) ? null : (int)$employee;
            
            $user_id = User::create($username, $password, $role_id, $employee_id);
            // print_r("<br>" . $employee_id);
            // redireccionamos a la pagina de inicio
            header("Location: ?domain=users&controller=gest&action=start");
        }


        include_once __DIR__ . "/../views/gest/create.php";
    }
}
