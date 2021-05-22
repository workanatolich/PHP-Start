<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

$page = $_GET['page'];
$path = "dir/$page.php";

if(file_exists($path)) {
    include $path;
} else {
    echo 'Такого файла не существует';
}