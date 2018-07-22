<?php

namespace components;


/**
 * This class and it's children contain the main business logic of application.
 * @package components
 */
abstract class Model
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
        if(!$this->validate($values, $this->fields)) {
            echo "cunt";
            return false;
        }

        $query = "INSERT INTO " . $this->table . " (";
        $query .= implode(", ", array_keys($this->fields)) . ") VALUES (:";
        $query .= implode(", :", array_keys($this->fields)) . ")";

        $statement = $this->pdo->prepare($query);

        return $statement->execute($values);
    }

    public function update($closure, $values) {
        if (!$this->validate($values, $this->fields)) {
            return false;
        }

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

    public function validate($values, $rules) {
        foreach ($rules as $key => $rule) {
            if (!isset($values[$key])) {
                continue;
            }

            $regExpLogin = "/^[a-zA-Z0-9_@]+$/";
            $regExpNames = "/^[a-zA-Z]+$/";

            switch ($rule) {
                case "login":

                    if(!filter_var(
                            $values[$key],
                            FILTER_VALIDATE_REGEXP,
                            array("options" => array("regexp" => $regExpLogin)
                        ))) {
                            throw new BaseException("Login can contain only latin letters, numbers or symbols _ and @");
                        }

                break;

                case "names":

                    if(!filter_var(
                        $values[$key],
                        FILTER_VALIDATE_REGEXP,
                        array("options" => array("regexp" => $regExpNames)
                        ))) {
                        throw new BaseException("Names can contain only latin letters");
                    }

                break;
            }
        }

        return true;
    }
}