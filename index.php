<?php

session_start();

if(!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 1;
} else {
    $_SESSION['counter'] += 1;
}

echo 'Cтраница обновилась ' .$_SESSION['counter'] .' раз';

if($_SESSION['counter'] === 30) {
    unset($_SESSION['counter']);
}