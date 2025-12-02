<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Auth\Controllers
 * 📂 Physical File:   App/auth/controllers/auth_pages_controller.php
 * 
 * 📝 Description:
 * Public controller for authentication.
 * Manages the login and logout of users.
 * 
 * 🔗 Dependencies:
 * - Arcadia\Database\Connection (via database/connection.php)
 * - Arcadia\Auth\Views\Pages\Login (via App/auth/views/pages/login.php)
 */

include_once __DIR__ . "/../../../database/connection.php";
// Include the file that has the DB class to be able to connect to the database.

DB::createInstance();
// Call the static method createInstance() of the DB class.
// This method returns a PDO connection ready to use, following the Singleton pattern.
// If it is the first time it is called, it creates the connection. If it already exists, it reuses the same one.

class AuthPagesController{
    public function login(){
        // Include the view to display the start page (just a code chore (a test!))
        include_once __DIR__ . "/../views/pages/login.php";
    }


    public function logout() {
        // We don't need session_start() because it is already in the router, 
        // but for security to destroy the session we can let it there or check the status.
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // Destroy all session variables (empty the session).
        $_SESSION = array();

        // If we want to destroy the session completely, also delete the session cookie (if it is used).
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finally, destroy the session (completely).
        session_destroy();

        // Redirect to login
        header("Location: /auth/pages/login");
        exit();
    }
    


  
}

?>