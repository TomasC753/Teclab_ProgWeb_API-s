<?php
namespace classes\utils\queryBuilder\traits;

/**
 * @author Tomas Catalano <tcatalano159@gmail.com>
*/
class JoinQueryBuilder {
    //
    /**
     * @var string[]
    */
    public $joins = [];
    /**
     * @var mixed[]
    */
    public $values = [];

    public function add(string $table, string $column1, string $operator, string $column2)
    {
        $this->joins[] = "JOIN $table ON ? $operator ?";
        $this->values = array_merge($this->values, [$column1, $column2]);
    }

    public function hasJoins()
    {
        return !empty($this->joins);
    }

    public function getQuery() : string
    {
        return implode(" ", $this->joins);
    }

    public function getValues()
    {
        return $this->values;
    }
}