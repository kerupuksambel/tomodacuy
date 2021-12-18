<?php
   session_start();

   use DB\MySQL\Connection as MySQLConnection;
   use DB\Arango\Connection as ArangoConnection;
   use Helper\View;

   require "vendor/autoload.php";
   if(isset($_SESSION['logged'])){
        // Get all friends
        $arango = new ArangoConnection();

        if(isset($_GET['id'])){
            // User's profile
            $id = $_GET['id'];
        }else{
            // User's own profile
            $id = $_SESSION['id'];
        }

        // Get friends (and own) posts 
        $mysql = new MySQLConnection();
        $stmt = $mysql->preparedStatement("SELECT users.* FROM users WHERE `id` = :id", compact('id'));
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // $stmt = $mysql->preparedStatement("SELECT * FROM posts");
        View::viewTemplate("views/profile.php", "dashboard.php", compact("result"));
    }else{
        header("Location: login.php");
    }
   
?>