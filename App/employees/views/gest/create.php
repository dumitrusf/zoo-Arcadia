<!-- Formulario de crear empleado -->

<div class="card shadow-sm mb-4">
    <div class="card-header bg-primary text-white">
        <h3>Register Employee</h3>
    </div>
    <div class="card-body">

        <form action="" method="post">

            <div class="mb-3">
                <label for="firstname"
                    class="form-label">Name:
                </label>

                <input type="text"
                    class="form-control"
                    id="firstname"
                    placeholder="Enter the name"
                    name="firstname"
                    aria-describedby="firstname-help"
                    required>
            </div>

            <div class="mb-3">
                <label for="lastname"
                    class="form-label">Last Name:
                </label>

                <input type="text"
                    class="form-control"
                    id="lastname"
                    placeholder="Enter the last name"
                    name="lastname"
                    aria-describedby="lastname-help"
                    required>
            </div>

            <div class="mb-3">
                <label for="email"
                    class="form-label">Email:
                </label>
                <input type="email"
                    class="form-control"
                    id="email"
                    placeholder="Enter the mail"
                    name="email"
                    aria-describedby="email-help"
                    required>
            </div>





            <div class="mb-3">
                <label for="role"
                    class="form-label">Role:
                </label>
                <select class="form-select"
                    id="role"
                    name="role"
                    aria-describedby="role-help"
                    required>

                    <option selected value="">
                        Select a role:
                    </option>
                    <?php foreach ($roles as $role) { ?>

                        <option value="<?php echo $role->id_role; ?>">
                            <?php echo $role->role_name; ?>
                        </option>

                    <?php }; ?>

                </select>
            </div>

            <div class="mb-3">
                <label for="password"
                    class="form-label">Password:
                </label>
                <input type="password"
                    class="form-control"
                    id="password"
                    placeholder="Enter the password"
                    name="password"
                    aria-describedby="password-help"
                    required>
            </div>

            <div class="card-footer d-flex justify-content-between align-items-center">
                <input type="submit" class="btn btn-warning px-4" value="Register Employee">
                <a href="?controller=gest&action=start" class=" px-4 btn btn-primary">Cancel</a>
            </div>
        </form>

    </div>
</div>