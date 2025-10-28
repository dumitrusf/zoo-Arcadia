
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
        $employees = Employee::withoutUserEmployee();

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
            header("Location: /users/gest/start");
        }


        include_once __DIR__ . "/../views/gest/create.php";
    }

    public function delete()
    {
        $id_user = $_GET['id'];
        User::delete($id_user);
        header("Location: /users/gest/start");
    }


    public function toggleActivation()
    {
        $id_user = $_GET["id"];
        User::toggleActive($id_user);
        header("Location: /users/gest/start");
    }


    public function edit()
    {
        $roles = Role::check();
    
        if (isset($_GET['id'])) {
            // Editamos un usuario que es existente que si existe con empleado existente
            $id_user = $_GET["id"];
            $user_to_edit = User::find($id_user);
            
    
            // Corregido para usar tu nombre de función
            $employees = Employee::withoutUserEmployee();
    
            if (isset($user_to_edit->employee_id) && $user_to_edit->employee_id != null) {
                $assigned_employee = Employee::find($user_to_edit->employee_id);
                array_unshift($employees, $assigned_employee);
            }

            $roles = Role::check();

            print_r($user_to_edit);

            
        } elseif (isset($_GET["assign_to_employee"])){


            $id_employee = $_GET['assign_to_employee'];
            $employee_to_assign = Employee::find($id_employee);

            $unassigned_users = User::withoutEmployeeUser();

        }
    
        // Lógica del POST para la ACTUALIZACIÓN de un usuario
        if ($_POST && isset($_POST['id'])) {
            $id_user = $_POST['id'];
            $username = $_POST['username'];
            $psw = $_POST['psw'];
            $role_id = $_POST['role'];
            $employee_id = $_POST['employee'];
            User::update($username, $psw, $role_id, $employee_id, $id_user);
            
            header("Location: /users/gest/start");
            exit();
        }
    
        include_once __DIR__ . "/../views/gest/edit.php";
    }

    public function assignAccount()
    {
        if ($_POST) {
            $employee_id = $_POST['employee_id'];
            $user_id = $_POST['user_id'];
    
            // Usamos el método que tú creaste en el modelo User.php
            User::assignAccount($employee_id, $user_id);
    
            header("Location: /users/gest/start");
            exit();
        }
    }
    
}
  