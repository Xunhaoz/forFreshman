<!DOCTYPE html>
<html>
    <head>
            <meta charset="utf-8">
            <link rel="icon" href="../public/srv/fantasticbook_logo.ico" type="image/x-icon" >
            <title>Fantasticbook</title>
            <link href="../public/css/login_page.css" rel="stylesheet" type="text/css" />
            <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container" id="sign_up">
            <div class="login_container">
                <form action="../app/Function/add_user.php" method="post">
                    <img src="../public/srv/man.svg" alt="Error img" class="man">
                    <h2>Welcome</h2>
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
                    <div class="input_div two">
                        <div class="i">
                            <i class='bx bxs-lock' ></i>
                        </div>
                        <div>
                            <h5>conform Password</h5>
                            <input class="input" type="password" name="conform_password">
                        </div>
                    </div>
                   <input type="submit" class="btn" value="Sign Up">
                </form>
            </div>
        </div>
        <script type="text/javascript" src="../public/js/login_page.js"></script>
    </body>
</html>

<?php
session_start();
    if (isset($_SESSION['conform_password']))
    {
        if($_SESSION['conform_password'] === 'common'){
            header('Location: ../public/index.php');
        } elseif($_SESSION['conform_password'] === 'not common') {
            include '../public/js/sign_up_error.js';
        } elseif($_SESSION['conform_password'] === 'delete successful') {
            include '../public/js/delete_successful.js';
        }
        unset($_SESSION['conform_password']);
    }
    else return;

