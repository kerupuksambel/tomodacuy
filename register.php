<?php
    session_start();
    use DB\MySQL\Connection as MySQLConnection;
    use DB\Arango\Connection as ArangoConnection;
    use Helper\View;
    use Ramsey\Uuid\Uuid;

    require "vendor/autoload.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        // Data initialization
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $nama = $_POST['nama'];
        $id = Uuid::uuid4();
        
        // Store ID at Arango
        $arango = new ArangoConnection();
        $insertedID = $arango->insert("users", [
            '_key' => $id
        ]);
        
        // Store full infos at MySQL
        $mysql = new MySQLConnection();
        $query = 'INSERT INTO users (id, username, password, nama) VALUES (:id, :username, :password, :nama)';
        $result = $mysql->preparedStatement($query, compact("id", "username", "password", "nama"));
        if(!(int)$result->errorCode()){
            $_SESSION["logged"] = TRUE;
            $_SESSION["id"] = $id;
            header("Location: dashboard.php");
        }else{
            header("Location: register.php");
        }
    }else{
        if(isset($_SESSION['logged'])){
            header("Location: dashboard.php");
        }
        View::view("views/register.php");
    }