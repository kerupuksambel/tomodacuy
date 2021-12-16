<?php
    namespace DB\Arango;

    use Dotenv\Dotenv;
    use ArangoDBClient\ConnectionOptions;
    use ArangoDBClient\Connection as ArangoConnection;
    use ArangoDBClient\Statement;
    use ArangoDBClient\UpdatePolicy;

    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

    class Connection{
        public $db;

        public function __construct(){
            $dotenv = Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
            $dotenv->load();
        
            $connectionOptions = array(
                ConnectionOptions::OPTION_ENDPOINT => 'tcp://'.$_ENV['ARANGO_IP'].':8529',
                ConnectionOptions::OPTION_AUTH_TYPE => 'Basic',
                ConnectionOptions::OPTION_AUTH_USER => $_ENV['ARANGO_USER'],
                ConnectionOptions::OPTION_AUTH_PASSWD => $_ENV['ARANGO_PASS'],
                ConnectionOptions::OPTION_DATABASE => 'tomodacuy',
                ConnectionOptions::OPTION_CONNECTION => 'Close',
                ConnectionOptions::OPTION_RECONNECT => true,
                ConnectionOptions::OPTION_CREATE => true,
                ConnectionOptions::OPTION_UPDATE_POLICY => UpdatePolicy::LAST,
            );
             
            return new ArangoConnection($connectionOptions);
        }

        public function execute($query){ 
            $statement = new Statement(
                $this->db,
                array(
                    "query"     => $query,
                    "count"     => true,
                    "batchSize" => 1000,
                    "sanitize"  => true
                )
            );
            
            $cursor = $statement->execute();

            return $cursor;
        } 
    }

?>