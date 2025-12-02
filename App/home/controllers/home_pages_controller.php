<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Home\Controllers
 * 📂 Physical File:   App/home/controllers/home_pages_controller.php
 * 
 * 📝 Description:
 * Main controller for the home page and dashboard.
 * Manages the public homepage and the entry point to the control panel.
 * 
 * 🔗 Dependencies:
 * - Arcadia\Database\Connection (via database/connection.php)
 * - Arcadia\Home\Views\Gest\Start (via App/home/views/gest/start.php)
 * - Arcadia\Home\Views\Pages\Index (via App/home/views/pages/index.php)
 */

include_once __DIR__ . "/../../../database/connection.php";
// Include the file that has the DB class to be able to connect to the database.

DB::createInstance();
// Call the static method createInstance() of the DB class.
// This method returns a PDO connection ready to use, following the Singleton pattern.
// If it is the first time it is called, it creates the connection. If it already exists, it reuses the same one.


class HomePagesController {
    public function start()
    {
        require_once __DIR__ . '/../views/gest/start.php';
    }


    public function index()
    {
        include_once __DIR__ . '/../views/pages/index.php';

    }
    
}