<?php
    use DB\MySQL\Connection;
    require "vendor/autoload.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $mysql = new Connection();
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $query = 'SELECT * FROM users WHERE username = :username AND password = :password';
        $result = $mysql->preparedStatement($query, compact("username", "password"));
        if($result->rowCount() > 0){
            die("Berhasil masuk!");
        }else{
            die("Gagal masuk!");
        }
    }else{
        require "views/login.php";
    }