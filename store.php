<?php

if(!empty($_POST['name']) && !empty($_POST['age']) && !empty($_POST['salary'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $salary = $_POST['salary'];
} else {
    if (empty($_POST['name'])) {
        echo 'Вы не ввели имя';
    }
    elseif(empty($_POST['age'])) {
        echo 'Вы не ввели возраст';
    }
    elseif(empty($_POST['salary'])) {
        echo 'Вы не ввели зарплату';
    }
    die;
}

$pdo = new PDO('mysql:host=database; dbname=test; charset=utf8', 'root', 'test');
$sql = "INSERT INTO workers SET name='$name', age='$age', salary='$salary'";
$sth = $pdo -> prepare($sql);
$sth -> execute();

header("Location: index.php");