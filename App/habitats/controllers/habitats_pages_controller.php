<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Habitats\Controllers
 * 📂 Physical File:   App/habitats/controllers/habitats_pages_controller.php
 * 
 * 📝 Description:
 * Public controller for the visualization of habitats.
 * Shows the list and details of the habitats of the zoo.
 * 
 * 🔗 Dependencies:
 * - Arcadia\Database\Connection (via database/connection.php)
 * - Arcadia\Habitats\Views\Pages\Habitats (via App/habitats/views/pages/habitats.php)
 * - Arcadia\Habitats\Views\Pages\Habitat1 (via App/habitats/views/pages/habitat1.php)
 */

include_once __DIR__ . "/../../../database/connection.php";
// Include the file that has the DB class to be able to connect to the database.

DB::createInstance();
// Call the static method createInstance() of the DB class.
// This method returns a PDO connection ready to use, following the Singleton pattern.
// If it is the first time it is called, it creates the connection. If it already exists, it reuses the same one.

class HabitatsPagesController{
    public function habitats(){
        include_once __DIR__ . "/../views/pages/habitats.php";
    }

    // public function habitat($habitat_id){
    //     includeTemplate("nav");
    //     include_once __DIR__ . "/../views/pages/habitat-{$habitat_id}.php";
    //     includeTemplate("footer");

    //     exit();
    // }

    public function habitat1(){
        include_once __DIR__ . "/../views/pages/habitat1.php";
    }
    
}

?>