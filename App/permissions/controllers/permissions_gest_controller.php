<?php
   
   // Include the file that has the Permission class to be able to interact with the database.
    require_once __DIR__ . '/../models/permission.php';

    // Include the file that has the DB class to be able to connect to the database.
    require_once __DIR__ . '/../../../database/connection.php';

    // Call the static method createInstance() of the DB class.
    DB::createInstance();
    
    // Define the PermissionsGestController class to interact with the database.
    class PermissionsGestController {
        
        // method to display the start page, showing all the permissions
        public function start() {

            // Get all the permissions from model Permission, thanks to the method check()
            $permissions = Permission::check();

            // Include the view to display the start page
            require_once __DIR__ . '/../views/gest/start.php';
        }
    }