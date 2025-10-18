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
    public function __construct($id_employee, $first_name, $last_name, $birthdate, $phone, $email, $address, $city, $zip_code, $country, $gender, $marital_status, $r_role_name, $created_at, $updated_at)
    {
        $this->id = $id_employee;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->birthdate = $birthdate;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
        $this->city = $city;
        $this->zip_code = $zip_code;
        $this->country = $country;
        $this->gender = $gender;
        $this->marital_status = $marital_status;
        $this->role_name = $r_role_name;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
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
            $employeesList[] = new Employee($employee["id_employee"], $employee["first_name"], $employee["last_name"], $employee["birthdate"], $employee["phone"], $employee["email"], $employee["address"], $employee["city"], $employee["zip_code"], $employee["country"], $employee["gender"], $employee["marital_status"], $employee["role_name"], $employee["created_at"], $employee["updated_at"]);
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
        $query = "INSERT INTO employees (first_name, last_name, birthdate, phone, email, address, city, zip_code, country, gender, marital_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

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
        return new Employee($employee["id_employee"], $employee["first_name"], $employee["last_name"], $employee["birthdate"], $employee["phone"], $employee["email"], $employee["address"], $employee["city"], $employee["zip_code"], $employee["country"], $employee["gender"], $employee["marital_status"], $employee["role_name"], $employee["created_at"], $employee["updated_at"]);
    }

    public static function withoutUserEmployee()
    {

        $employeesList = [];
        
        // instanciamos la conexion a la bdd
        $connectionDB = DB::createInstance();

        // creamos la consulta a la bdd
        $query = "SELECT e.id_employee, e.last_name
                  FROM employees e
                  LEFT JOIN users u ON e.id_employee = u.employee_id
                  WHERE u.employee_id IS NULL";

        // preparamos la conexion de la consulta a la bdd
        $sql = $connectionDB->prepare($query);

        // ejecutamos la consulta ya preparada previamente
        $sql->execute();

        // guardamos el primer resultado de la consulta en una variable
        return $sql->fetchAll(PDO::FETCH_OBJ);

    }


    public static function update($id_employee, $first_name, $last_name, $birthdate, $phone, $email, $address, $city, $zip_code, $country, $gender, $marital_status)
    {
        // instanciamos la conexion a la bdd
        $connectionDB = DB::createInstance();

        // creamos la consulta a la bdd
        $query = "UPDATE employees SET first_name = ?, last_name = ?, birthdate = ?, phone = ?, email = ?, address = ?, city = ?, zip_code = ?, country = ?, gender = ?, marital_status = ?, updated_at = NOW() WHERE id_employee = ?";

        // preparamos la conexion de la consulta a la bdd
        $sql = $connectionDB->prepare($query);

        // ejecutamos la consulta ya preparada previamente
        $sql->execute([$first_name, $last_name, $birthdate, $phone, $email, $address, $city, $zip_code, $country, $gender, $marital_status, $id_employee]);
    }
}
