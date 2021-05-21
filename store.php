<?php

function _date($format="r", $timestamp=false, $timezone=false)
{
    $userTimezone = new DateTimeZone(!empty($timezone) ? $timezone : 'GMT');
    $gmtTimezone = new DateTimeZone('GMT');
    $myDateTime = new DateTime(($timestamp!=false?date("r",(int)$timestamp):date("r")), $gmtTimezone);
    $offset = $userTimezone->getOffset($myDateTime);
    return date($format, ($timestamp!=false?(int)$timestamp:$myDateTime->format('U')) + $offset);
}

if(!empty($_POST['name']) && !empty($_POST['message'])) {
    $name = $_POST['name'];
    $date = _date("Y-m-d G:i:s", false, 'Europe/Moscow');
    $message = $_POST['message'];

    $pdo = new PDO("mysql:host=database; dbname=guestBook; charset=utf8", 'root', 'test');
    $sql = "INSERT INTO messages SET name='$name', date='$date', message='$message'";
    $sth = $pdo -> query($sql);

    header("Location: index.php");
}

