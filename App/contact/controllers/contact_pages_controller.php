<?php

include_once __DIR__ . "/../../../database/connection.php";
// Include the file that has the DB class to be able to connect to the database.

DB::createInstance();
// Call the static method createInstance() of the DB class.
// This method returns a PDO connection ready to use, following the Singleton pattern.
// If it is the first time it is called, it creates the connection. If it already exists, it reuses the same one.

class ContactPagesController
{
    public function contact()
    {        
        includeTemplate("nav");
        include_once __DIR__ . "/../views/pages/contact.php";
        // includeTemplate("footer");
        // exit();

    }
}
