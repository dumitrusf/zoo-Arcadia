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
                    <option value="1">
                        Admin
                    </option>
                    <option value="2">
                        Employee
                    </option>
                    <option value="3">
                        Veterinarian
                    </option>

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

            <div class="card-footer text-end d-flex justify-content-between align-items-center">
                <a href="?controller=gest&action=start" class="btn btn-danger">Cancel</a>
                <input type="submit" class="btn btn-success" value="Register Employee">
            </div>
        </form>

    </div>
</div>