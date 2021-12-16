<?php
	session_start();

	use DB\MySQL\Connection as MySQLConnection;
	use DB\Arango\Connection as ArangoConnection;
	use Helper\View;

	require "vendor/autoload.php";

	if(isset($_SESSION['logged'])){
		// Get all friends
		$arango = new ArangoConnection();

		$ids = [$_SESSION['id']];

		// Get friends (and own) posts 
		$mysql = new MySQLConnection();
		$stmt = $mysql->preparedStatement("SELECT posts.*, users.nama FROM posts INNER JOIN users ON posts.`user_id` = users.id WHERE `user_id` = :user_id", ['user_id' => $_SESSION['id']]);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		// $stmt = $mysql->preparedStatement("SELECT * FROM posts");
		View::view("views/dashboard.php", compact("result"));
	}else{
		header("Location: login.php");
	}
?>