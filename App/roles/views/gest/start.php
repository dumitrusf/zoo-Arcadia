<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2 class="card-title">Roles</h2>
        <a name="roles" id="" class="btn btn-success mb-2 mt-2" href="?domain=roles&controller=gest&action=create" role="button">Add New Role</a>
    </div>
    <div class="card-body">

        <!-- Mostrar mensaje de error si existe -->
        <?php if (isset($_SESSION['error_message'])): ?>
            <div id="error-message" class="alert alert-danger">
                <strong>Error:</strong> <?php echo htmlspecialchars($_SESSION['error_message']); ?>
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById('error-message').style.display = 'none';
                }, 6000);
            </script>
            <?php unset($_SESSION['error_message']); // Lo borra después de mostrarlo 
            ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['success_message'])): ?>
            <div id="success-message" class="alert alert-success">
                <strong>Success:</strong> <?php echo htmlspecialchars($_SESSION['success_message']); ?>
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById('success-message').style.display = 'none';
                }, 6000);
            </script>
            <?php unset($_SESSION['success_message']); // Lo borra después de mostrarlo 
            ?>
        <?php endif; ?>



        <!-- Formulario para ver roles (puestos) -->
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Role-Name</th>
                    <th scope="col">Role-Description</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($roles as $role) { ?>

                    <tr>
                        <td> <?php echo $role->id_role; ?> </td>
                        <td> <?php echo $role->role_name; ?> </td>
                        <td> <?php echo $role->role_description; ?> </td>
                        <td> <?php echo $role->created_at; ?> </td>
                        <td> <?php echo $role->updated_at; ?> </td>
                        <td>

                            <div class="btn-group" role="group" aria-label="">


                                <a href="?domain=roles&controller=gest&action=edit&id=<?php echo $role->id_role; ?>" class="btn btn-sm btn-primary">Edit</a>

                                <a href="?domain=roles&controller=gest&action=delete&id=<?php echo $role->id_role; ?>" class="btn btn-sm btn-danger">Delete</a>
                            </div>

                        </td>
                    </tr>

                <?php }; ?>

            </tbody>
        </table>
    </div>
</div>