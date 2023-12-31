<?php

use core\App;

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load(__DIR__ . '.env');

App::bind("database", new QueryBuilder(Connection::make()));