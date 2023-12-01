<?php

class Connection
{
    public static function make () {
        try {
            $pdo = new PDO("{$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", "{$_ENV['DB_USER']}", "{$_ENV['DB_PASS']}");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}