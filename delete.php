<?php

if(isset($_GET['del'])) {
    $del = $_GET['del'];

    $pdo = new PDO('mysql:host=database; dbname=test; charset=utf8', 'root', 'test');
    $sql = "DELETE FROM workers WHERE id=$del";
    $sth = $pdo->prepare($sql);
    $sth -> execute();

    header("Location: index.php");

} else {
    echo 'Неверно введен адрес';
}