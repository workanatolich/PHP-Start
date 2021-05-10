<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

$host = 'database';
$user = 'root';
$password = 'test';
$db_name = 'test';

$link = mysqli_connect($host, $user, $password, $db_name);
mysqli_query($link, "SET NAMES 'utf8'");

$sql1 = "UPDATE workers SET name='Женя', salary='900' WHERE name='Вася'";
mysqli_query($link, $sql1) or die(mysqli_error($link));


$sql2 = "SELECT * FROM workers";
$result = mysqli_query($link, $sql2) or die(mysqli_error($link));

for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

echo '<pre>';
print_r($data);
echo '</pre>';
