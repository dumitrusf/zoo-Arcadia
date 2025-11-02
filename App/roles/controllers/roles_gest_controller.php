<?php

session_start();

include_once __DIR__ . "/../models/role.php";

include_once __DIR__ . "/../../../database/connection.php";
// Incluyo el archivo que tiene la clase DB para poder conectarme a la base de datos.

DB::createInstance();
// Llamo al método estático createInstance() de la clase DB.
// Este método devuelve una conexión PDO lista para usar, siguiendo el patrón Singleton.
// Si es la primera vez que se llama, crea la conexión. Si ya existe, reutiliza la misma.

class RolesGestController
{
    public function start()
    {
        $roles = Role::check();
        // No hay mensaje de error en start normal

        include_once __DIR__ . "/../views/gest/start.php";
    }
    public function create()
    {
        if ($_POST) {
            // print_r($_POST);
            $role_name = $_POST['role_name'];
            $description = $_POST['role_description'];
            $role_id = Role::create($role_name, $description);
            // print_r("<br>" . $employee_id);
            // redireccionamos a la pagina de inicio
            header("Location: /roles/gest/start");
        }
        include_once __DIR__ . "/../views/gest/create.php";
    }

    public function delete()
    {
        $id = $_GET['id'];

        // Obtener resultado con información
        $result = Role::delete($id);

        // Si tiene éxito: redirigir
        if (!$result['success']) {
            // Guardar el mensaje en la session

            $_SESSION["error_message"] = $result["message"];
        } else {
            $_SESSION["success_message"] = $result["message"];
        }

        header("Location: /roles/gest/start");
        exit();
    }


    public function edit()
    {
        $id_role = $_GET["id"];
        $role = Role::find($id_role);

        if ($_POST) {
            // print_r($_POST);
            $id = $_POST['role'];
            $role_name = $_POST['role_name'];
            $description = $_POST['role_description'];
            Role::update($id, $role_name, $description);

            header("Location: /roles/gest/start");
            exit();
        }

        // 1. Cargamos el catálogo completo de permisos que existen en el sistema.
        require_once __DIR__ . '/../../permissions/models/permission.php';
        $allPermissions = Permission::check();

        // 2. Obtenemos los IDs de los permisos que ESTE rol ya tiene asignados.
        $rolePermissionIds = $role->getPermissionIds();

        // 3. Cargamos la vista, que ahora tendrá acceso a $role, $allPermissions y $rolePermissionIds.
        include_once __DIR__ . "/../views/gest/edit.php";
    }

    public function view()
    {
        // 1. Coger el ID del rol desde la URL
        $id_role = $_GET['id'];

        // 2. Buscar el rol en la base de datos para tener sus detalles (nombre, descripción)
        $role = Role::find($id_role);

        // 3. Usar el nuevo método del modelo para obtener la lista de permisos
        $permissions = Role::getPermissions($id_role);

        // 4. Cargar la vista de detalles que creamos antes
        require_once __DIR__ . '/../views/gest/view.php';
    }
}
