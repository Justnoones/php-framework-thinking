<?php require_once "partials/header.php" ?>
<?php if ($_COOKIE["flashmessage"]) : ?>
    <h1><?=$_COOKIE["flashmessage"]?></h1>
<?php setcookie("flashmessage", "", time()-1) ?>
<?php endif ?>
    <h1>Names</h1>
    <?php foreach($users as $user) : ?>
        <article><?=$user['name']?></article>
    <?php endforeach ?>
    <h1>Add Name Page</h1>
    <form action="/adduser" method="POST">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter Your Name..." />
        <button type="submit">Submit</button>
    </form>
<?php require_once "partials/footer.php" ?>