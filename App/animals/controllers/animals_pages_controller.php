<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Animals\Controllers
 * 📂 Physical File:   App/animals/controllers/animals_pages_controller.php
 * 
 * 📝 Description:
 * Public controller for the visualization of animals.
 * Shows the catalog of animals and their individual cards.
 * 
 * 🔗 Dependencies:
 * - Arcadia\Database\Connection (via database/connection.php)
 * - Arcadia\Animals\Views\Pages\AllAnimals (via App/animals/views/pages/allanimals.php)
 * - Arcadia\Animals\Views\Pages\AnimalPicked (via App/animals/views/pages/animalpicked.php)
 */

include_once __DIR__ . "/../../../database/connection.php";
// Include the file that has the DB class to be able to connect to the database.

DB::createInstance();
// Call the static method createInstance() of the DB class.
// This method returns a PDO connection ready to use, following the Singleton pattern.
// If it is the first time it is called, it creates the connection. If it already exists, it reuses the same one.

class AnimalsPagesController{
    public function allanimals(){
        include_once __DIR__ . "/../../animals/views/pages/allanimals.php";
    }

    public function animalpicked(){
        include_once __DIR__ . "/../../animals/views/pages/animalpicked.php";
    }
    
}

?>

