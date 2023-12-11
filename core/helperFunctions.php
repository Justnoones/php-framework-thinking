<?php

function dd ($parameter) {
    echo "<pre>";
    die(var_dump($parameter));
    echo "</pre>";
    return;
}

function view ($fileName, $data=[]) {
    extract(
        $data
    );
    return require_once "views/$fileName.view.php";
}

function redirect ($url) {
    return header("Location: $url");
}

function request ($name="") {
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        if ($name) {
            return $_GET[$name];
        }
        return $_GET;
    } else {
        if ($name) {
            return $_POST[$name];
        }
        return $_POST;
    }
}