<!-- Formulario de crear empleado -->

<div class="card shadow-sm mb-4">
    <div class="card-header bg-primary text-white">
        <h3>Register Employee</h3>
    </div>
    <div class="card-body">

        <form action="" method="post">

            <div class="mb-3">
                <label for="employee-name"
                    class="form-label">Name:
                </label>

                <input type="text"
                    class="form-control"
                    id="employee-name"
                    placeholder="Enter the name"
                    name="employee-name"
                    aria-describedby="employee-name-help"
                    required>
            </div>

            <div class="mb-3">
                <label for="employee-lastname"
                    class="form-label">Last Name:
                </label>

                <input type="text"
                    class="form-control"
                    id="employee-lastname"
                    placeholder="Enter the last name"
                    name="employee-lastname"
                    aria-describedby="employee-lastname-help"
                    required>
            </div>

            <div class="mb-3">
                <label for="employee-email"
                    class="form-label">Email:
                </label>
                <input type="email"
                    class="form-control"
                    id="employee-email"
                    placeholder="Enter the mail"
                    name="employee-email"
                    aria-describedby="employee-email-help"
                    required>
            </div>

            <div class="mb-3">
                <label for="employee-role"
                    class="form-label">Role:
                </label>
                <select class="form-select"
                    id="employee-role"
                    name="employee-role"
                    aria-describedby="employee-role-help"
                    required>

                    <option selected disabled>
                        Select a role:
                    </option>
                    <option value="admin">
                        Admin
                    </option>
                    <option value="empleado">
                        Employee
                    </option>
                    <option value="veterinario">
                        Veterinarian
                    </option>

                </select>
            </div>

            <div class="mb-3">
                <label for="employee-password"
                    class="form-label">Password:
                </label>
                <input type="password"
                    class="form-control"
                    id="employee-password"
                    placeholder="Enter the password"
                    name="employee-password"
                    aria-describedby="employee-password-help"
                    required>
            </div>

            <div class="card-footer text-end">
                <input type="submit" class="btn btn-success" value="Register Employee">
                <a href="?controller=employees_gest&action=start" class="btn btn-danger">Cancel</a>
            </div>
        </form>

    </div>
</div>