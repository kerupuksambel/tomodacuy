<?php
   session_start();

   use DB\MySQL\Connection as MySQLConnection;
   use DB\Arango\Connection as ArangoConnection;
   use Helper\View;

   require "vendor/autoload.php";
   if(isset($_SESSION['logged'])){
        if(isset($_GET['id'])){
            // User's profile
            $id = $_GET['id'];
        }else{
            // Redirect to user's profile
            header('Location: profile.php');
        }
        $arango = new ArangoConnection();
        $isFriend = $arango->execute('FOR f IN friends FILTER f._from == "users/'.$_SESSION['id'].'" AND f._to == "users/'.$id.'" RETURN f._key');
        // die(var_dump($isFriend));
        if(count($isFriend) == 0){
            $docId = $arango->insertEdge('friends', 'users', $_SESSION['id'], $id);
        }else{
            $docId = $arango->deleteEdge('friends', $isFriend[0]);
        }

        header("Location: profile.php?id=".$id);
    }else{
        header("Location: login.php");
    }
   
?>