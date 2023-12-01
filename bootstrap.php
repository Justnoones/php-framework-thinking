<?php
require "./helperFunctions.php";

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
if (file_exists(__DIR__ . '/.env.example')) {
    $dotenv->load(__DIR__ . '/.env.example');
} else {
    $dotenv->load();
}

require "./database/Connection.php";
require "./database/QueryBuilder.php";

$connection = new Connection();
$queryBuilder = new QueryBuilder($connection::make());