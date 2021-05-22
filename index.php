<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

$arr = ['1.php', '2.php', '3.php'];

foreach ($arr as $file) {
    include $file;
}