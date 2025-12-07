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

// DEBUG: Show errors explicitly
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../models/service.php';

include_once __DIR__ . "/../../../database/connection.php";
// Include the file that has the DB class to be able to connect to the database.

DB::createInstance();
// Call the static method createInstance() of the DB class.
// This method returns a PDO connection ready to use, following the Singleton pattern.
// If it is the first time it is called, it creates the connection. If it already exists, it reuses the same one.

class CmsPagesController
{

    public function cms()
    {
        // 1. Instantiate the model to request data
        $serviceModel = new Service();
        
        // 2. Request only non-featured services from the database
        $services = $serviceModel->getRegularServices();
        
        // 3. Load the view and pass the $services variable to it
        if (file_exists(__DIR__ . '/../views/pages/cms.php')) {
            include_once __DIR__ . '/../views/pages/cms.php';
        } else {
            echo "Error: View cms.php not found.";
        }
    }
}
