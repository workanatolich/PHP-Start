<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}

$pdo = new PDO('mysql:host=database; dbname=guestBook; charset=utf8', 'root', 'test');
$sql = "SELECT * FROM pages WHERE url = '$page'";
$sth = $pdo -> query($sql);
$page = $sth -> fetch(PDO::FETCH_ASSOC);


if(!$page) {
    $sql = "SELECT * FROM pages WHERE url = '404'";
    $sth = $pdo -> query($sql);
    $page = $sth -> fetch(PDO::FETCH_ASSOC);

    header("HTTP/1.0 404 Not Found");
}

$title = $page['title'];
$content = $page['text'];

include 'layout.php';

