<?php
// Aquí definimos la clase para interactuar con la bdd parametrando los argumentos mediante la ejecución de la consulta a la bdd
class Employee
{

    // atributos que tendra el empleado al crearlo desde esta plantilla instanciandolo
    public $id;
    public $first_name;
    public $last_name;
    public $birthdate;
    public $phone;
    public $email;
    public $address;
    public $city;
    public $zip_code;
    public $country;
    public $gender;
    public $marital_status;
    public $role_name;
    public $created_at;
    public $updated_at;

    // constructor de la clase empleado, que apunta con this a los mismos atributos de la clase sin ($)
    public function __construct($id_employee, $e_first_name, $e_last_name, $e_birthdate, $e_phone, $e_email, $e_address, $e_city, $e_zip_code, $e_country, $e_gender, $e_marital_status, $e_role_name, $e_created_at, $e_updated_at)
    {
        $this->id = $id_employee;
        $this->first_name = $e_first_name;
        $this->last_name = $e_last_name;
        $this->birthdate = $e_birthdate;
        $this->phone = $e_phone;
        $this->email = $e_email;
        $this->address = $e_address;
        $this->city = $e_city;
        $this->zip_code = $e_zip_code;
        $this->country = $e_country;
        $this->gender = $e_gender;
        $this->marital_status = $e_marital_status;
        $this->role_name = $e_role_name;
        $this->created_at = $e_created_at;
        $this->updated_at = $e_updated_at;
    }

    // método para obtener todos los empleados de la bdd
    public static function check()
    {
        // creamos un array vacío para almacenar los empleados
        $employeesList = [];

        // instanciamos la conexión a la bdd, ya que si no lo hacemos, no podremos acceder a la bdd para recuperar nada
        $connectionDB = DB::createInstance();

        // creamos la consulta a la bdd, que nos devolverá todos los empleados de la bdd
        $sql = $connectionDB->query("SELECT e.*, r.role_name, r.id_role
                                     FROM employees e
                                     LEFT JOIN users u 
                                     ON u.employee_id = e.id_employee 
                                     LEFT JOIN roles r ON r.id_role = u.role_id");

        // recorremos los empleados obtenidos de la bdd, y los guardamos en el array $employeesList hay que almacenarlos en algún lugar no?
        // para cada iteración de consulta, se crea un nuevo objeto Employee y se agrega al array $employeesList
        foreach ($sql->fetchAll() as $employee) {

            // guardamos en employeeList los empleados de la bdd en este array para poder mostrarlos en el controlador
            $employeesList[] = new Employee($employee["id_employee"], $employee["e_first_name"], $employee["e_last_name"], $employee["e_birthdate"], $employee["e_phone"], $employee["e_email"], $employee["e_address"], $employee["e_city"], $employee["e_zip_code"], $employee["e_country"], $employee["e_gender"], $employee["e_marital_status"], $employee["role_name"], $employee["created_at"], $employee["updated_at"]);
        }

        // devolvemos el array de empleados
        return $employeesList;
    }

    // método para crear un nuevo empleado en la bdd
    public static function create($first_name, $last_name, $birthdate, $phone, $email, $address, $city, $zip_code, $country, $gender, $marital_status)
    {
        // instanciamos la conexion a la bdd
        $connectionDB = DB::createInstance();

        // creamos la consulta a la bdd
        $query = "INSERT INTO employees (e_first_name, e_last_name, e_birthdate, e_phone, e_email, e_address, e_city, e_zip_code, e_country, e_gender, e_marital_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // preparamos la conexion de la consulta a la bdd
        $sql = $connectionDB->prepare($query);

        // ejecutamos la consulta ya preparada previamente
        $sql->execute([$first_name, $last_name, $birthdate, $phone, $email, $address, $city, $zip_code, $country, $gender, $marital_status]);

        // devolvemos el id del empleado creado
        return $connectionDB->lastInsertId();
    }

    public static function delete($id_employee)
    {
        // instanciamos la conexion a la bdd
        $connectionDB = DB::createInstance();


        // creamos la consulta a la bdd
        $query = "DELETE FROM employees WHERE id_employee = ?";

        // preparamos la conexion de la consulta a la bdd
        $sql = $connectionDB->prepare($query);

        // ejecutamos la consulta ya preparada previamente
        $sql->execute([$id_employee]);
    }



    public static function find($id_employee)
    {
        // instanciamos la conexion a la bdd
        $connectionDB = DB::createInstance();

        // creamos la consulta a la bdd
        $query = "SELECT e.*, r.role_name, r.id_role
                    FROM employees e
                    LEFT JOIN users u 
                    ON u.employee_id = e.id_employee 
                    LEFT JOIN roles r ON r.id_role = u.role_id
                    WHERE e.id_employee = ?";

        // preparamos la conexion de la consulta a la bdd
        $sql = $connectionDB->prepare($query);

        // ejecutamos la consulta ya preparada previamente
        $sql->execute([$id_employee]);

        // guardamos el primer resultado de la consulta en una variable
        $employee = $sql->fetch();

        // devolvemos el resultado de la consulta
        return new Employee($employee["id_employee"], $employee["e_first_name"], $employee["e_last_name"], $employee["e_birthdate"], $employee["e_phone"], $employee["e_email"], $employee["e_address"], $employee["e_city"], $employee["e_zip_code"], $employee["e_country"], $employee["e_gender"], $employee["e_marital_status"], $employee["role_name"], $employee["created_at"], $employee["updated_at"]);
        
    }


    public static function update($id_employee, $first_name, $last_name, $birthdate, $phone, $email, $address, $city, $zip_code, $country, $gender, $marital_status)
    {
        // instanciamos la conexion a la bdd
        $connectionDB = DB::createInstance();

        // creamos la consulta a la bdd
        $query = "UPDATE employees SET e_first_name = ?, e_last_name = ?, e_birthdate = ?, e_phone = ?, e_email = ?, e_address = ?, e_city = ?, e_zip_code = ?, e_country = ?, e_gender = ?, e_marital_status = ?, updated_at = NOW() WHERE id_employee = ?";

        // preparamos la conexion de la consulta a la bdd
        $sql = $connectionDB->prepare($query);

        // ejecutamos la consulta ya preparada previamente
        $sql->execute([$first_name, $last_name, $birthdate, $phone, $email, $address, $city, $zip_code, $country, $gender, $marital_status, $id_employee]);
    }
}

