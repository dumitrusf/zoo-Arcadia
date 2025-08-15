<?php
// Aquí definimos la clase para interactuar con la bdd parametrando los argumentos mediante la ejecución de la consulta a la bdd
class Employee
{

    // atributos que tendra el empleado al crearlo desde esta plantilla instanciandolo
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $role_id;
    public $psw;
    public $created_at;
    public $updated_at;

    // constructor de la clase empleado, que apunta con this a los mismos atributos de la clase sin ($)
    public function __construct($id, $first_name, $last_name, $email, $role_id, $psw, $created_at, $updated_at){
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->role_id = $role_id;
        $this->psw = $psw;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    // método para obtener todos los empleados de la bdd
    public static function check() {
        // creamos un array vacío para almacenar los empleados
        $employeesList = [];

        // instanciamos la conexión a la bdd, ya que si no lo hacemos, no podremos acceder a la bdd para recuperar nada
        $connectionDB = DB::createInstance();
        
        // creamos la consulta a la bdd, que nos devolverá todos los empleados de la bdd
        $sql = $connectionDB->query("SELECT * FROM users");

        // recorremos los empleados obtenidos de la bdd, y los guardamos en el array $employeesList hay que almacenarlos en algún lugar no?
        // para cada iteración de consulta, se crea un nuevo objeto Employee y se agrega al array $employeesList
        foreach($sql->fetchAll() as $employee){

            // guardamos en employeeList los empleados de la bdd en este array para poder mostrarlos en el controlador
            $employeesList[] = new Employee($employee["id_user"], $employee["u_first_name"], $employee["u_last_name"], $employee["email"], $employee["role_id"], $employee["psw"], $employee["created_at"], $employee["updated_at"]); 
        }

        // devolvemos el array de empleados
        return $employeesList;
        
    } 

    // método para crear un nuevo empleado en la bdd
    public static function create($first_name, $last_name, $email, $role_id, $psw) {
        // instanciamos la conexion a la bdd
        $connectionDB = DB::createInstance();
        
        // creamos la consulta a la bdd
        $query = "INSERT INTO users (u_first_name, u_last_name, email, role_id, psw) VALUES (?, ?, ?, ?, ?)";

        // preparamos la conexion de la consulta a la bdd
        $sql = $connectionDB->prepare($query);

        // ejecutamos la consulta ya preparada previamente
        $sql->execute([$first_name, $last_name, $email, $role_id, $psw]);
        
        // devolvemos el id del empleado creado
        return $connectionDB->lastInsertId();
    }
}