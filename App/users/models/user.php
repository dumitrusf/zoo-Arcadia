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
        $sql = $connectionDB->query("SELECT e.last_name, e.id_employee,
                                            u.id_user, u.username, u.psw, u.is_active, u.created_at, u.updated_at, u.role_id,
                                            r.role_name
                                     FROM employees e
                                     LEFT JOIN users u ON u.employee_id = e.id_employee
                                     LEFT JOIN roles r ON u.role_id = r.id_role

                                     -- Empleados con o sin usuarios
                                     
                                     UNION
                                     
                                     -- Usuarios sin empleados
                                     SELECT NULL as last_name, NULL as id_employee, 
                                            u.id_user, u.username, u.psw, u.is_active, u.created_at, u.updated_at, u.role_id,
                                            r.role_name
                                     FROM users u
                                     LEFT JOIN roles r ON u.role_id = r.id_role
                                     WHERE u.employee_id IS NULL
                                     
                                     ORDER BY id_employee, id_user");

        // recorremos los empleados obtenidos de la bdd, y los guardamos en el array $employeesList hay que almacenarlos en algún lugar no?
        // para cada iteración de consulta, se crea un nuevo objeto Employee y se agrega al array $employeesList
        foreach ($sql->fetchAll() as $user) {

            // guardamos en employeeList los empleados de la bdd en este array para poder mostrarlos en el controlador
            $usersList[] = new User($user["id_user"], $user["username"], $user["psw"], $user["role_id"], $user["role_name"], $user["id_employee"], $user["last_name"], $user["is_active"], $user["created_at"], $user["updated_at"]);
        }

        // devolvemos el array de empleados
        return $usersList;
    }





    public static function find($id_user)
    {
        // instanciamos la conexion a la bdd
        $connectionDB = DB::createInstance();

        // creamos la consulta a la bdd
        $query = "SELECT u.*, e.id_employee, e.last_name, r.role_name, r.id_role
                  FROM users u
                  LEFT JOIN employees e 
                  ON e.id_employee = u.employee_id
                  LEFT JOIN roles r ON r.id_role = u.role_id
                  WHERE u.id_user = ?";



        // preparamos la conexion de la consulta a la bdd
        $sql = $connectionDB->prepare($query);

        // ejecutamos la consulta ya preparada previamente
        $sql->execute([$id_user]);

        // guardamos el primer resultado de la consulta en una variable
        $user = $sql->fetch();

        // devolvemos el resultado de la consulta
        return new User($user["id_user"], $user["username"], $user["psw"], $user["role_id"], $user["role_name"], $user["employee_id"], $user["last_name"], $user["is_active"], $user["created_at"], $user["updated_at"]);
    }
    
    
    


    // Método para crear un nuevo usuario en la bdd
    public static function create($username, $psw, $role_id, $employee_id)
    {
        $connectionDB = DB::createInstance();

        
        $query = "INSERT INTO users (username, psw, role_id, employee_id) VALUES (?, ?, ?, ?)";
        $sql = $connectionDB->prepare($query);
        $sql->execute([$username, $psw, $role_id, $employee_id]);

        return $connectionDB->lastInsertId();
    }

    
    public static function delete($id_user)
    {
        // instanciamos la conexion a la bdd
        $connectionDB = DB::createInstance();


        // creamos la consulta a la bdd
        $query = "DELETE FROM users WHERE id_user = ?";

        // preparamos la conexion de la consulta a la bdd
        $sql = $connectionDB->prepare($query);

        // ejecutamos la consulta ya preparada previamente
        $sql->execute([$id_user]);
    }

    public static function toggleActive($id_user){
        
        $connectionDB = DB::createInstance();


        $query = "UPDATE users 
                  SET is_active = NOT is_active, 
                  updated_at = NOW() 
                  WHERE id_user = ?";

        $sql = $connectionDB->prepare($query);
        $sql->execute([$id_user]);

                 
    }
    

    public static function withoutEmployeeUser()
    {

        $usersList = [];
        
        // instanciamos la conexion a la bdd
        $connectionDB = DB::createInstance();

        // creamos la consulta a la bdd
        $query = "SELECT u.id_user, u.username
                  FROM users u
                  LEFT JOIN employees e ON u.employee_id = e.id_employee
                  WHERE e.id_employee IS NULL";

        // preparamos la conexion de la consulta a la bdd
        $sql = $connectionDB->prepare($query);

        // ejecutamos la consulta ya preparada previamente
        $sql->execute();

        // guardamos el primer resultado de la consulta en una variable
        return $sql->fetchAll(PDO::FETCH_OBJ);

    }

    public static function update($username, $psw, $role_id, $employee_id, $id_user)
    {
        // instanciamos la conexion a la bdd
        $connectionDB = DB::createInstance();

        // creamos la consulta a la bdd
        $query = "UPDATE users SET username = ?, psw = ?, role_id = ?, employee_id = ?, updated_at = NOW() WHERE id_user = ?";

        // preparamos la conexion de la consulta a la bdd
        $sql = $connectionDB->prepare($query);

        // ejecutamos la consulta ya preparada previamente
        $sql->execute([$username, $psw, $role_id, $employee_id, $id_user]);
    }

    public static function assignAccount($employee_id, $user_id) {
        $connectionDB = DB::createInstance();

        $query = "UPDATE users SET employee_id = ? WHERE id_user = ?";
        $sql = $connectionDB->prepare($query);
        $sql->execute([$employee_id, $user_id]);

    }
    
}
