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