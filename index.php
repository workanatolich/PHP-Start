<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

$host = 'database';
$user = 'root';
$password = 'test';
$db = 'test';
$charset = 'utf8';

$pdo = new PDO("mysql:host=$host; dbname=$db; charset=$charset", $user, $password);
$sql = "SELECT * FROM workers";
$stmt = $pdo -> prepare($sql);
$stmt -> execute();
$data = $stmt -> fetchAll(PDO::FETCH_ASSOC);

echo '<pre>';
print_r($data);
echo '</pre>';