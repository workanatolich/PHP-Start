<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

$host = 'database';
$user = 'root';
$password = 'test';
$db_name = 'test';

$link = mysqli_connect($host, $user, $password, $db_name);
mysqli_query($link, "SET NAMES 'utf8'");

$sql = "SELECT * FROM workers WHERE (age>=23 and age<27) or (salary=1000)";
$result = mysqli_query($link, $sql) or die(mysqli_error($link));

for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

echo '<pre>';
print_r($data);
echo '</pre>';
