<?php
	use DB\MySQL\Connection as MySQLConnection;
	// use DB\Arango\Connection as ArangoConnection;
	use Helper\View;

	require "vendor/autoload.php";

	session_start();
	if(isset($_SESSION['logged'])){
		// Get all friends
		// $arango = new ArangoConnection();

		// Get friends (and own) posts 
		$mysql = new MySQLConnection;
		// $stmt = $mysql->preparedStatement("SELECT * FROM posts");
		View::view("views/dashboard.php");
	}else{
		header("Location: login.php");
	}
?>