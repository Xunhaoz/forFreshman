<?php
class Log
{
    public static function is_logged()
    {
        session_start();
        $isLoggedIn = isset($_SESSION['id']);
        if ($isLoggedIn !== true) {
            header('Location: ../views/login.php');
            exit;
        }
    }
    public static function log_out()
    {
        session_start();
        session_destroy();
    }

}
