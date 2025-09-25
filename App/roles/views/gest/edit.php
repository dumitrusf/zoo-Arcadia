
<!-- Formulario de crear empleado -->

<div class="card shadow-sm mb-4">
    <div class="card-header bg-primary text-white">
        <h3>Edit Role <?php echo $role->role_name; ?></h3>
    </div>
    <div class="card-body">

        <form action="" method="post">

            <div class="mb-3">
                <label for="role_name"
                    class="form-label">Role Name:
                </label>

                <input type="text"
                    class="form-control"
                    id="role_name"
                    placeholder="<?php echo $role->role_name; ?>"
                    name="role_name"
                    value="<?php echo $role->role_name; ?>"
                    aria-describedby="role_name-help"
                    required>
            </div>

            <div class="mb-3">
                <label for="role_description"
                    class="form-label">Role Description:
                </label>

                <input type="text"
                    class="form-control"
                    id="role_description"
                    placeholder="<?php echo $role->role_description; ?> "
                    value="<?php echo $role->role_description; ?>"
                    name="role_description"
                    aria-describedby="role_description-help"
                    required>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <input type="hidden" name="role" value="<?php echo $role->id_role; ?>">
                <input type="submit" class="btn btn-warning px-4" value="Update Role">
                <a href="?domain=roles&controller=gest&action=start" class=" px-4 btn btn-primary">Cancel</a>
            </div>
        </form>

    </div>
</div>