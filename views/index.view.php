<?php require_once "partials/header.php" ?>

<?php if ($users) : ?>
    <h1>Users</h1>
    <?php foreach($users as $user) : ?>
        <section style="display: flex; gap: 0 5px;">
            <article>
                <p>
                    <?=$user['name']?>
                </p>
            </article>

            <p>/</p>

            <p>
                <a href="show?id=<?=$user['id']?>">view-datail</a>
            </p>
        </section>
    <?php endforeach ?>
<?php else : ?>
    <h1>No Users Found In Database</h1>
<?php endif ?>

<h1>Add New User</h1>
<form action="store" method="POST">
    <section>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter Your Name..." />
    </section>
    <section>
        <label for="age">Age</label>
        <input type="text" name="age" id="age" placeholder="Enter Your Age..." />
    </section>
    <button type="submit">Add User</button>
</form>

<?php require_once "partials/footer.php" ?>