<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../public/srv/fantasticbook_logo.ico" type="image/x-icon" / >
        <title>Fantasticbook</title>
        <link href="../public/css/login_page.css" rel="stylesheet" type="text/css" />
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="img">
                <img src="../public/srv/phone.svg" alt="Error img">
            </div>
            <div class="login_container">
                <form action="../app/Function/login.php" method="post">
                    <img src="../public/srv/man.svg" alt="Error img" class="man">
                    <h2>Fantastic</h2>
                    <div class="input_div one">
                        <div class="i">
                            <i class='bx bxs-user'></i>
                        </div>
                        <div>
                            <h5>Email</h5>
                            <input class="input" type="email" name="email">
                        </div>
                    </div>
                    <div class="input_div two">
                        <div class="i">
                            <i class='bx bxs-lock' ></i>
                        </div>
                        <div>
                            <h5>Password</h5>
                            <input class="input" type="password" name="password">
                        </div>
                    </div>
                    <a href="./sign_up.php">Sign up?</a>
                    <a href="./forget_password.php">Forget Password?</a>
                    <input type="submit" class="btn" value="Login">
                </form>
            </div>
        </div>
        <script type="text/javascript" src="../public/js/login_page.js"></script>
    </body>
</html>
<?php
    session_start();
    if (isset($_SESSION['password']))
    {
        if($_SESSION['password'] === 'common'){
            header('Location: ../public/index.php');
        } elseif($_SESSION['password'] === 'not common') {
            include '../public/js/login_error.js';
        } elseif ($_SESSION['password'] === 'update successful') {
            include '../public/js/update_successful.js';
        }
        unset($_SESSION['password']);
    }
    else return;