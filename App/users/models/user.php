<?php
// Aquí definimos la clase para interactuar con la bdd parametrando los argumentos mediante la ejecución de la consulta a la bdd
class User
{

    // atributos que tendra el empleado al crearlo desde esta plantilla instanciandolo
    public $id;
    public $username;
    public $psw;
    public $role_id;
    public $role_name;
    public $employee_id;
    public $employee_last_name;
    public $is_active;
    public $created_at;
    public $updated_at;

    // constructor de la clase empleado, que apunta con this a los mismos atributos de la clase sin ($)
    public function __construct($id_user, $username, $psw, $role_id, $role_name, $employee_id, $last_name, $is_active, $created_at, $updated_at)
    {
        $this->id = $id_user;
        $this->username = $username;
        $this->psw = $psw;
        $this->role_id = $role_id;
        $this->role_name = $role_name;
        $this->employee_id = $employee_id;
        $this->employee_last_name = $last_name;
        $this->is_active = $is_active;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    // método para obtener todos los empleados de la bdd
    public static function check()
    {
        // creamos un array vacío para almacenar los empleados
        $usersList = [];

        // instanciamos la conexión a la bdd, ya que si no lo hacemos, no podremos acceder a la bdd para recuperar nada
        $connectionDB = DB::createInstance();

        // creamos la consulta a la bdd, que nos devolverá todos los empleados de la bdd
        $sql = $connectionDB->query("SELECT u.*, r.role_name, r.id_role, e.last_name, 
                                            e.id_employee
                                     FROM users u
                                     LEFT JOIN employees e 
                                     ON u.employee_id = e.id_employee 
                                     LEFT JOIN roles r ON r.id_role = u.role_id");

        // recorremos los empleados obtenidos de la bdd, y los guardamos en el array $employeesList hay que almacenarlos en algún lugar no?
        // para cada iteración de consulta, se crea un nuevo objeto Employee y se agrega al array $employeesList
        foreach ($sql->fetchAll() as $user) {

            // guardamos en employeeList los empleados de la bdd en este array para poder mostrarlos en el controlador
            $usersList[] = new User($user["id_user"], $user["username"], $user["psw"], $user["role_id"], $user["role_name"], $user["employee_id"], $user["last_name"], $user["is_active"], $user["created_at"], $user["updated_at"]);
        }

        // devolvemos el array de empleados
        return $usersList;
    }

    




}
