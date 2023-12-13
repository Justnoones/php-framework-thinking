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

    public function store () {
        if (empty($_POST['name'])) {
            setcookie("flashmessage", "Name can't be empty");
            redirect("/");
            return;
        }

        $status = App::get("database")->insert([
            "name" => request("name"),
            "age" => request("age")
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

    public function show () {
        if (empty(request("id"))) {
            setcookie("flashmessage", "Invaild ID");
            redirect("/");
        }

        $user = App::get("database")->find(request("id"), "users");

        view("show", [
            "user" => $user
        ]);
    }

    public function destory () {
        if (!App::get("database")->destory(request("id"), "users")) {
            setcookie("flashmessage", "Something Went Wrong");
            redirect("/");
            return;
        }
        setcookie("flashmessage", "Successfully Deleted User");
        redirect("/");
    }

    public function edit () {
        if (!App::get("database")->find(request('id'), "users")) {
            setcookie("flashmessage", "Invaild User");
            redirect("/");
            return;
        }
        view("edit", [
            "user" => App::get("database")->find(request('id'), "users")
        ]);
    }

    public function update () {
        $res = App::get("database")->update(request(), "users");
        if (!$res) {
            setcookie("flashmessage", "Something Went Wrong!");
            redirect("/");
            return;
        }
        setcookie("flashmessage", "Successfully Updated User");
        redirect("show?id=$res");
    }
}