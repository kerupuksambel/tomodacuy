<?php
    use ArangoDBClient\Collection;
    use ArangoDBClient\DocumentHandler;
    use ArangoDBClient\CollectionHandler;
    use DB\Arango\Connection as ArangoConnection;

    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    
    $arango = new ArangoConnection();
    $connection = $arango->db;
    $collectionHandler = new CollectionHandler($connection);
    
    // make new person collection
    $collectionName = "users";
    $collection = new Collection($collectionName);
     
    if ($collectionHandler->has($collectionName)) {
      $collectionHandler->drop($collectionName);
    }
     
    $collectionId = $collectionHandler->create($collection);
  
    // make new friends edge collection
    $collectionName = "friends";
    $collection = new Collection();
    $collection->setName($collectionName);
    $collection->setType(3);

    if ($collectionHandler->has($collectionName)) {
      $collectionHandler->drop($collectionName);
    }
    $collectionId = $collectionHandler->create($collection);

    $documentHandler = new DocumentHandler($connection);
?>