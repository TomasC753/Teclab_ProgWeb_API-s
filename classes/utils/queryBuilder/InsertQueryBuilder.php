<?php 

namespace classes\utils\queryBuilder;

use PDO;

/**
 * @author Tomas Catalano <tcatalano159@gmail.com>
*/
class InsertQueryBuilder {
    /**
     * @var string
    */
    private $table;

    /**
     * @var string[]
    */
    private $fields;

    /**
     * @var string[]
    */
    private $values;

    /**
     * @var PDO
    */
    private $pdo;

    public function __construct(string $table, array $values, PDO $pdo)
    {
        //
        $this->table = $table;
        $this->fields = array_keys($values);
        $this->values = array_values($values);
        $this->pdo = $pdo;
    }

    public function getQuery() : string
    {
        $fields = implode(',', $this->fields);
        $values = implode(',', array_fill(0, count($this->values),'?'));
        return "INSERT INTO {$this->table} ($fields) VALUES ($values)";
    }

    public function execute()
    {
        $query = $this->pdo->prepare($this->getQuery());

        return $query->execute($this->values);
    }
}