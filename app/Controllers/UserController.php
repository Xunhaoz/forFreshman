<?php
require_once '../Config/Database.php';
class UserController
{
    public string $email = '';
    public string $password = '';
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function add_user()
    {
        $conn = Database::get_connection();
        $this->password = hash ('sha256', $this->password);
        $stmt = $conn->prepare('INSERT INTO' . ' `users` (`account`, `password`) 
                                VALUES (?, ?)');
        $stmt->bindParam(1, $this->email);
        $stmt->bindParam(2, $this->password);
        try{
            if ($stmt->execute()){
                echo "successful";
                header('Location: http://localhost/product_1221/views/sign_up.php');
            }
        }catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    function select_user()
    {
        $conn = Database::get_connection();
        $stmt = $conn->prepare("SELECT " . " `id`, `password`, `account`
                                FROM `users`
                                WHERE `account` = (?)");
        $stmt->bindParam(1, $this->email);
        try{
            $stmt->execute();
            $person = $stmt->fetch();
            return array('id'=>$person['id'],'password'=>$person['password']);
        }catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    function delete_user()
    {
        $conn = Database::get_connection();
        $stmt = $conn->prepare('DELETE FROM' . ' `users`  
                                WHERE `account` = (?)');
        $stmt->bindParam(1, $this->email);
        try{
            if ($stmt->execute()){
                echo "successful";
                header('Location: http://localhost/product_1221/views/sign_up.php');
            }
        }catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    function update_user()
    {
        $conn = Database::get_connection();
        $stmt = $conn->prepare('UPDATE' . ' `users` 
                                SET `password`=(?) 
                                WHERE `account` = (?)');
        $stmt->bindParam(1, $this->password);
        $stmt->bindParam(2, $this->email);
        try{
            if ($stmt->execute()){
                echo "successful";
                header('Location: http://localhost/product_1221/views/login.php');
            }
        }catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}