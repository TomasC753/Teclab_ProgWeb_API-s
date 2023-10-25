<?php
namespace classes\utils;
use PDO;

require_once "./config.php";

/**
 * @author Tomas Catalano <tcatalano159@gmail.com>
*/
class DBconnection {

    private $db_host;
    private $port;
    private $db_name;
    private $db_user;
    private $db_pass;

    public $connection;

    public function __construct()
    {
        $this->db_host = HOST;
        $this->db_name = DB_NAME;
        $this->db_user = DB_USER;
        $this->db_pass = DB_PASSWORD;
        $this->port = PORT;
    }

    public function init()
    {
        try {
            $connection = new PDO(
                "pgsql:host={$this->db_host};port={$this->port};dbname={$this->db_name}",
                'postgres', 
                'tomasito04');
            
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (\PDOException $error) {
            die('ERROR DE CONEXIÓN:'. $error->getMessage());
        }
    }
}