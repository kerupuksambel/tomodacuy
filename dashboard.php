<?php
	session_start();

	use DB\MySQL\Connection as MySQLConnection;
	use DB\Arango\Connection as ArangoConnection;
	use Helper\View;

	require "vendor/autoload.php";

	if(isset($_SESSION['logged'])){
		// Get all friends
		$arango = new ArangoConnection();

		$ids = $arango->execute('FOR f IN friends FILTER f._from == "users/'.$_SESSION['id'].'" RETURN f._to');
        $ids[] = $_SESSION['id'];
        foreach ($ids as $key => $value) {
            $ids[$key] = str_replace('users/', '', $value);
        }

		// Get friends (and own) posts 
		$mysql = new MySQLConnection();
		$stmt = $mysql->preparedStatement(
			"SELECT posts.*, users.nama 
			FROM posts 
			INNER JOIN users 
			ON posts.`user_id` = users.id 
			WHERE `user_id` IN (". join(",", array_fill(0, count($ids), "?")) .")", 
			
			$ids
		);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		View::viewTemplate("views/dashboard.php", "dashboard.php", compact("result"));
	}else{
		header("Location: login.php");
	}
?>