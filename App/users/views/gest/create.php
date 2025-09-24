<!-- Formulario de crear empleado -->
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
                <?php
                
                // Mostrar el contenido capturado del controlador de lo contrario mostrar un mensaje de no hay contenido para mostrar
                echo $viewContent ?? '<p>No hay contenido para mostrar</p>';
                
                ?>
                
            </div>
        </div>
    </div>


    <script type="module" src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="/node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
</body>

<div class="card shadow-sm mb-4">
    <div class="card-header bg-primary text-white">
        <h3>Create Account</h3>
    </div>
    <div class="card-body">

        <form action="" method="post">

            <div class="mb-3">
                <label for="username"
                    class="form-label">Username:
                </label>

                <input type="text"
                    class="form-control"
                    id="username"
                    placeholder="Enter a username"
                    name="username"
                    aria-describedby="username-help"
                    required>
            </div>

            <div class="mb-3">
                <label for="psw"
                    class="form-label">Password:
                </label>

                <input type="text"
                    class="form-control"
                    id="psw"
                    placeholder="********"
                    name="psw"
                    aria-describedby="psw-help"
                    required>
            </div>

            <div class="mb-3">
                <label for="psw_confirm"
                    class="form-label">Confirm Password:
                </label>

                <input type="text"
                    class="form-control"
                    id="psw_confirm"
                    placeholder="********"
                    name="psw_confirm"
                    aria-describedby="psw_confirm-help"
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
                    >

                    <option selected value="">
                        Select a role:
                    </option>
                    <?php foreach ($roles as $role) { ?>

                        <option value="<?php echo $role->id_role; ?>">
                            <?php echo $role->role_name; ?>
                        </option>

                    <?php }; ?>

                </select>
            </div>

            
            <div class="mb-3">
                <label for="employee"
                    class="form-label">Employee:
                </label>
                <select class="form-select"
                    id="employee"
                    name="employee"
                    aria-describedby="employee-help"
                    >

                    <option selected value="">
                        Asign employee to the account created:
                    </option>
                    <?php foreach ($employees as $employee) { ?>

                        <option value="<?php echo $employee->id_employee; ?>">
                            <?php echo $employee->employee_name; ?>
                        </option>

                    <?php }; ?>

                </select>
            </div>



            <div class="card-footer d-flex justify-content-between align-items-center">
                <input type="submit" class="btn btn-warning px-4" value="Register Account">
                <a href="?domain=users&controller=gest&action=start" class=" px-4 btn btn-primary">Cancel</a>
            </div>
        </form>

    </div>
</div>