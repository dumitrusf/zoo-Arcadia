<?php


if ($_POST) {
    $connectionDB = DB::createInstance();

    // 1. We search ONLY by user/email. We don't put the password here! (i think that if we put the psw here can be risky!, AT THIS MOMENT I DON'T KNO WHY but i'm sure of it, my instinct says me that can i model it in another way to make it more secure)
    // IMPROVE SECURITY: We need to bring the role_name by doing JOIN with roles
    $query = "SELECT u.*, e.email, r.role_name
              FROM users u 
              LEFT JOIN employees e ON u.employee_id = e.id_employee 
              LEFT JOIN roles r ON u.role_id = r.id_role
              WHERE u.username = :login OR e.email = :login";

    $sql = $connectionDB->prepare($query);

    $loginInput = $_POST['email'] ?? ''; // We get what the user wrote (email or username)
    $passwordInput = $_POST['password'] ?? '';

    // Security: Sanitize and validate input
    // PDO prepared statements already protect against SQL injection, but we add extra validation
    $loginInput = trim($loginInput);
    $loginInput = substr($loginInput, 0, 255); // Limit length to prevent buffer issues
    
    // Basic validation: ensure input is not empty
    if (empty($loginInput)) {
        $_SESSION["login_error"] = "Username or email is required.";
        header('Location: /auth/pages/login');
        exit();
    }

    // Use bindValue instead of bindParam for better security (binds the value, not the variable reference)
    $sql->bindValue(":login", $loginInput, PDO::PARAM_STR);

    $sql->execute();
    // We fetch the user from the database
    $user = $sql->fetch(PDO::FETCH_ASSOC);

    // 2. Now PHP makes the detective (how?), well.. comparing if the user exists or not, and if the password is correct or not.
    if ($user) {
        // Here we compare the password
        // thanks to select u.* we can see the password in the database (psw column) and compare psw from database with what user put in the input field (passwordInput)
        if ($user['psw'] === $passwordInput) { // If we don't use hash (INSECURE BUT WORKS)
            
            // NEW LOGIC: Check if the account is active
            if ($user['is_active'] == 0) {
                // if ACCOUNT INACTIVE: Don't pass
                $_SESSION["login_error"] = "Your account is deactivated. Please contact the administrator.";
                header('Location: /auth/pages/login');
                exit();
            } else {
                // if ACCOUNT ACTIVE: Go ahead
                $_SESSION["user"] = $user;
                $_SESSION["loggedin"] = true;
                $_SESSION["last_activity"] = time(); // Set session activity timestamp
                header('Location: /home/pages/start');
                exit();
            }

        } else {
            // echo "Password incorrect.";
            $_SESSION["loggedin"] = false;
            header('Location: /auth/pages/login');
            exit();
        }
    } else {

        $_SESSION["login_error"] = "User not found or password incorrect.";
        header('Location: /auth/pages/login');
        exit();
    }

    print_r($user);
    echo "<br>";
    echo "<br>";
}



?>


<main class="login">

    <!-- Logo site web -->
    <header class="login__header">
        <a href="/public/index.php" target="_blank" rel="noopener" class="login__logo-link">
            <img src="/src/assets/images/logo-site-mobile.svg" alt="Logo del sitio" class="login__logo">
        </a>
    </header>



    <div class="login__container">
        <!-- Form login -->
        <section class="login__form-section">
            <h2 class="login__title">Owner?</h2>

            <!-- Show error message if it exists -->
            <?php if (isset($_SESSION["login_error"])): ?>
                <div id="error-message" class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">
                        <strong>Error:</strong> <?php echo htmlspecialchars($_SESSION["login_error"]); ?>
                    </h4>

                </div>
                <script>
                    setTimeout(function() {
                        document.getElementById('error-message').style.display = 'none';
                    }, 2800);
                </script>
                <?php unset($_SESSION["login_error"]); // Delete it after showing it 
                ?>
            <?php endif; ?>

            <form action="" method="POST" class="login__form">

                <div class="login__form-info">

                    <div>

                        <div>
                            <!-- Field of user (Email or Username) -->
                            <label for="login_input" class="login__label">Email or UserName</label>
                            <!-- if email is set, show it, if not, show empty -->
                            <input
                                type="text"
                                id="login_input"
                                name="email"
                                placeholder="(dumitru@arcadia.com or dumitrusf123 example)"
                                required
                                value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                                class="login__input">

                            <!-- Field of password -->
                            <label for="password" class="login__label">Password</label>
                            <input type="password" id="password" name="password" placeholder="********" required
                                class="login__input">
                        </div>

                    </div>
                </div>
                <!-- Submit button -->
                <button type="submit" class="login__button">Login</button>

            </form>
        </section>
    </div>

    <a href="./login.php" target="_blank" rel="noopener">
        <span>¿Have you forgotten your password?</span>
    </a>

</main>