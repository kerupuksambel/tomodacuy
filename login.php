<?php
    session_start();
    use DB\MySQL\Connection as MySQLConnection;
use Helper\View;

require "vendor/autoload.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $mysql = new MySQLConnection();
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $query = 'SELECT * FROM users WHERE username = :username AND password = :password';
        $result = $mysql->preparedStatement($query, compact("username", "password"));
        if($result->rowCount() > 0){
            $fetched = $result->fetchAll(PDO::FETCH_ASSOC)[0];
            $id = $fetched["id"];
            $_SESSION["logged"] = TRUE;
            $_SESSION["id"] = $id;
            header("Location: dashboard.php");
        }else{
            header("Location: login.php");
        }
    }else{
        if(isset($_SESSION['logged'])){
            header("Location: dashboard.php");
        }
        View::view("views/login.php");
    }