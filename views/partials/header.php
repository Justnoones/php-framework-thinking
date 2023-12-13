<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            list-style-type: none;
        }
        ul {
            display: flex;
            gap: 5px;
        }
    </style>
</head>
<body>
<?php require "views/components/navbar.php" ?>

<?php if ($_COOKIE["flashmessage"]) : ?>
    <h1><?=$_COOKIE["flashmessage"]?></h1>
<?php setcookie("flashmessage", "", time()-1) ?>
<?php endif ?>