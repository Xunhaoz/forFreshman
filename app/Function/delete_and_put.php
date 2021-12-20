<?php
    session_start();
    require '../Controllers/UserController.php';
    echo $_POST['email'] . $_POST['password'];
    if ($_POST['password'] == $_POST['conform_password'] and $_POST['password'] == 'DELETE')
    {
        $user = new UserController($_POST['email'], 'null');
        $user->delete_user();
        $_SESSION['password'] = 'delete successful';
    } else {

        $user = new UserController($_POST['email'], hash ('sha256', $_POST['password']));
        $user->update_user();
        $_SESSION['password'] = 'update successful';
    }