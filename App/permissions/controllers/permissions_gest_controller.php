<?php
    // Tu convención de nombres de archivo es dominio_controlador_controller.php
    // así que el archivo debe llamarse: permissions_pages_controller.php
    require_once __DIR__ . '/../models/permission.php';
    require_once __DIR__ . '/../../../database/connection.php';
    DB::createInstance();
    

    class PermissionsGestController {
        public function start() {




            $permissions = Permission::check();
            
            
            
            require_once __DIR__ . '/../views/gest/start.php';
        }
    }