<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello World</h1>
    <?php foreach($users as $user) : ?>
    <p><?=$user['name']?></p>
    <?php endforeach ?>
</body>
</html>