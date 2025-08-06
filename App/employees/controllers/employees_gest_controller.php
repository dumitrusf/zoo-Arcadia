<?php

include_once __DIR__ . "/../models/employee.php";

include_once __DIR__ . "/../../../database/connection.php";
// Incluyo el archivo que tiene la clase DB para poder conectarme a la base de datos.

DB::createInstance();
// Llamo al método estático createInstance() de la clase DB.
// Este método devuelve una conexión PDO lista para usar, siguiendo el patrón Singleton.
// Si es la primera vez que se llama, crea la conexión. Si ya existe, reutiliza la misma.

class EmployeesGestController{
    public function start(){
        include_once __DIR__ . "/../views/gest/start.php";
    }
    public function create(){
        if($_POST){
            print_r($_POST);
            $u_first_name = $_POST['employee-name'];
            $u_last_name = $_POST['employee-lastname'];
            $email = $_POST['employee-email'];
            $role_id = $_POST['employee-role'];
            $psw = $_POST['employee-password'];
            $employee_id = Employee::create($u_first_name, $u_last_name, $email, $role_id, $psw);
            print_r("<br>" . $employee_id);
        }
        include_once __DIR__ . "/../views/gest/create.php";
    }
    public function edit(){
        include_once __DIR__ . "/../views/gest/edit.php";
    }
}
