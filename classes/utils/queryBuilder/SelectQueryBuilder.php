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
class SelectQueryBuilder {
    use HasWhere, HasJoin;
    /**
     * @var string
    */
    public $table;
    /**
     * @var string
    */
    public $columns;
    /**
     * @var PDO
    */
    public $pdo;
    
    public function __construct(string $table, array $columns = ['*'], PDO $pdo)
    {
        $this->table = $table;
        $this->pdo = $pdo;
        $this->columns = implode(',', $columns);
        $this->where_builder = new WhereQueryBuilder();
        $this->join_builder = new JoinQueryBuilder();
    }

    public function getQuery()
    {
        $query = "SELECT {$this->columns} FROM {$this->table} ";
        if($this->where_builder->hasWheres()) {
            $query .= "WHERE {$this->where_builder->getQuery()}";
        }
        if($this->join_builder->hasJoins()) {
            $query .= " ".$this->join_builder->getQuery();
        }
        return $query;
    }

    public function execute()
    {
        try {
            $query = $this->pdo->prepare($this->getQuery());
            $values = array_merge($this->where_builder->getValues(), $this->join_builder->values);
            $query->execute($values);
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
        return $results;
        } catch (\Throwable $th) {
            die("ERROR AL CONSULTAR A BASE DE DATOS: {$th->getMessage()}");
        }
    }
}