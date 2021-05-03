<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

session_start();

// Task 1
$_SESSION['test'] = 'test';
echo $_SESSION['test'] .'<br>';

// Task 2
$_SESSION['age'] = 14;

// Task 3
if(!isset($_SESSION['counter'])) {
    echo 'Вы еще не обновляли страницу';
    $_SESSION['counter'] = 0;
} else {
    $_SESSION['counter'] ++;
    echo 'Вы обновили страницу ' .$_SESSION['counter'] .' раз';
}

// Task 4
if(isset($_POST['submit']) and !empty($_POST['country'])) {
    $_SESSION['country'] = $_POST['country'];
}

?>

<!--Form for task 4-->
<form action="" method="post">
    <input type="text" name="country" placeholder="Write the country">
    <input type="submit" name="submit">
</form>
<!------------------>

<?php

// Task 5
if(!isset($_SESSION['time'])) { $_SESSION['time'] = time(); }
else { echo 'Прошло ' .(time()-$_SESSION['time']) .' секунд'; }

// Task 6
if (isset($_POST['email']) and isset($_POST['submit'])) {
    $_SESSION['email'] = $_POST['email'];
}

?>

<form action="" method="post">
    <input type="text" name="email" placeholder="Your email">
    <input type="submit" name="submit">
</form>

