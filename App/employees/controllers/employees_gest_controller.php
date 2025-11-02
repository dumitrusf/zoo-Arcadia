
<?php

require_once __DIR__ . "/../models/employee.php";

require_once __DIR__ . "/../../roles/models/role.php";

require_once __DIR__ . "/../../../database/connection.php";
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

        $genders = ["male", "female"];
        $marital_status = ["Single", "Married", "Divorced", "Widowed"];

        $roles = Role::check();


        if ($_POST) {
            // print_r($_POST);
            $first_name = $_POST['firstname'];
            $last_name = $_POST['lastname'];
            $birthdate = $_POST['birthdate'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $zip_code = $_POST['zip_code'];
            $country = $_POST['country'];
            $gender = $_POST['gender'];
            $marital_status = $_POST['marital_status'];
            $employee_id = Employee::create($first_name, $last_name, $birthdate, $phone, $email, $address, $city, $zip_code, $country, $gender, $marital_status);
            // print_r("<br>" . $employee_id);
            // redireccionamos a la pagina de inicio
            header("Location: /employees/gest/start");
        }


        include_once __DIR__ . "/../views/gest/create.php";
    }

    public function delete()
    {
        echo "<br>";
        print_r($_GET);
        $id_employee = $_GET["id"];

        // Accedemos a la clase interna estática del modelo employee parametrando con id el método delete
        Employee::delete($id_employee);

        // redireccionamos a la pagina de inicio
        header("Location: /employees/gest/start");
    }


    public function edit()
    {

        $genders = ["male", "female"];
        $marital_status = ["single", "married", "divorced", "widowed"];

        $id_employee = $_GET["id"];

        $employee = Employee::find($id_employee);


        // ¡Añadido! Cargar la lista de todos los roles disponibles
        $roles = Role::check();

        print_r($employee);

        if ($_POST) {
            // print_r($_POST);
            $id_employee = $_POST['id'];
            $first_name = $_POST['firstname'];
            $last_name = $_POST['lastname'];
            $birthdate = $_POST['birthdate'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $zip_code = $_POST['zip_code'];
            $country = $_POST['country'];
            $gender = $_POST['gender'];
            $marital_status = $_POST['marital_status'];
            $employee_id = Employee::update($id_employee, $first_name, $last_name, $birthdate, $phone, $email, $address, $city, $zip_code, $country, $gender, $marital_status);
            // print_r("<br>" . $employee_id);
            // redireccionamos a la pagina de inicio

            
            
            header("Location: /employees/gest/start");
        }




        include_once __DIR__ . "/../views/gest/edit.php";
    }
}
