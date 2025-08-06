<?php
// Aquí definimos la clase para interactuar con la bdd parametrando los argumentos mediante la ejecución de la consulta a la bdd
class Employee
{
    public static function create($u_first_name, $u_last_name, $email, $role_id, $psw) {
        // instanciamos la conexion a la bdd
        $connectionDB = DB::createInstance();
        
        // creamos la consulta a la bdd
        $query = "INSERT INTO users (u_first_name, u_last_name, email, role_id, psw) VALUES (?, ?, ?, ?, ?)";

        // preparamos la conexion de la consulta a la bdd
        $sql = $connectionDB->prepare($query);

        // ejecutamos la consulta ya preparada previamente
        $sql->execute([$u_first_name, $u_last_name, $email, $role_id, $psw]);
        
        // devolvemos el id del empleado creado
        return $connectionDB->lastInsertId();
    }
}