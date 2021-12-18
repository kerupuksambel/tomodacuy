<?php
    use DB\MySQL\Connection as MySQLConnection;
	use DB\Arango\Connection as ArangoConnection;
	use Helper\View;

	require "vendor/autoload.php";

    $mysql = new MySQLConnection();
    $arango = new ArangoConnection();

    var_dump($mysql);
    var_dump($arango);
?>