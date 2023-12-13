<?php require_once "partials/header.php" ?>
    <h1><?=$user['name']?> - <?=$user['age']?$user['age']:"**"?></h1>
    <section style="display: flex; gap: 5px;">
        <form action="edit" method="GET">
            <input type="hidden" name="id" value="<?=$user['id']?>">
            <button>Update</button>
        </form>
        <form action="destory" method="POST">
            <input type="hidden" name="id" value="<?=$user['id']?>">
            <button>Delete</button>
        </form>
    </section>
<?php require_once "partials/footer.php" ?>