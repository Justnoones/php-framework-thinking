<?php

use controllers\Controller;

$router->get("", [Controller::class, "index"]);
$router->get("show", [Controller::class, "show"]);

$router->post("store", [Controller::class, "store"]);

$router->get("edit", [Controller::class, "edit"]);
$router->post("update", [Controller::class, "update"]);

$router->post("destory", [Controller::class, "destory"]);