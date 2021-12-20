<?php
    session_start();
    require '../Controllers/UserController.php';
    $user = new UserController($_POST['email'],'null');
    $arr = $user->select_user();
    $_SESSION['id'] = $arr['id'];
    if($arr['password'] == hash ('sha256', $_POST['password']) ){
        $_SESSION['password'] = 'common';
        header("Location: http://localhost/product_1221/public/index.php");
    } else {
        $_SESSION['password'] = 'not common';
        header("Location: http://localhost/product_1221/views/login.php");
    }