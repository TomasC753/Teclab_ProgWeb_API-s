<?php 

namespace classes\utils\queryBuilder;

use classes\utils\queryBuilder\traits\HasJoin;
use classes\utils\queryBuilder\traits\HasWhere;
use classes\utils\queryBuilder\traits\JoinQueryBuilder;
use classes\utils\queryBuilder\traits\WhereQueryBuilder;
use PDO;

/**
 * @author Tomas Catalano <tcatalano159@gmail.com>
*/
class DeleteQueryBuilder {
    use HasJoin, HasWhere;

    /**
     * @var string
    */
    private $table;

    /**
     * @var PDO
    */
    private $pdo;

    public function __construct(string $table, PDO $pdo) {
        $this->table = $table;
        $this->pdo = $pdo;

        $this->where_builder = new WhereQueryBuilder();
        $this->join_builder = new JoinQueryBuilder();
    }

    public function getQuery() : string
    {
        $query = "DELETE FROM {$this->table}";

        if($this->where_builder->hasWheres()) {
            $query .= " WHERE {$this->where_builder->getQuery()}";
        }
        if($this->join_builder->hasJoins()) {
            $query .= " ".$this->join_builder->getQuery();
        }

        return $query;
    }

    public function execute()
    {
        $query = $this->pdo->prepare($this->getQuery());
        $values = array_merge($this->where_builder->getValues(), $this->join_builder->values);

        return $query->execute($values);
    }
}