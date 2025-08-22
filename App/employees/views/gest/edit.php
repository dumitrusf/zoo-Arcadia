<!-- Formulario de editar empleado -->
 

<br>
<br>
<br>
<br>

<!-- Formulario de crear empleado -->

<div class="card shadow-sm mb-4">
    <div class="card-header bg-primary text-white">
        <h3>Edit Employee</h3>
    </div>
    <div class="card-body">

        <form action="" method="post">


        <div>
            <input type="hidden" class="form-control" aria-describedby="id-help" id="id" name="id" value="<?php echo $employee->id; ?>" value="<?php echo $employee->id; ?>">
        </div>

        
            <div class="mb-3">
                <label for="firstname"
                    class="form-label">Name:
                </label>

                <input type="text"
                    class="form-control"
                    id="firstname"
                    placeholder="<?php echo $employee->first_name; ?>"
                    
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
                    placeholder="<?php echo $employee->last_name; ?>"
                    
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
                    placeholder="<?php echo $employee->email; ?>"
                    
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

                    <option selected value="<?php echo $employee->role_id; ?>">
                        Select a role:
                    </option>
                    <option value="1" <?php echo $employee->role_id == 1 ? 'selected' : ''; ?>>
                        Admin
                    </option>
                    <option value="2" <?php echo $employee->role_id == 2 ? 'selected' : ''; ?>>
                        Employee
                    </option>
                    <option value="3" <?php echo $employee->role_id == 3 ? 'selected' : ''; ?>>
                        Veterinarian
                    </option>

                </select>
            </div>

            <div class="card-footer text-end d-flex justify-content-between align-items-center">
                <a href="?controller=gest&action=start" class="btn btn-danger">Cancel</a>
                <input type="submit" class="btn btn-success" value="Update Employee">
            </div>
        </form>

    </div>
</div>


<br>
<br>
<br>
<br>