<?php
namespace classes\utils\queryBuilder\traits;

/**
 * @author Tomas Catalano <tcatalano159@gmail.com>
*/
class WhereQueryBuilder {
    /**
     * @var Wheres
    */
    public $wheres;
    /**
     * @var Wheres
    */
    public $orWheres;
    /**
     * @var mixed[]
    */
    public $values;

    function __construct() {
        $this->wheres = new Wheres();
        $this->orWheres = new Wheres();
    }

    public function where($field, $operator, $value)
    {
        $this->wheres->add($field, $operator);
        $this->values[] = $value;
        return $this;
    }

    public function whereGroup($callback)
    {
        $query = $callback(new WhereQueryBuilder());
        $this->wheres->addGroup($query->getQuery(), $query->wheres->columns);
        $this->values = array_merge($this->values, $query->values);
        return $this;
    }

    public function orWhere($field, $operator, $value)
    {
        $this->orWheres->add($field, $operator);
        $this->values[] = $value;
        return $this;
    }

    public function orWhereGroup($callback)
    {
        $query = $callback(new WhereQueryBuilder());
        $this->orWheres->addGroup($query->getQuery(), $query->wheres->columns);
        $this->values = array_merge($this->values, $query->values);
        return $this;
    }

    public function hasWheres() : bool
    {
        return !empty($this->wheres->strings);
    }

    public function hasOrWheres() : bool
    {
        return !empty($this->orWheres->strings);
    }

    public function getQuery() : string
    {
        $query = implode("  AND ", $this->wheres->strings);
        if ($this->hasOrWheres()) {
            $query .= ' OR '.implode("  OR ", $this->orWheres->strings);
        }

        return $query;
    }

    public function getValues() : array
    {
        // return $this->flatten([...$this->wheres->values, $this->orWheres->values]);
        return $this->values;
    }
}