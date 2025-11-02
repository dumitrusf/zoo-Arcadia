<div class="card  shadow-sm mb-4">
    <div class="card-header bg-primary text-white">
        <h3>Edit User <?php echo $user_to_edit->employee_last_name; ?>'s account</h3>
    </div>
    <div class="card-body">

        <?php if (isset($user_to_edit)) { ?>

            <form action="/users/gest/edit" method="post">

                <input type="hidden" name="id" value="<?php echo $user_to_edit->id; ?>">


                <div class="mb-3">
                    <label for="username"
                        class="form-label">Username:
                    </label>

                    <input type="text"
                        class="form-control"
                        id="username"
                        placeholder="<?php echo $user_to_edit->username; ?>"
                        value="<?php echo $user_to_edit->username; ?>"
                        name="username"
                        aria-describedby="username-help"
                        required>

                </div>

                <div class="mb-3">
                    <label for="psw"
                        class="form-label">Password:
                    </label>

                    <input type="text"
                        class="form-control"
                        id="psw"
                        placeholder="<?php echo $user_to_edit->psw; ?>"
                        value="<?php echo $user_to_edit->psw; ?>"
                        name="psw"
                        aria-describedby="psw-help"
                        required>
                </div>



                <!-- <div class="mb-3">
                    <label for="psw_confirm"
                        class="form-label">Confirm Password:
                    </label>
                    <input type="text"
                        class="form-control"
                        id="psw_confirm"
                        placeholder="<?php echo $user_to_edit->psw_confirm; ?>"
                        value="<?php echo $user_to_edit->psw_confirm; ?>"
                        name="psw_confirm"
                        aria-describedby="psw_confirm-help"
                        required>
                </div> -->

                <div class="mb-3">
                    <label for="role"
                        class="form-label">role:
                    </label>

                    <!-- despues de hacer el dominio users, venir aqui a continuar ya que el dto sera purista y meteremos la actualizacion de rol en el controlador entre header location y los datos de edit ahi pondremos lo de actualizar rol con user::update -->

                    <select class="form-select"
                        id="role"
                        name="role"
                        aria-describedby="marital_status-help">

                        <option selected value="">Select a role:</option>

                        <?php foreach ($roles as $role) { ?>
                            <option
                                value="<?php echo $role->id_role; ?>"
                                <?php echo ($user_to_edit->role_name == $role->role_name) ? 'selected' : ''; ?>>
                                <?php echo $role->role_name; ?>
                            </option>
                        <?php }; ?>

                    </select>
                </div>

                <!-- Employee Selection -->
                <div class="mb-3">
                    <label for="employee" class="form-label">Employee:</label>




                    <select <?php echo (isset($user_to_edit->employee_id) && $user_to_edit->employee_id != null) ? 'disabled' : ''; ?> class="form-select"
                        id="employee"
                        name="employee">
                        <option value="">Select an employee:</option>

                        <?php foreach ($employees as $employee) { ?>
                            <option value="<?php echo $employee->id_employee; ?>"
                                <?php echo (isset($user_to_edit->employee_id) && $user_to_edit->employee_id == $employee->id) ? 'selected' : ""; ?>>
                                <?php echo $employee->last_name; ?>

                            </option>
                        <?php }; ?>

                    </select>

                    <?php
                    // THE FIX: If the employee is set and the dropdown is disabled,
                    // we add a hidden input to make sure the employee_id is sent in the POST.
                    if (isset($user_to_edit->employee_id) && $user_to_edit->employee_id != null) {
                        echo '<input type="hidden" name="employee" value="' . htmlspecialchars($user_to_edit->employee_id) . '">';
                    }
                    ?>



                </div>

                <!-- VIP Permissions Section -->
                <hr class="my-4">
                <h5 class="mb-3">⭐ VIP Permissions</h5>
                <p class="text-muted">Mark the additional permissions you want to assign ONLY to this user. These will be added to the ones he already has by his role.</p>

                <div class="row">
                    <?php
                    
                    if (!isset($allPermissions)) {
                        $allPermissions = [
                            ['id_permission' => 1, 'permission_name' => 'gestion-usuarios-crear', 'permission_desc' => 'Crear nuevos usuarios'],
                            ['id_permission' => 2, 'permission_name' => 'gestion-usuarios-editar', 'permission_desc' => 'Editar usuarios existentes'],
                            ['id_permission' => 5, 'permission_name' => 'informes-veterinarios-ver', 'permission_desc' => 'Ver los informes del veterinario'],
                            ['id_permission' => 8, 'permission_name' => 'servicios-editar', 'permission_desc' => 'Editar los servicios del zoo'],
                        ];
                    }
                    if (!isset($userDirectPermissionIds)) {
                        $userDirectPermissionIds = [2, 5]; // (example at the moment) Let's assume that the user already has permissions 2 and 5
                    }
                    ?>

                    <?php foreach ($allPermissions as $permission) : ?>
                        <div class="col-md-6 col-lg-4 mb-2">
                            <div class="form-check">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       value="<?= $permission['id_permission'] ?>" 
                                       id="permission_<?= $permission['id_permission'] ?>" 
                                       name="permissions[]"
                                       <?php if (in_array($permission['id_permission'], $userDirectPermissionIds)) echo 'checked'; ?>>
                                <label class="form-check-label" for="permission_<?= $permission['id_permission'] ?>">
                                    <strong><?= htmlspecialchars(ucwords(str_replace('-', ' ', $permission['permission_name']))) ?></strong>
                                    <small class="text-muted d-block"><?= htmlspecialchars($permission['permission_desc']) ?></small>
                                </label>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- End VIP Permissions Section -->


                <div class="card-footer text-end d-flex justify-content-between align-items-start">
                    <input type="submit" class="btn btn-warning px-4" value="Update User">
                    <a href="/users/gest/view?id=<?php echo $user_to_edit->id; ?>" class="btn btn-sm btn-info text-white">View Details</a>
                    <a href="/users/gest/start#user-<?php echo $user_to_edit->id; ?>" class=" btn btn-primary px-4">Cancel</a>
                </div>
            </form>

        <?php } else if (isset($employee_to_assign)) { ?>

            <form action="/users/gest/assignAccount" method="post">

                <input type="hidden" name="employee_id" value="<?php echo $employee_to_assign->id; ?>">

                <div class="mb-3">
                    <label for="user_id" class="form-label">Select User Account to Assign to <?php echo $employee_to_assign->last_name; ?>:</label>
                    <select class="form-select" id="user_id" name="user_id" required>
                        <option value="">Select a user:</option>
                        <?php foreach ($unassigned_users as $user) { ?>
                            <option value="<?php echo $user->id_user; ?>"><?php echo $user->username; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="card-footer text-end d-flex justify-content-between align-items-start">
                    <input type="submit" class="btn btn-success px-4" value="Assign Account">
                    <a href="/users/gest/start#employee-<?php echo $employee_to_assign->id; ?>" class="btn btn-primary px-4">Cancel</a>
                    
                </div>
            </form>


        <?php } ?>


    </div>
</div>


<br>
<br>
<br>
<br>
</body>