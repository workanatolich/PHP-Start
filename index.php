<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

$host = 'database';
$user = 'root';
$password = 'test';
$db_name = 'test';

$link = mysqli_connect($host, $user, $password, $db_name);
mysqli_query($link, "SET NAMES 'utf8'");

$sql1 = "SELECT COUNT(*) FROM workers WHERE salary=500";
$result = mysqli_query($link, $sql1) or die(mysqli_error($link));

$count = mysqli_fetch_object($result);

echo '<pre>';
print_r($count);
echo '</pre>';
