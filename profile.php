<?php
   session_start();

   use DB\MySQL\Connection as MySQLConnection;
   use DB\Arango\Connection as ArangoConnection;
   use Helper\View;

   require "vendor/autoload.php";
   if(isset($_SESSION['logged'])){
		if(isset($_GET['id']) && $_GET['id'] != $_SESSION['id']){
			// User's profile
			$id = $_GET['id'];
			$isSelf = FALSE;
		}else{
			// User's own profile
			$id = $_SESSION['id'];
			$isSelf = TRUE;
		}
		
		// Get friends 
		$arango = new ArangoConnection();
		$result = $arango->execute('FOR f IN friends FILTER f._from == "users/'.$id.'" RETURN f._to');
		foreach ($result as $key => $value) {
			$result[$key] = str_replace('users/', '', $value);
		}

		$ids = $result;
		
		// Check if logged user is friend with shown user
		$isFriend = $arango->execute('FOR f IN friends FILTER f._to == "users/'.$id.'" AND f._from == "users/'.$_SESSION['id'].'" RETURN f._to');
		$isFriend = (count($isFriend) > 0);

		// Get friends data
		if(count($ids) > 0){
			$mysql = new MySQLConnection();
			$stmt = $mysql->preparedStatement("SELECT users.* FROM users WHERE `id` IN (". join(",", array_fill(0, count($ids), "?")) .")", $ids);
			$friends = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}else{
			$friends = [];
		}

		$mysql = new MySQLConnection();
		$stmt = $mysql->preparedStatement("SELECT * FROM users WHERE `id` = :id", compact('id'));
		$user = $stmt->fetchAll(PDO::FETCH_ASSOC);

		View::viewTemplate("views/profile.php", "dashboard.php", compact("user", "friends", "isSelf", "isFriend"));
	}else{
		header("Location: login.php");
	}
   
?>