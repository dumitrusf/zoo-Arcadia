<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Obtener el nombre del archivo actual
$currentPage = basename($_SERVER['PHP_SELF']);
include(__DIR__ . "../../../../../includes/pageTitle.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="keywords"
        content="zoo, animals, habitats, Brocéliande, veterinarians, ecology, wildlife park, conservation, zoo services, guided tours, France zoo, sustainable energy, wild animals, animal feeding, zoo management, Arcadia Zoo" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
    <title><?= $pageTitle; ?></title>

    <link rel="icon" type="image/svg+xml" href="/src/assets/images/favicon.svg" />

    <link rel="icon" type="image/png" href="/src/assets/images/favicon.png" />

    <link rel="stylesheet" href="/node_modules/Normalize-css/normalize.css" />

    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css" />

    <!-- <link rel="stylesheet" href="/public/build/css/app.css"> -->



</head>

<body class="<?= $currentPage == 'contact.php' ? 'body-contact' : '' ?>" id="top">




    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#">Logged in (user) <span class="visually-hidden">(current)</span></a>
            <a class="nav-item nav-link" href="?domain=employees&controller=pages&action=start">Home</a>
            <a class="nav-item nav-link" href="?domain=users&controller=gest&action=start">Users</a>
            <a class="nav-item nav-link" href="?domain=employees&controller=gest&action=start">Employees</a>
            <a class="nav-item nav-link" href="?domain=roles&controller=gest&action=start">Roles</a>
        </div>
    </nav>

    <div class="container-xs p-5">
        <div class="row">
            <div class="col-12">

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
                                        <th class="text-nowrap border border-start-1 border-end-1 text-center align-middle" scope="col">Created-At</th>
                                        <th class="text-nowrap border border-start-1 border-end-1 text-center align-middle" scope="col">Updated-At</th>
                                        <th class="text-nowrap border border-start-1 border-end-1 text-center align-middle" scope="col">Role</th>
                                        <th class="text-nowrap border border-start-1 border-end-1 text-center align-middle" scope="col">Employee-Name</th>
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
                                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>"> <?php echo $user->activated; ?> </td>
                                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>"> <?php echo $user->created_at; ?> </td>
                                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>"> <?php echo $user->updated_at; ?> </td>
                                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>"> <?php echo $user->role_name; ?> </td>
                                            <td class="text-nowrap <?php echo get_cell_border_class($rowNumber); ?>"> <?php echo $user->employee_name; ?> </td>
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
            </div>
        </div>


        <script type="module" src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script type="module" src="/node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
</body>