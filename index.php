<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

$host = 'database';
$user = 'root';
$password = 'test';
$db_name = 'test';

$link = mysqli_connect($host, $user, $password, $db_name);
mysqli_query($link, "SET NAMES 'utf8'");

$sql1 = "INSERT INTO workers (name,age,salary) VALUES ('Ярослав', 30, 1200), ('Петя', 24, 1000)";
mysqli_query($link, $sql1) or die(mysqli_error($link));


$sql2 = "SELECT * FROM workers WHERE id>8";
$result = mysqli_query($link, $sql2) or die(mysqli_error($link));

for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

echo '<pre>';
print_r($data);
echo '</pre>';
