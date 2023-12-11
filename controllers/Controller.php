<?php

namespace controllers;

use core\App;
use QueryBuilder;

class Controller
{
    public function index () {
        $users = QueryBuilder::all("users");

        view("index", [
            "users" => $users
        ]);
    }

    public function home () {
        view("home");
    }

    public function addUser () {
        if (empty($_POST['name'])) {
            setcookie("flashmessage", "Name can't be empty");
            redirect("/");
            return;
        }

        $status = App::get("database")->insert([
            "name" => request("name"),
        ], "users");

        if ($status) {
            setcookie("flashmessage", "Successfully Added New Name");
            redirect("/");
        } else {
            setcookie("flashmessage", "Failed To Add New Name");
            redirect("/");
        }

        require "views/addname.view.php";
    }
}