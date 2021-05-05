<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

function getDaysToBirthday($date) {
    function getSec($date) {
        $date1 = explode('-', $date);
        $date2 = explode('-', date('Y-m-d'));

        $a = mktime('0','0','0',$date1[1],$date1[2],date('Y'));
        $b = mktime('0','0','0',$date2[1],$date2[2],date('Y'));

        return $a - $b;
    }
    $sec = getSec($date);

    if ($sec > 0) {
        echo 'Осталось ' .$sec/86400 .' дней';
    }
    elseif ($sec == 0) {
        echo 'Поздравляем с днем рождения';
    }
    else {
        echo 'Осталось ' . (365-abs($sec/86400)) .' дней';
    }
}

$default = date('Y-m-n');

if(empty($_COOKIE['date'])) {
    $current = $default;
} else {
    $current = $_COOKIE['date'];
}

if(empty($_POST['date'])) {
    $new = null;
} else {
    $new = $_POST['date'];
}

if($new && $new !== $current) {
    $current = $new;
    setcookie('date', $new, time() + 86400);
}
getDaysToBirthday($_COOKIE['date']);


?>


<form action="" method="post">
    <label>
        Дата рождения
        <input type="date" name="date">
    </label>
    <button type="submit" name="submit" value="Send Request">Save</button>
</form>



