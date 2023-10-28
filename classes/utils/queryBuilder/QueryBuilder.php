<?php

namespace classes\utils\queryBuilder;

use PDO;

/**
 * @author Tomas Catalano <tcatalano159@gmail.com>
*/
class QueryBuilder {
    static public function select(string $table, array $columns, PDO $pdo, string $model) {
        return new SelectQueryBuilder($table, $columns, $pdo, $model);
    }

    static public function insert(string $table, array $data, PDO $pdo) {
        return new InsertQueryBuilder($table, $data, $pdo);
    }

    static public function update(string $table, array $data, PDO $pdo) {
        return new UpdateQueryBuilder($table, $data, $pdo);
    }

    static public function delete(string $table, PDO $pdo) {
        return new DeleteQueryBuilder($table, $pdo);
    }
}