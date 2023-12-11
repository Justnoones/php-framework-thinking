<?php

use controllers\Controller;

$router->get("", [Controller::class, "index"]);
$router->get("home", [Controller::class, "home"]);
$router->post("adduser", [Controller::class, "addUser"]);