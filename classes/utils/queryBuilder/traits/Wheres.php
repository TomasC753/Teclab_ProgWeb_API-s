<?php
namespace classes\utils\queryBuilder\traits;

/**
 * @author Tomas Catalano <tcatalano159@gmail.com>
*/
class Wheres {
    public $columns = [];
    /**
     * @var string[]
    */
    public $strings = [];

    public function add(string $column, string $operator)
    {
        $this->strings[] = "$column $operator ?";
        $this->columns[] = $column;
    }

    public function addGroup(string $group, array $columns)
    {
        $this->strings[] = "($group)";
        $this->columns[] = $columns;
    }

    public function length()
    {
        return count($this->strings);
    }
}