<?php

$pdo = new PDO('mysql:host=database; dbname=guestBook; charset=utf8', 'root', 'test');

function deletePage($pdo) {
    if(isset($_GET['delete'])) {
        $id = $_GET['delete'];
    }

    $sql = "DELETE FROM pages WHERE id=$id";
    $sth = $pdo -> query($sql);

    if($sth == false) {
        header('Location: /admin/?deleted=false');
    } else {
        header('Location: /admin/?deleted=true');
    }

}

deletePage($pdo);