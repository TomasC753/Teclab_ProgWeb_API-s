<?php
namespace classes\utils\queryBuilder\traits;

/**
 * @author Tomas Catalano <tcatalano159@gmail.com>
*/
trait HasWhere
{
    /**
     * @var WhereQueryBuilder;
    */
    private $where_builder;
    
    public function where($field, $operator, $value)
    {
        $this->where_builder->where($field, $operator, $value);
        return $this;
    }

    public function whereGroup($callback)
    {
        $this->where_builder->whereGroup($callback);
        return $this;
    }

    public function orWhere($field, $operator, $value)
    {
        $this->where_builder->orWhere($field, $operator, $value);
        return $this;
    }

    public function orWhereGroup($callback)
    {
        $this->where_builder->orWhereGroup($callback);
        return $this;
    }
}
