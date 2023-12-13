<?php

class QueryBuilder
{
    protected $pdo;
    protected static $spdo;
    public function __construct ($pdo) {
        $this->pdo = $pdo;
        self::$spdo = $pdo;
    }

    public function find ($id, $db) {
        $sql = "SELECT * FROM $db WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ":id" => $id
        ]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$data) {
            return false;
        }
        return $data;
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

    public function destory ($id, $dbname) {
        $sql = "DELETE FROM $dbname WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $status = $stmt->execute([
            ":id" => $id
        ]);
        return $status;
    }

    public function update ($data, $dbname) {
        $arrayKeys = array_keys($data);
        $bind = "";
        $id = $data["id"];

        for ($i=0; $i < count($arrayKeys); $i++) {
            if ($i+1 == count($arrayKeys)) {
                $bind .= "$arrayKeys[$i] = :$arrayKeys[$i]";
                break;
            }
            // if ($arrayKeys[$i] == "id") {
            //     continue;
            // }
            $bind .= "$arrayKeys[$i] = :$arrayKeys[$i],";
        }
        
        $sql = "UPDATE $dbname
            SET $bind
            WHERE id = :id";

        $executeArrays = [];
        for ($i=0; $i < count($arrayKeys); $i++) {
            $executeArrays[":$arrayKeys[$i]"] = $data[$arrayKeys[$i]];
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($executeArrays);
        return $id;
    }
}