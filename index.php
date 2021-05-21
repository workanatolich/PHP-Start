<?php

$pdo = new PDO("mysql:host=database; dbname=guestBook; charset=utf8", 'root', 'test');
$sql = "SELECT * FROM messages ORDER BY date desc";
$sth = $pdo -> query($sql);
$data = $sth -> fetchAll(PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Гостевая книга</title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div id="wrapper">
    <h1>Гостевая книга</h1>

    <?php foreach($data as $value) : ?>
    <div class="note">
        <p>
            <span class="date"><?= $value['date']?></span>
            <span class="name"><?= $value['name']?></span>
        </p>
        <p><?= $value['message'] ?></p>
    </div>
    <?php endforeach; ?>

    <div id="form">
        <form action="store.php" method="POST">
            <p><input class="form-control" name="name" placeholder="Ваше имя"></p>
            <p><textarea class="form-control" name="message" placeholder="Ваш отзыв"></textarea></p>
            <p><button class="btn btn-info btn-block">Сохранить</button></p>
        </form>
    </div>

    <script src="js/script.js"></script>
</div>
</body>
</html>

