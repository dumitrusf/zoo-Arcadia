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

            <div>
                <label for="birthdate"
                    class="form-label">Birthdate:
                </label>
                <input type="date"
                    class="form-control"
                    id="birthdate"
                    name="birthdate"
                    aria-describedby="birthdate-help"
                    required>
            </div>

            <div class="mb-3">
                <label for="phone"
                    class="form-label">Phone:
                </label>
                <input type="number"
                    class="form-control"
                    id="phone"
                    name="phone"
                    aria-describedby="phone-help"
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
                <label for="address"
                    class="form-label">Address:
                </label>
                <input type="text"
                    class="form-control"
                    id="address"
                    placeholder="Enter the address"
                    name="address"
                    aria-describedby="address-help"
                    required>
            </div>

            <div class="mb-3">
                <label for="city"
                    class="form-label">City:
                </label>
                <input type="text"
                    class="form-control"
                    id="city"
                    placeholder="Enter the city"
                    name="city"
                    aria-describedby="city-help"
                    required>
            </div>


            <div class="mb-3">
                <label for="zip_code"
                    class="form-label">Zip Code:
                </label>
                <input type="text"
                    class="form-control"
                    id="zip_code"
                    placeholder="Enter the zip code"
                    name="zip_code"
                    aria-describedby="zip_code-help"
                    required>
            </div>

            <div class="mb-3">
                <label for="country"
                    class="form-label">Country:
                </label>
                <input type="text"
                    class="form-control"
                    id="country"
                    placeholder="Enter the country"
                    name="country"
                    aria-describedby="country-help"
                    required>
            </div>



            <div class="mb-3">
                <label for="gender"
                    class="form-label">Gender:
                </label>
                <select class="form-select"
                    id="gender"
                    name="gender"
                    aria-describedby="gender-help"
                    required>

                    <option selected value="">
                        Select a gender:
                    </option>
                    <?php foreach ($genders as $gender_option) { ?>

                        <option value="<?php echo $gender_option; ?>">

                            <?php echo $gender_option; ?>
                        </option>
                    <?php }; ?>

                </select>
            </div>


            <div class="mb-3">
                <label for="marital_status"
                    class="form-label">Marital Status:
                </label>
                <select class="form-select"
                    id="marital_status"
                    name="marital_status"
                    aria-describedby="gender-help"
                    required>

                    <option selected value="">
                        Select a marital status:
                    </option>
                    <?php foreach ($marital_status as $marital_status_option) { ?>

                        <option value="<?php echo $marital_status_option; ?>">

                            <?php echo $marital_status_option; ?>
                        </option>
                    <?php }; ?>

                </select>
            </div>



            <div class="mb-3">
                <label for="role"
                    class="form-label">Role:
                </label>
                <select class="form-select"
                    id="role"
                    name="role"
                    aria-describedby="role-help"
                    >

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


            <div class="card-footer d-flex justify-content-between align-items-center">
                <input type="submit" class="btn btn-warning px-4" value="Register Employee">
                <a href="?controller=gest&action=start" class=" px-4 btn btn-primary">Cancel</a>
            </div>
        </form>

    </div>
</div>