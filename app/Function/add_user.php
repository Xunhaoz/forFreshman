<?php
    require "../Controllers/UserController.php";
    session_start();
    if ($_POST['password'] === $_POST['conform_password'])
    {
        $_SESSION['conform_password'] = 'common';
        $user = new UserController($_POST['email'], $_POST['password']);
        $user->add_user();
    } else {
        $_SESSION['conform_password'] = 'not common';
        header('Location: http://localhost/product_1221/views/sign_up.php');
    }