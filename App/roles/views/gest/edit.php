
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


            <hr class="my-4">

            <h2 class="h4 mb-3">Permissions Assigned to this Role</h2>
            <div class="card p-3 shadow-sm">
                <?php
                // 1. We group the permissions by their category (the word before the hyphen)
                $groupedPermissions = [];
                foreach ($allPermissions as $permission) {
                    $category = explode('-', $permission['permission_name'])[0];
                    $groupedPermissions[$category][] = $permission;
                }

                // 2. Now we iterate through the categories one by one
                foreach ($groupedPermissions as $category => $permissionsInCategory) :
                ?>
                    <fieldset class="mb-3">
                        <!-- We draw the name of the category as a title -->
                        <legend class="h6 text-capitalize border-bottom pb-1 mb-2"><?= htmlspecialchars($category) ?></legend>

                        <?php
                        // 3. Now we iterate through the permissions INSIDE this category
                        foreach ($permissionsInCategory as $permission) :
                            // 4. The magic: we check if the ID of this permission is in the list of the ones that the role already has.
                            $isChecked = in_array($permission['id_permission'], $rolePermissionIds);
                        ?>
                            <!-- We draw the checkbox. If $isChecked is true, we add the word 'checked' -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="<?= $permission['id_permission'] ?>" id="perm-<?= $permission['id_permission'] ?>" <?= $isChecked ? 'checked' : '' ?>>
                                <label class="form-check-label" for="perm-<?= $permission['id_permission'] ?>">
                                    <?= htmlspecialchars(ucwords(str_replace('-', ' ', $permission['permission_name']))) ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </fieldset>
                <?php endforeach; ?>
            </div>


            <div class="card-footer d-flex justify-content-between align-items-center mt-4">
                <input type="hidden" name="role" value="<?php echo $role->id_role; ?>">
                <input type="submit" class="btn btn-warning px-4" value="Update Role">
                <a href="/roles/gest/start" class=" px-4 btn btn-primary">Cancel</a>
            </div>
        </form>

    </div>
</div>