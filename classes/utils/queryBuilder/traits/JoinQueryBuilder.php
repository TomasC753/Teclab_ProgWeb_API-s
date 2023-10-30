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

    public function add(string $type, string $table, string $column1, string $operator, string $column2)
    {
        $this->joins[] = "$type $table ON $column1 $operator $column2";
    }

    public function hasJoins()
    {
        return !empty($this->joins);
    }

    public function getQuery() : string
    {
        return implode(" ", $this->joins);
    }
}