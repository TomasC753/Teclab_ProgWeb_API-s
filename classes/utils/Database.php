<?php 
namespace classes\utils;

use classes\utils\queryBuilder\QueryBuilder;

/**
 * @author Tomas Catalano <tcatalano159@gmail.com>
*/
class Database {
    private static function connect()
    {
        $db = new DBconnection();
        return $db->init();
    }

    public function select(string $table, array $columns, string $model)
    {
        return QueryBuilder::select($table, $columns, self::connect(), $model);
    }

    public function insert(string $table, array $data)
    {
        return QueryBuilder::insert($table, $data, self::connect());
    }

    public function update(string $table, array $data)
    {
        return QueryBuilder::update($table, $data, self::connect());
    }

    public function delete(string $table)
    {
        return QueryBuilder::delete($table, self::connect());
    }
}