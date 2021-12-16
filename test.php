<?php
    require "db/arango/Connection.php";

    $x = new ArangoConnection();
    var_dump($x->db);
?>