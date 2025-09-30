
    <div class="card  shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h3>Edit User <?php echo $user->employee_last_name; ?>'s account</h3>
        </div>
        <div class="card-body">

            <form action="" method="post">


                <div>
                    <input type="hidden" class="form-control" aria-describedby="id-help" id="id" name="id" value="<?php echo $user->id; ?>">

                </div>


                <div class="mb-3">
                    <label for="username"
                        class="form-label">Username:
                    </label>

                    <input type="text"
                        class="form-control"
                        id="username"
                        placeholder="<?php echo $user->username; ?>"
                        value="<?php echo $user->username; ?>"
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
                        placeholder="<?php echo $user->psw; ?>"
                        value="<?php echo $user->psw; ?>"
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
                        placeholder="<?php echo $user->psw_confirm; ?>"
                        value="<?php echo $user->psw_confirm; ?>"
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
                            <?php echo ($user->role_name == $role->role_name) ? 'selected' : ''; ?>>
                            <?php echo $role->role_name; ?>
                        </option>
                    <?php }; ?>

                </select>
            </div>


                <div class="card-footer text-end d-flex justify-content-between align-items-start">
                    <input type="submit" class="btn btn-warning px-4" value="Update User">
                    <a href="?domain=users&controller=gest&action=start" class=" btn btn-primary px-4">Cancel</a>
                </div>
            </form>

        </div>
    </div>


    <br>
    <br>
    <br>
    <br>
</body>