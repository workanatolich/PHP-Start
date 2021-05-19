<?php

if (isset($_GET['del'])) {
    $link = mysqli_connect('database', 'root', 'test', 'test')
    or die(mysqli_error($link));
    mysqli_query($link, "SET NAMES 'utf8'");

    $del = $_GET['del'];
    $sql = "DELETE FROM workers WHERE id=$del";
    mysqli_query($link, $sql) or die(mysqli_error($link));

    header("Location: index.php");

}