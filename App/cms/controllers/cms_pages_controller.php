<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Cms\Controllers
 * 📂 Physical File:   App/cms/controllers/cms_pages_controller.php
 * 
 * 📝 Description:
 * Controller for static content pages (Services).
 * Shows information about the services of the zoo.
 * 
 * 🔗 Dependencies:
 * - Arcadia\Database\Connection (via database/connection.php)
 * - Arcadia\Cms\Views\Pages\Cms (via App/cms/views/pages/cms.php)
 */

include_once __DIR__ . "/../../../database/connection.php";
// Include the file that has the DB class to be able to connect to the database.

DB::createInstance();
// Call the static method createInstance() of the DB class.
// This method returns a PDO connection ready to use, following the Singleton pattern.
// If it is the first time it is called, it creates the connection. If it already exists, it reuses the same one.

class CmsPagesController{
    public function cms(){
        include_once __DIR__ . "/../views/pages/cms.php";
    }
}

?>