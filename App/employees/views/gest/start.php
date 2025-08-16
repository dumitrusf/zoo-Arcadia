<a name="employees" id="" class="btn btn-success mb-2 mt-2" href="?controller=gest&action=create" role="button">Add Employee</a>

<!-- Formulario para ver empleados -->
<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <!-- <th scope="col">ID</th> -->
            <th scope="col">Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Creado el</th>
            <th scope="col">Editado el</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($employees as $employee) { ?>

            <tr>
                <!-- <td> <?php echo $employee->id; ?> </td> -->
                <td> <?php echo $employee->first_name; ?> </td>
                <td> <?php echo $employee->last_name; ?> </td>
                <td> <?php echo $employee->email; ?> </td>
                <td> <?php echo $employee->role_id; ?> </td>
                <td> <?php echo $employee->created_at; ?> </td>
                <td> <?php echo $employee->updated_at; ?> </td>
                <td>

                    <div class="btn-group" role="group" aria-label="">

                        <a href="#" class="btn btn-sm btn-primary">Edit</a>
                        <a href="?controller=gest&action=delete&id=<?php echo $employee->id ;?>" class="btn btn-sm btn-danger">Delete</a>
                    </div>

                </td>
            </tr>

        <?php }; ?>

    </tbody>
</table>