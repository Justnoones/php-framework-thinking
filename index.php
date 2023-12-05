<?php
require_once "core/bootstrap.php";

Router::load("core/routes.php")->direct(Request::uri());