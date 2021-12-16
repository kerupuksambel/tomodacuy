<?php
    session_start();

    use DB\MySQL\Connection as MySQLConnection;
    use Ramsey\Uuid\Uuid;

    require "vendor/autoload.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        // Data initialization
        $content = $_POST['content'];
        $user_id = $_SESSION['id'];
        $id = Uuid::uuid4();

        // Store full infos at MySQL
        $mysql = new MySQLConnection();
        $query = 'INSERT INTO posts (id, `user_id`, content) VALUES (:id, :user_id, :content)';
        $result = $mysql->preparedStatement($query, compact("id", "user_id", "content"));
        
        header("Location: dashboard.php");
    }else{
        header("Location: dashboard.php");
    }
?>