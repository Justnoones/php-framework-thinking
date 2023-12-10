<?php
$users = QueryBuilder::all("users");

view("index", [
    "users" => $users
]);