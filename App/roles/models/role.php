<?php
// Aquí definimos la clase para interactuar con la bdd parametrando los argumentos mediante la ejecución de la consulta a la bdd
class Role
{

    // atributos que tendra el empleado al crearlo desde esta plantilla instanciandolo
    public $id_role;
    public $role_name;
    public $role_description;
    public $created_at;
    public $updated_at;

    // constructor de la clase empleado, que apunta con this a los mismos atributos de la clase sin ($)
    public function __construct($id_role, $role_name, $role_description, $created_at, $updated_at){
        $this->id_role = $id_role;
        $this->role_name = $role_name;
        $this->role_description = $role_description;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    // método para obtener todos los roles de la bdd
    public static function check() {
        // creamos un array vacío para almacenar los roles
        $rolesList = [];

        // instanciamos la conexión a la bdd, ya que si no lo hacemos, no podremos acceder a la bdd para recuperar nada
        $connectionDB = DB::createInstance();
        
        // creamos la consulta a la bdd, que nos devolverá todos los roles de la bdd
        $sql = $connectionDB->query("SELECT * FROM roles");

        // recorremos los roles obtenidos de la bdd, y los guardamos en el array $employeesList hay que almacenarlos en algún lugar no?
        // para cada iteración de consulta, se crea un nuevo objeto Employee y se agrega al array $employeesList
        foreach($sql->fetchAll() as $role){

            // guardamos en employeeList los roles de la bdd en este array para poder mostrarlos en el controlador
            $rolesList[] = new Role($role["id_role"], $role["role_name"], $role["role_description"], $role["created_at"], $role["updated_at"]); 
        }

        // devolvemos el array de roles
        return $rolesList;
        
    } 

    // método para crear un nuevo empleado en la bdd
    public static function create($role_name, $role_description) {
        // instanciamos la conexion a la bdd
        $connectionDB = DB::createInstance();
        
        // creamos la consulta a la bdd
        $query = "INSERT INTO roles (role_name, role_description) VALUES (?, ?)";

        // preparamos la conexion de la consulta a la bdd
        $sql = $connectionDB->prepare($query);

        // ejecutamos la consulta ya preparada previamente
        $sql->execute([$role_name, $role_description]);
        
        // devolvemos el id del empleado creado
        return $connectionDB->lastInsertId();
    }

    public static function delete($id_role) {
        // instanciamos la conexion a la bdd
        $connectionDB = DB::createInstance();



        
        

        // creamos la consulta a la bdd
        $query = "DELETE FROM roles WHERE id_user = ?";

        // preparamos la conexion de la consulta a la bdd
        $sql = $connectionDB->prepare($query);

        // ejecutamos la consulta ya preparada previamente
        $sql->execute([$id_role]);

        

    }



    public static function find($id_role) {
        // instanciamos la conexion a la bdd
        $connectionDB = DB::createInstance();

        // creamos la consulta a la bdd
        $query = "SELECT * FROM roles WHERE id_role = ?";

        // preparamos la conexion de la consulta a la bdd
        $sql = $connectionDB->prepare($query);

        // ejecutamos la consulta ya preparada previamente
        $sql->execute([$id_role]);

        // guardamos el primer resultado de la consulta en una variable
        $role = $sql->fetch();

        // devolvemos el resultado de la consulta
        return new Role($role["id_role"], $role["role_name"], $role["role_description"], $role["created_at"], $role["updated_at"]);

    }


    public static function update($id_role, $role_name, $role_description) {
        // instanciamos la conexion a la bdd
        $connectionDB = DB::createInstance();

        // creamos la consulta a la bdd
        $query = "UPDATE roles SET role_name = ?, role_description = ?, updated_at = NOW() WHERE id_role = ?";

        // preparamos la conexion de la consulta a la bdd
        $sql = $connectionDB->prepare($query);

        // ejecutamos la consulta ya preparada previamente
        $sql->execute([$id_role, $role_name, $role_description]);


    }

    
}