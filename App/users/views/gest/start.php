<div class="card container-fluid overflow-auto">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2 class="card-title">Users</h2>
        <a name="users" id="" class="btn btn-success mb-2 mt-2" href="?domain=users&controller=gest&action=create" role="button">Create new Account</a>
    </div>
    <div class="card-body container-fluid overflow-auto">

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th class="text-nowrap border border-start-3 border-end-0 rounded-start-3 text-center align-middle" scope="col">Username</th>
                        <th class="text-nowrap border border-start-1 border-end-1 text-center align-middle" scope="col">psw</th>
                        <th class="text-nowrap border border-start-1 border-end-1 text-center align-middle" scope="col">Activated ?</th>
                        <th class="text-nowrap border border-start-1 border-end-1 text-center align-middle" scope="col">Role</th>
                        <th class="text-nowrap border border-start-1 border-end-1 text-center align-middle" scope="col">Employee-Name</th>
                        <th class="text-nowrap border border-start-1 border-end-1 text-center align-middle" scope="col">Created-At</th>
                        <th class="text-nowrap border border-start-1 border-end-1 text-center align-middle" scope="col">Updated-At</th>
                        <th class="text-nowrap border border-end-3 rounded-end-3 text-center align-middle" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $rowNumber = 0;

                    foreach ($users as $user) {

                        $rowNumber++;
                    ?>
                        <tr class="<?php echo get_row_class($rowNumber); ?> ">
                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>"> <?php echo $user->username; ?> </td>
                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>"> <?php echo $user->psw; ?> </td>
                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>">
                                <div class="btn-group" role="group" aria-label="">
                                <?php $user->is_active; ?>
                                <?php if ($user->is_active == 1): ?>
                                    <span class="btn btn-sm bg-success text-white">Activated</span>
                                    <a href="?domain=users&controller=gest&action=deactivate&id=<?php echo $user->id; ?>" class="btn btn-sm btn-warning">Deactivate</a>
                                <?php else: ?>
                                    <span class="btn btn-sm bg-danger text-white">Deactivated</span>
                                    <a href="?domain=users&controller=gest&action=activate&id=<?php echo $user->id; ?>" class="btn btn-sm btn-success text-white">Activate</a>
                                <?php endif; ?>
                                </div>
                            </td>
                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>"> <?php echo $user->role_name; ?> </td>
                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>"> <?php echo $user->employee_last_name; ?> </td>
                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>"> <?php echo $user->created_at; ?> </td>
                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>"> <?php echo $user->updated_at; ?> </td>
                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>">

                                <div class="btn-group" role="group" aria-label="">



                                    <a href="?domain=users&controller=gest&action=edit&id=<?php echo $user->id; ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="?domain=users&controller=gest&action=delete&id=<?php echo $user->id; ?>" class="btn btn-sm btn-danger">Delete</a>
                                </div>

                            </td>
                        </tr>

                    <?php
                    }
                    ?>

                </tbody>
            </table>



        </div>
    </div>
</div>