<?php
include_once __DIR__ . "/../config.php";

class DB {
    // Vale, aquí estoy declarando una clase que va a encargarse de conectarse a la base de datos.
    
    private static $instance = null;
    // Esto de aquí es una propiedad estática. La pongo a null al principio porque todavía no hay conexión.
    // Solo quiero una conexión para todo el proyecto, así que usaré esta misma variable todo el rato.

    public static function createInstance() {
    // Esta función la voy a llamar desde fuera sin necesidad de crear un objeto (porque es static).
    // Y va a devolverme la conexión lista para usar.

        if (!isset(self::$instance)) {
        // Compruebo si ya hay una conexión creada.
        // Uso `self::` porque estoy dentro de la clase y quiero acceder a SU variable estática.
        // Si no hay conexión todavía, entro y la creo.

            $optionsPDO[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            // Esto le dice a PDO que si pasa algo mal, que no me lo diga con un número raro, 
            // sino que lance una excepción para poder capturar el error como dios manda.

            self::$instance = new PDO(
                // Aquí creo la conexión PDO.
                // self::$instance guarda la conexión que estoy creando para poder reutilizarla más tarde.
                
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
                // Aquí construyo el string con el host (servidor), nombre de base de datos y codificación.
                
                DB_USER,
                // Usuario para conectarme (esto está definido en otro archivo, como constante).
                
                DB_PASS,
                // Contraseña de ese usuario.
                
                $optionsPDO
                // Y le paso las opciones que definí arriba, como lo de las excepciones.
            );

            echo "<br> Connected to the database!!!!";
            // Esto solo lo muestro para asegurarme que se conectó bien (útil en pruebas).
        }

        return self::$instance;
        // Devuelvo la conexión, ya sea la que acabo de crear o una que ya existía de antes.
        // Así puedo usarla en cualquier parte del código sin repetir la creación.
    }
}
