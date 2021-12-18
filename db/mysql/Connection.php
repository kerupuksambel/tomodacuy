<?php
    namespace DB\MySQL;

    use Dotenv\Dotenv;

    class Connection{
        public $db;

        public function __construct(){
            $dotenv = Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
            $dotenv->load();
            $dsn = $dsn = 'mysql:host=' . $_ENV['MYSQL_IP'] . ';dbname=tomodacuy;';
            $this->db = new \PDO($dsn, $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASS']);
        }

        public function preparedStatement($query, $assoc = NULL)
        {
            $stmt = $this->db->prepare($query);
            if(!is_null($assoc)){
                $stmt->execute($assoc);
            }else{
                $stmt->execute();
            }
            
            return $stmt;
        }
    }
?>