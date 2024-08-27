<?php
function all($table, $fields = '*') {
    try {
        $conn = connect();
        $query = $conn->query("SELECT {$fields} FROM {$table}");

        return $query->fetchAll();
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }
}
function findBy($table, $by, $value, $fields = '*') {
    try {
        $conn = connect();
        
        $sql = "SELECT {$fields} FROM {$table} WHERE $by = :value";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':value', $value);
        $stmt->execute();

        return $stmt->fetch();
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }
}
?>