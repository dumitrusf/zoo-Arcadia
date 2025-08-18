<?php

include_once __DIR__ . "/../models/employee.php";

include_once __DIR__ . "/../../../database/connection.php";
// Incluyo el archivo que tiene la clase DB para poder conectarme a la base de datos.

DB::createInstance();
// Llamo al método estático createInstance() de la clase DB.
// Este método devuelve una conexión PDO lista para usar, siguiendo el patrón Singleton.
// Si es la primera vez que se llama, crea la conexión. Si ya existe, reutiliza la misma.

class EmployeesGestController
{
    public function start()
    {

        $employees = Employee::check();
        // print_r($employees);

        include_once __DIR__ . "/../views/gest/start.php";
    }
    public function create()
    {
        if ($_POST) {
            // print_r($_POST);
            $first_name = $_POST['firstname'];
            $last_name = $_POST['lastname'];
            $email = $_POST['email'];
            $role_id = $_POST['role'];
            $psw = $_POST['password'];
            $employee_id = Employee::create($first_name, $last_name, $email, $role_id, $psw);
            // print_r("<br>" . $employee_id);
            // redireccionamos a la pagina de inicio
            header("Location: ?controller=gest&action=start");
        }
        include_once __DIR__ . "/../views/gest/create.php";
    }

    public function delete()
    {
        echo "<br>";
        print_r($_GET);
        $id = $_GET["id"];

        // Accedemos a la clase interna estática del modelo employee parametrando con id el método delete
        Employee::delete($id);

        // redireccionamos a la pagina de inicio
        header("Location: ?controller=gest&action=start");
    }


    public function edit()
    {

        $id = $_GET["id"];
        $employee = Employee::find($id);
        print_r($employee);
        include_once __DIR__ . "/../views/gest/edit.php";


    }
}
