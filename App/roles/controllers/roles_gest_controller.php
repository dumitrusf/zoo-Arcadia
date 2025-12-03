<?php
/**
 * 🏛️ ARQUITECTURA ARCADIA (Código Simulativo Namespace)
 * ----------------------------------------------------
 * 📍 Ubicación Lógica: Arcadia\Roles\Controllers
 * 📂 Archivo Físico:   App/roles/controllers/roles_gest_controller.php
 * 
 * 📝 Descripción:
 * Controlador para la gestión de roles y sus permisos.
 * Define qué puede hacer cada tipo de usuario.
 * 
 * 🔗 Dependencies:
 * - Arcadia\Roles\Models\Role (via App/roles/models/role.php)
 * - Arcadia\Database\Connection (via database/connection.php)
 * - Arcadia\Roles\Views\Gest\Start (via App/roles/views/gest/start.php)
 * - Arcadia\Roles\Views\Gest\Create (via App/roles/views/gest/create.php)
 * - Arcadia\Permissions\Models\Permission (via App/permissions/models/permission.php)
 * - Arcadia\Roles\Views\Gest\Edit (via App/roles/views/gest/edit.php)
 * - Arcadia\Roles\Views\Gest\View (via App/roles/views/gest/view.php)
 */

session_start();

require_once __DIR__ . "/../models/role.php";

require_once __DIR__ . "/../../../database/connection.php";
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
        // we get the ID of the role from the URL. This variable is the only source of truth for the ID.
        $id_role = $_GET["id"];

        // if we receive data by POST, we process the form.
        if ($_POST) {
            // 1. we update the name and description of the role.
            $role_name = $_POST['role_name'];
            $description = $_POST['role_description'];
            Role::update($id_role, $role_name, $description);

            // 2. we get the list of IDs of the marked permissions.
            // if none is marked, it will be an empty array.
            $permissionIds = $_POST['permissions'] ?? [];

            // 3. we search the Role object to be able to call its synchronization method.
            $role = Role::find($id_role);
            $role->savePermissions($permissionIds);

            // 4. we redirect to the list.
            header("Location: /roles/gest/start");
            exit();
        }

        // if there is no POST, it means we are showing the form.
        // we prepare the data for the view.
        $role = Role::find($id_role);

        require_once __DIR__ . '/../../permissions/models/permission.php';
        $allPermissions = Permission::check();

        $rolePermissionIds = $role->getPermissionIds();

        include_once __DIR__ . "/../views/gest/edit.php";
    }

    public function view()
    {
        // 1. we get the ID of the role from the URL
        $id_role = $_GET['id'];

        // 2. we search the role in the database to have its details (name, description)
        $role = Role::find($id_role);

        // 3. use the new model method to get the list of permissions
        $permissions = Role::getPermissions($id_role);

        // 4. load the details view that we created before
        require_once __DIR__ . '/../views/gest/view.php';
    }
}
