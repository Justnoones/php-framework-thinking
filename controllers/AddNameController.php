<?php

if (empty($_POST['name'])) {
    setcookie("flashmessage", "Name can't be empty");
    header("Location: /");
    return;
}

$status = App::get("database")->insert([
    "name" => $_POST["name"],
], "users");


if ($status) {
    setcookie("flashmessage", "Successfully Added New Name");
    header("Location: /");
} else {
    setcookie("flashmessage", "Failed To Add New Name");
    header("Location: /");
}

require "views/addname.view.php";
