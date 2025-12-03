<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Roles\Controllers
 * 📂 Physical File:   App/roles/controllers/roles_pages_controller.php
 * 
 * 📝 Description:
 * Controller for general pages of roles.
 * Manages redirects and error views related to roles.
 * 
 * 🔗 Dependencies:
 * - Arcadia\Database\Connection (via database/connection.php)
 * - Arcadia\Roles\Views\Pages\Start (via App/roles/views/pages/start.php)
 * - Arcadia\Roles\Views\Pages\Error (via App/roles/views/pages/error.php)
 */

include_once __DIR__ . "/../../../database/connection.php";
// Include the file that has the DB class to be able to connect to the database.

DB::createInstance();
// Call the static method createInstance() of the DB class.
// This method returns a PDO connection ready to use, following the Singleton pattern.
// If it is the first time it is called, it creates the connection. If it already exists, it reuses the same one.

class RolesPagesController{
    public function start(){
        include_once __DIR__ . "/../views/pages/start.php";
    }
    public function error(){
        include_once __DIR__ . "/../views/pages/error.php";

    }

}

?>