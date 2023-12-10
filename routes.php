<?php
$router->get("", "Controller@index");
$router->get("home", "Controller@home");
$router->post("adduser", "Controller@addUser");