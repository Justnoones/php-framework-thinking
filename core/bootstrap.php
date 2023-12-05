<?php

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
if (file_exists(__DIR__ . '/.env.example')) {
    $dotenv->load(__DIR__ . '/.env.example');
} else {
    $dotenv->load();
}

require "core/helperFunctions.php";
require "core/database/Connection.php";
require "core/database/QueryBuilder.php";
require "core/Router.php";
require "core/Request.php";

$connection = new Connection();
$queryBuilder = new QueryBuilder($connection::make());