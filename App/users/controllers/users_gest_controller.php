
<?php

require_once __DIR__ . "/../models/user.php";
require_once __DIR__ . "/../../employees/models/employee.php";
require_once __DIR__ . "/../../roles/models/role.php";

// Include the file that has the DB class to be able to connect to the database.
require_once __DIR__ . "/../../../database/connection.php";

DB::createInstance();
// Call the static createInstance() method of the DB class.
// This method returns a PDO connection ready to use, following the Singleton pattern.
// If it is the first time it is called, it creates the connection. If it already exists, it reuses the same one.

class UsersGestController
{
    public function start()
    {

        $users = User::check();
        $is_active = $_POST['is_active'];
        // print_r("<pre>" . print_r($users, true) . "</pre>");



        include_once __DIR__ . "/../views/gest/start.php";
    }


    public function create()
    {

        $roles = Role::check();
        $employees = Employee::freeEmployees();

        if ($_POST) {
            // print_r($_POST);
            $username = $_POST['username'];
            $password = $_POST['psw'];
            $role = $_POST['role'];
            $employee = $_POST['employee'];

            // Convert empty string to NULL for employee_id
            $role_id = empty($role) ? null : (int)$role;
            $employee_id = empty($employee) ? null : (int)$employee;

            $user_id = User::create($username, $password, $role_id, $employee_id);
            // print_r("<br>" . $employee_id);
            // redirect to the start page
            header("Location: /users/gest/start");
        }


        include_once __DIR__ . "/../views/gest/create.php";
    }

    public function delete()
    {
        $id_user = $_GET['id'];
        User::delete($id_user);
        header("Location: /users/gest/start");
    }


    public function toggleActivation()
    {
        $id_user = $_GET["id"];
        User::toggleActive($id_user);
        header("Location: /users/gest/start#user-" . $id_user);
    }


    public function edit()
    {
        $roles = Role::check();
    
        if (isset($_GET['id'])) {
            // We edit an existing user that if it exists with an existing employee
            $id_user = $_GET["id"];
            $user_to_edit = User::find($id_user);
            
    
            // Corregido para usar tu nombre de función
            $employees = Employee::freeEmployees();
    
            if (isset($user_to_edit->employee_id) && $user_to_edit->employee_id != null) {
                $assigned_employee = Employee::find($user_to_edit->employee_id);
                array_unshift($employees, $assigned_employee);
            }

            // --- DATA PREPARATION FOR THE VIEW (GET) ---

            // 1. Load the full permission catalog
            require_once __DIR__ . '/../../permissions/models/permission.php';
            $allPermissions = Permission::check();

            // 2. Get the permissions the user already has from their ROLE
            $rolePermissions = [];
            if ($user_to_edit->role_id) {
                $rolePermissions = Role::getPermissions($user_to_edit->role_id);
            }

            // 3. Create an array with only the ROLE's permission IDs for easy searching
            $rolePermissionIds = array_column($rolePermissions, 'id_permission');

            // 4. FILTER the full catalog to remove those already included in the ROLE
            $availableVipPermissions = array_filter($allPermissions, function($permission) use ($rolePermissionIds) {
                return !in_array($permission['id_permission'], $rolePermissionIds);
            });

            // 5. Get the IDs of the VIP permissions that the user already has directly assigned
            $userDirectPermissionIds = $user_to_edit->getVipPermissionsIdsUserHasAssigned();

        } elseif (isset($_GET["assign_to_employee"])){


            $id_employee = $_GET['assign_to_employee'];
            $employee_to_assign = Employee::find($id_employee);

            $unassigned_users = User::withoutEmployeeUser();

        }
    
        // Logic of the POST for the UPDATE of a user
        if ($_POST && isset($_POST['id'])) {

            $id_user = $_POST['id'];
            $username = $_POST['username'];
            $psw = $_POST['psw'];

            // Clean up role_id and employee_id before sending them to the model.
            // An empty string '' from the form is converted to NULL for the database. This is the definitive fix.
            $role_id = empty($_POST['role']) ? null : (int)$_POST['role'];
            $employee_id = empty($_POST['employee']) ? null : (int)$_POST['employee'];

            User::update($username, $psw, $role_id, $employee_id, $id_user);
            
            // --- Sincronize VIP Permissions ---

            // 1. Get the IDs of the marked checkboxes. If none is marked, it will be an empty array.
            $permissionIds = $_POST['permissions'] ?? [];

            // 2. We need the User object to call its method.
            $user = User::find($id_user);
            
            // 3. Ask the object to synchronize its VIP permissions.
            $user->overwriteVipPermissionsIdsUserHasAssigned($permissionIds);

            // --- Final Redirect ---
            header("Location: /users/gest/start#user-" . $id_user);
            exit();
        }

        

        include_once __DIR__ . "/../views/gest/edit.php";
    }

    public function assignAccount()
    {
        if ($_POST) {
            $employee_id = $_POST['employee_id'];
            $user_id = $_POST['user_id'];
    
            // We use the method that we created in the User.php model
            User::assignAccount($employee_id, $user_id);
    
            header("Location: /users/gest/start");
            exit();
        }
    }

    public function view()
    {
        // 1. Get the ID of the user from the URL
        $id_user = $_GET['id'];

        // 2. Find the user
        $user = User::find($id_user);

        // 3. Get the user's role (if they have one)
        $role = $user->getRole();
        $rolePermissions = [];
        if ($role) {
            // 4. If they have a role, get the permissions for that role
            $rolePermissions = Role::getPermissions($role->id_role);
        }

        // 5. Get the user's VIP (direct) permissions
        $permissions = User::getUserVipPermissionsDetails($id_user);

        // 6. Load the view with all the information
        require_once __DIR__ . '/../views/gest/view.php';
    }
    
}
  