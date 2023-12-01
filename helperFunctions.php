<?php

function dd ($parameter) {
    echo "<pre>";
    die(var_dump($parameter));
    echo "</pre>";
}