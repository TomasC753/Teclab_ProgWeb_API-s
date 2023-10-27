<?php 

namespace classes\utils;

/**
 * @author Tomas Catalano <tcatalano159@gmail.com>
*/
class Model {
    /**
     * @var string|null
    */

    protected static function getTable() {
        if (property_exists(static::class, 'table')) {
            return static::$table;
        }
        return strtolower(substr(strrchr(static::class, "\\"), 1)) . 's';
    }

    static public function select(array $columns = ['*']) {
        return (new Database())->select(self::getTable(), $columns);
    }

    static public function create(array $data) {
        return (new Database())->insert(self::getTable(), $data);
    }

    static public function update(array $data) {
        return (new Database())->update(self::getTable(), $data);
    }

    static public function delete() {
        return (new Database())->delete(self::getTable());
    }

    static public function all() {
        return (new Database())->select(self::getTable(), ['*'])->execute();
    }
}