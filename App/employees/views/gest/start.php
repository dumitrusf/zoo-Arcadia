<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2 class="card-title">Employees</h2>
        <a name="employees" id="" class="btn btn-success mb-2 mt-2" href="?controller=gest&action=create" role="button">Add Employee</a>
    </div>
    <div class="card-body">
        <!-- Formulario para ver empleados -->
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <!-- <th scope="col">ID</th> -->
                    <th scope="col">Name</th>
                    <th scope="col">Last Name</th>
                    <!-- <th scope="col">Email</th> -->
                    <th scope="col">Role</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($employees as $employee) { ?>

                    <tr>
                        <!-- <td> <?php echo $employee->id; ?> </td> -->
                        <td> <?php echo $employee->first_name; ?> </td>
                        <td> <?php echo $employee->last_name; ?> </td>
                        <!-- <td> <?php echo $employee->email; ?> </td> -->
                        <td> <?php echo $employee->role_name; ?> </td>
                        <td> <?php echo $employee->created_at; ?> </td>
                        <td> <?php echo $employee->updated_at; ?> </td>
                        <td>

                            <div class="btn-group" role="group" aria-label="">

                                <a href="?domain=employees&controller=gest&action=edit&id=<?php echo $employee->id; ?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="?domain=employees&controller=gest&action=delete&id=<?php echo $employee->id; ?>" class="btn btn-sm btn-danger">Delete</a>
                            </div>

                        </td>
                    </tr>

                <?php }; ?>

            </tbody>
        </table>
    </div>
</div>