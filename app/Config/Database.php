<?php
class Database
{
    private static $conn;

    public static function get_connection(): PDO
    {
        $host = "localhost";
        $db_name = "product_1221";
        $username = "Xunhaoz";
        $password = "test";
        if (!empty(self::$conn)) {
            return self::$conn;
        }
        try {
            self::$conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password, array(
                PDO::ATTR_PERSISTENT => true
            ));
            self::$conn->exec("set names utf8");
            echo "Connect Successful";
        } catch (PDOException $e) {
            echo "Connect fail" . "<br>";
            echo json_encode(
                array("Database could not be connected" => $e->getMessage())
            );
        }
        return self::$conn;
    }
}