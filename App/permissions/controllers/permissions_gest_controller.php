<?php
/**
 * 🏛️ ARCHITECTURE ARCADIA (Simulated Namespace)
 * ----------------------------------------------------
 * 📍 Logical Path: Arcadia\Permissions\Controllers
 * 📂 Physical File:   App/permissions/controllers/permissions_gest_controller.php
 * 
 * 📝 Description:
 * Administrative controller for permission management.
 * Allows listing the permissions available in the system.
 * 
 * 🔗 Dependencies:
 * - Arcadia\Permissions\Models\Permission (via App/permissions/models/permission.php)
 * - Arcadia\Database\Connection (via database/connection.php)
 * - Arcadia\Permissions\Views\Gest\Start (via App/permissions/views/gest/start.php)
 */
   
   // Include the file that has the Permission class to be able to interact with the database.
    require_once __DIR__ . '/../models/permission.php';

    // Include the file that has the DB class to be able to connect to the database.
    require_once __DIR__ . '/../../../database/connection.php';
    require_once __DIR__ . '/../../../includes/functions.php';

    // Call the static method createInstance() of the DB class.
    DB::createInstance();
    
    // Define the PermissionsGestController class to interact with the database.
    class PermissionsGestController {
        
        // method to display the start page, showing all the permissions
        public function start() {
            // RBAC : catalogue des permissions — même périmètre que la gestion des rôles (Admin ou « roles-* »)
            $isAdmin = isset($_SESSION['user']['role_name']) && $_SESSION['user']['role_name'] === 'Admin';
            if (
                !$isAdmin
                && !hasPermission('roles-view')
                && !hasPermission('roles-create')
                && !hasPermission('roles-edit')
                && !hasPermission('roles-delete')
            ) {
                header('Location: /home/pages/start?msg=error&error=You do not have permission to access the permissions catalog');
                exit;
            }

            // Get all the permissions from model Permission, thanks to the method check()
            $permissions = Permission::check();

            // Include the view to display the start page
            require_once __DIR__ . '/../views/gest/start.php';
        }
    }