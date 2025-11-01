<?php
// App/permissions/models/permission.php

// Incluimos la conexión a la base de datos.
// Es más seguro incluirla siempre en el controlador.
// require_once __DIR__ . '/../../../database/connection.php';

class Permission {
    // Esta es nuestra CONSULTA (Query) para leer datos

    public $id;
    public $permission_name;
    public $permission_desc;    
    public $created_at;
    public $updated_at;

    public function __construct($id, $permission_name, $permission_desc, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->permission_name = $permission_name;
        $this->permission_desc = $permission_desc;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public static function check()
    {
        // Creamos una instancia de la conexión a la BD
        $connectionDB = DB::createInstance();

        // Preparamos y ejecutamos la consulta SQL
        $sql = $connectionDB->query("SELECT * FROM permissions ORDER BY permission_name ASC");

        
        // Devolvemos todos los resultados como un array asociativo
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
