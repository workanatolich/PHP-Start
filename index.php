<?php

$pdo = new PDO("mysql:host=database; dbname=guestBook; charset=utf8", 'root', 'test');

$sql = "SELECT COUNT(*) as count FROM messages";
$sth = $pdo -> query($sql);
$messages = $sth -> fetch(PDO::FETCH_ASSOC)['count'];


if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$notesOnPage = 5;

$pages = ceil($messages / $notesOnPage);
$from = ($page-1) * $notesOnPage;

$prevPage = $page - 1;
$nextPage = $page + 1;

$sql = "SELECT * FROM messages ORDER BY date desc LIMIT $from,$notesOnPage";
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

    <div>
        <nav>
            <ul class="pagination">
                <?php if ($page != 1) {
                    echo "<li>
                            <a href=\"?page=$prevPage\" aria-label=\"Previous\">
                              <span>&laquo;</span>
                            </a>
                         </li>";
                } ?>

                <?php for($i = 1; $i <= $pages; $i++) {
                    if ($page == $i) {
                        echo "<li class=\"active\"><a href=\"?page=$i\">$i</a></li>";
                    } else {
                        echo "<li><a href=\"?page=$i\">$i</a></li>";
                    }
                } ?>

                <?php if ($page != $pages) {
                    echo " <li>
                                <a href=\"?page=$nextPage\" aria-label=\"Next\">
                                    <span>&raquo;</span>
                                </a>
                          </li>";
                } ?>
            </ul>
        </nav>
    </div>

    <?php foreach($data as $value) : ?>
    <div class="note">
        <p>
            <span class="date"><?= date('d.m.Y G:i:s', strtotime($value['date']))?></span>
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

