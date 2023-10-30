<?php
namespace classes\utils\queryBuilder\traits;

/**
 * @author Tomas Catalano <tcatalano159@gmail.com>
*/
class Wheres {
    /**
     * @var string[]
    */
    public $strings = [];

    public function add(string $column, string $operator, string $value)
    {
        $this->strings[] = "$column $operator $value";
    }

    public function addGroup(string $group, array $columns)
    {
        $this->strings[] = "($group)";
    }

    public function length()
    {
        return count($this->strings);
    }
}