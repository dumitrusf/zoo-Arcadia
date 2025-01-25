<?php

namespace App;

class ActiveRecord {

    // Database
    protected static $db;
    protected static $tabla = '';
    protected static $columnasDB = [];

    // Errors
    protected static $errores = [];

    
    // Define the BD connection
    public static function setDB($database) {
        self::$db = $database;
    }

    // Validation
    public static function getErrores() {
        return static::$errores;
    }
    public function validar() {
        static::$errores = [];
        return static::$errores;
    }

    // Records - CRUD
    public function guardar() {
        if(!is_null($this->id)) {
            // update
            $this->actualizar();
        } else {
            // Creating a new record
            $this->crear();
        }
    }

    public static function all() {
        $query = "SELECT * FROM " . static::$tabla;

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    // Look for a record by your ID
    public static function find($id) {
        $query = "SELECT * FROM " . static::$tabla  ." WHERE id = {$id}";

        $resultado = self::consultarSQL($query);

        return array_shift( $resultado ) ;
    }

    // Create a new record
    public function crear() {
        // Sanitize the data
        $atributos = $this->sanitizarAtributos();

        // Insert
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' "; 
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        // Consultation result
        $resultado = self::$db->query($query);

        // Success message
        if($resultado) {
            // Redirect the user.
            header('Location: /admin?resultado=1');
        }
    }

    public function actualizar() {

        // Sanitize the data
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$tabla ." SET ";
        $query .=  join(', ', $valores );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 "; 

        $resultado = self::$db->query($query);

        if($resultado) {
            // Redirect the user.
            header('Location: /admin?resultado=2');
        }
    }

    // Delete a record
    public function eliminar() {
        // Eliminate the register or record ...
        $query = "DELETE FROM "  . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);

        if($resultado) {
            $this->borrarImagen();
            header('location: /admin?resultado=3');
        }
    }

    public static function consultarSQL($query) {
        // Consult the database
        $resultado = self::$db->query($query);

        // Iterate the results
        $array = [];
        while($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        // release memory
        $resultado->free();

        // Return the results
        return $array;
    }

    protected static function crearObjeto($registro) {
        $objeto = new static;

        foreach($registro as $key => $value ) {
            if(property_exists( $objeto, $key  )) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }



    // Identify and join the BD attributes
    public function atributos() {
        $atributos = [];
        foreach(static::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value ) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    public function sincronizar($args=[]) { 
        foreach($args as $key => $value) {
          if(property_exists($this, $key) && !is_null($value)) {
            $this->$key = $value;
          }
        }
    }

    // File up
    public function setImagen($imagen) {
        // Eliminates the previous image
        if( !is_null($this->id) ) {
            $this->borrarImagen();
        }
        // Assign to the image attribute the name of the image
        if($imagen) {
            $this->imagen = $imagen;
        }
    }

    // Eliminate the file
    public function borrarImagen() {
        // Check if there is the file
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }
}