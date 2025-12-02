<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Employees\Controllers
 * 📂 Physical File:   App/employees/controllers/employees_pages_controller.php
 * 
 * 📝 Description:
 * Controller for public or general views of employees.
 * Currently redirects or shows basic views.
 * 
 * 🔗 Dependencies:
 * - Arcadia\Database\Connection (via database/connection.php)
 * - Arcadia\Employees\Views\Gest\Start (via App/employees/views/gest/start.php)
 */

include_once __DIR__ . "/../../../database/connection.php";
// Include the file that has the DB class to be able to connect to the database.

DB::createInstance();
// Call the static method createInstance() of the DB class.
// This method returns a PDO connection ready to use, following the Singleton pattern.
// If it is the first time it is called, it creates the connection. If it already exists, it reuses the same one.

class EmployeesPagesController{
    public function start(){
        // Include the view to display the start page (just a code chore (a test!))
        include_once __DIR__ . "/../employees/gest/start.php";
    }
}

?>