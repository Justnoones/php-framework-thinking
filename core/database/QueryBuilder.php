<?php

class QueryBuilder
{
    protected $pdo;
    protected static $spdo;
    public function __construct ($pdo) {
        $this->pdo = $pdo;
        self::$spdo = $pdo;
    }

    public function find ($db, $param) {
        $stmt = $this->pdo->prepare("SELECT * FROM $db WHERE id = :param");
        $stmt->execute([
            ":param" => $param
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function get ($db) {
        $stmt = $this->pdo->prepare("SELECT * FROM $db");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function all ($db) {
        $stmt = self::$spdo->prepare("SELECT * FROM $db");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert ($data, $dbname) {
        $arrayKeys = array_keys($data);
        $tableColumns = implode(", ",$arrayKeys);

        $bindingColumns = [];
        foreach ($arrayKeys as $arrayKey) {
            $bindingColumns[] = ":$arrayKey";
        }
        $bindingColumns = implode(", ", $bindingColumns);

        $executeKeys = explode(", ", $bindingColumns);
        $executeArrays = [];
        foreach ($executeKeys as $executeArray) {
            $executeArrays[$executeArray] = $data[trim($executeArray, ":")];
        }

        $sql = "INSERT INTO $dbname ($tableColumns) VALUES
        ($bindingColumns)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($executeArrays);
    }
}