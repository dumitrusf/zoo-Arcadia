<div class="card container-fluid overflow-auto">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2 class="card-title">Employees</h2>
        <a name="employees" id="" class="btn btn-success mb-2 mt-2" href="/employees/gest/create" role="button">+ Add Employee</a>
    </div>
    <div class="card-body container-fluid overflow-auto">

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th class="text-nowrap border border-start-3 border-end-0 rounded-start-3 text-center align-middle" scope="col">Name</th>
                        <th class="text-nowrap border border-start-1 border-end-1 text-center align-middle" scope="col">Last Name</th>
                        <th class="text-nowrap border border-start-1 border-end-1 text-center align-middle" scope="col">Birthdate</th>
                        <th class="text-nowrap border border-start-1 border-end-1 text-center align-middle" scope="col">Phone</th>
                        <th class="text-nowrap border border-start-1 border-end-1 text-center align-middle" scope="col">Email</th>
                        <th class="text-nowrap border border-start-1 border-end-1 text-center align-middle" scope="col">Address</th>
                        <th class="text-nowrap border border-start-1 border-end-1 text-center align-middle" scope="col">City</th>
                        <th class="text-nowrap border border-start-1 border-end-1 text-center align-middle" scope="col">Zip Code</th>
                        <th class="text-nowrap border border-start-1 border-end-1 text-center align-middle" scope="col">Country</th>
                        <th class="text-nowrap border border-start-1 border-end-1 text-center align-middle" scope="col">Gender</th>
                        <th class="text-nowrap border border-start-1 border-end-1 text-center align-middle" scope="col">Marital Status</th>
                        <th class="text-nowrap border border-start-1 border-end-1 text-center align-middle" scope="col">Role</th>
                        <th class="text-nowrap border border-start-1 border-end-1 text-center align-middle" scope="col">Created at</th>
                        <th class="text-nowrap border border-start-1 border-end-1 text-center align-middle" scope="col">Updated at</th>
                        <th class="text-nowrap border border-end-3 rounded-end-3 text-center align-middle" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $rowNumber = 0;

                    foreach ($employees as $employee) {

                        $rowNumber++;
                    ?>
                        <tr class="<?php echo get_row_class($rowNumber); ?> ">
                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>"> <?php echo $employee->first_name; ?> </td>
                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>"> <?php echo $employee->last_name; ?> </td>
                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>"> <?php echo $employee->birthdate; ?> </td>
                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>"> <?php echo $employee->phone; ?> </td>
                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>"> <?php echo $employee->email; ?> </td>
                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>"> <?php echo $employee->address; ?> </td>
                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>"> <?php echo $employee->city; ?> </td>
                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>"> <?php echo $employee->zip_code; ?> </td>
                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>"> <?php echo $employee->country; ?> </td>
                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>"> <?php echo $employee->gender; ?> </td>
                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>"> <?php echo $employee->marital_status; ?> </td>
                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>"> <?php echo $employee->role_name; ?> </td>
                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>"> <?php echo $employee->created_at; ?> </td>
                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>"> <?php echo $employee->updated_at; ?> </td>
                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>">

                                <div class="btn-group" role="group" aria-label="">

                                    <a href="/employees/gest/edit?id=<?php echo $employee->id; ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="/employees/gest/delete?id=<?php echo $employee->id; ?>" class="btn btn-sm btn-danger">Delete</a>
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