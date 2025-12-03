<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\About\Controllers
 * 📂 Physical File:   App/about/controllers/about_pages_controller.php
 * 
 * 📝 Description:
 * Controller for the "About Us" page.
 * Manages the informative institutional view of the zoo.
 * 
 * 🔗 Dependencies:
 * - Arcadia\Database\Connection (via database/connection.php)
 * - Arcadia\About\Views\Pages\About (via App/about/views/pages/about.php)
 */

include_once __DIR__ . "/../../../database/connection.php";
// Include the file that has the DB class to be able to connect to the database.

DB::createInstance();
// Call the static method createInstance() of the DB class.
// This method returns a PDO connection ready to use, following the Singleton pattern.
// If it is the first time it is called, it creates the connection. If it already exists, it reuses the same one.

class AboutPagesController{
    public function about(){
        include_once __DIR__ . "/../../about/views/pages/about.php";
    }
  
}

?>