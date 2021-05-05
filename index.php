<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

if (!isset($_COOKIE['Counter'])) {$_COOKIE['Counter'] = 0;}
$_COOKIE['Counter']++;
SetCookie('Counter', $_COOKIE['Counter'], time()+3600);
echo "Посещений сайта - " . $_COOKIE['Counter'] ;
