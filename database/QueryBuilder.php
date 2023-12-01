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
}