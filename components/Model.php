<?php

namespace components;


class Model
{
    public $pdo = null;
    public $table = "";
    public $fields = [];
    public $rules = [];

    public function __construct() {
        $this->pdo = DB::getInstance()->getPDO();
    }

    public function select($closure = []) {
        $query = "SELECT * FROM " . $this->table;

        if (!empty($closure["where"])) {
            $query .= " WHERE " . $closure["where"];
        }

        if (!empty($closure["order_by"])) {
            $query .= " ORDER BY " . $closure["order_by"];
        }

        if (!empty($closure["limit"])) {
            $query .= " LIMIT " . $closure["limit"];
        }

        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function delete($closure = []) {

        $query = "DELETE FROM " . $this->table . " WHERE " . $closure["where"];

        $statement = $this->pdo->prepare($query);

        return $statement->execute();

    }

    public function insert($values = []) {
        $query = "INSERT INTO " . $this->table . " (";
        $query .= implode(", ", array_keys($this->fields)) . ") VALUES (:";
        $query .= implode(", :", array_keys($this->fields)) . ")";

        $statement = $this->pdo->prepare($query);

        return $statement->execute($values);
    }

    public function update($closure, $values) {
        $query = "UPDATE " . $this->table . " SET ";

        $fields = [];
        foreach ($values as $key => $value) {
            $fields[] = "{$key} = :{$key}";
        }

        $query .= implode(", ", $fields);

        $query .= " WHERE " . $closure["where"];

        $statement = $this->pdo->prepare($query);

        return $statement->execute($values);
    }

    public function count($closure = []) {
        $query = "SELECT COUNT(*) AS count FROM " . $this->table;

        if(!empty($closure["where"])) {
            $query .= " WHERE " . $closure["where"];
        }

        $statement = $this->pdo->prepare($query);

        $statement->execute();
        $result = $statement->fetch();

        return $result["count"];
    }
}