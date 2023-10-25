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
class UpdateQueryBuilder {
    use HasWhere, HasJoin;

    /**
     * @var string
    */
    private $table;
    /**
     * @var string[]
    */
    private $setters;
    /**
     * @var string[]
    */
    private $values;
    /**
     * @var PDO
    */
    private $pdo;

    public function __construct(string $table, array $values, PDO $pdo) {
        $this->table = $table;
        $this->setters = array_map(function ($clave) {
            return "$clave = ?";
        }, array_keys($values), $values);
        $this->values = array_values($values);
        $this->pdo = $pdo;

        $this->where_builder = new WhereQueryBuilder();
        $this->join_builder = new JoinQueryBuilder();
    }

    public function getQuery() : string
    {
        $fields = implode(',', $this->setters);
        $query = "UPDATE {$this->table} SET {$fields}";

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
        $values = array_merge($this->values, $this->where_builder->getValues(), $this->join_builder->values);

        return $query->execute($values);
    }
}