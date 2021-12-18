<?php
	session_start();

	use DB\MySQL\Connection as MySQLConnection;
	use Helper\View;
	
	require "vendor/autoload.php";

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		// Data initialization
		$password = md5($_POST['password']);
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$id = $_SESSION['id'];

		// Store full infos at MySQL
		$mysql = new MySQLConnection();
		if($_POST['password'] != ""){
			$query = 'UPDATE users SET `nama` = :nama, `username` = :username, `password` = :password WHERE id = :id';
			$result = $mysql->preparedStatement($query, compact("nama", "username", "password", "id"));
		}else{
			$query = 'UPDATE users SET `nama` = :nama, `username` = :username WHERE id = :id';
			$result = $mysql->preparedStatement($query, compact("nama", "username", "id"));
		}
		
		header("Location: dashboard.php");
	}else{
		// Get full infos
		$mysql = new MySQLConnection();
		$query = 'SELECT * FROM users WHERE id = :id';
		$result = $mysql->preparedStatement($query, ['id' => $_SESSION['id']]);
		// var_dump($result);
		View::viewTemplate('views/setting.php', 'dashboard.php', ['result' => $result->fetchAll(PDO::FETCH_ASSOC)[0]]);
	}
?>