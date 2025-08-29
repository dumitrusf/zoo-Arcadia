<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2 class="card-title">roles</h2>
        <a name="roles" id="" class="btn btn-success mb-2 mt-2" href="?controller=gest&action=create" role="button">Add Employee</a>
    </div>
    <div class="card-body">
        <!-- Formulario para ver roles (puestos) -->
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <!-- <th scope="col">ID</th> -->
                    <th scope="col">Role-Name</th>
                    <th scope="col">Role-Description</th>
                    <th scope="col">Creado el</th>
                    <th scope="col">Editado el</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($roles as $role) { ?>

                    <tr>
                        <!-- <td> <?php echo $role->id; ?> </td> -->
                        <td> <?php echo $role->role_name; ?> </td>
                        <td> <?php echo $role->role_description; ?> </td>
                        <td> <?php echo $role->created_at; ?> </td>
                        <td> <?php echo $role->updated_at; ?> </td>
                        <td>

                            <div class="btn-group" role="group" aria-label="">

                                <a href="?domain=roles&controller=gest&action=edit&id=<?php echo $role->id; ?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="?domain=roles&controller=gest&action=delete&id=<?php echo $role->id; ?>" class="btn btn-sm btn-danger">Delete</a>
                            </div>

                        </td>
                    </tr>

                <?php }; ?>

            </tbody>
        </table>
    </div>
</div>