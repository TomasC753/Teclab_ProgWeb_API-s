<?php
namespace classes\utils\queryBuilder\traits;

/**
 * @author Tomas Catalano <tcatalano159@gmail.com>
*/
trait HasJoin
{
    /**
     * @var JoinQueryBuilder
    */
    public $join_builder;
    public function join(string $table, string $column1, string $operator, string $column2)
    {
        $this->join_builder->add($table, $column1, $operator, $column2);
        return $this;
    }
}
