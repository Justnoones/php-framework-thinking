<?php require_once "partials/header.php" ?>
    <h1>Update User</h1>
    <form action="update" method="POST">
        <input type="hidden" name="id" value="<?=$user['id']?>" />
        <section>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?=$user['name']?>" placeholder="Enter Your Name..." />
        </section>
        <section>
            <label for="age">Age</label>
            <input type="text" name="age" id="age" value="<?=$user['age']?>" placeholder="Enter Your Age..." />
        </section>
        <button type="submit">Update User</button>
    </form>
<?php require_once "partials/footer.php" ?>