<?php
require_once "./bootstrap.php";

$users = QueryBuilder::all("users");

require_once "./index.view.php";