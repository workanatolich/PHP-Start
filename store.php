<?php

session_start();

// Task 2
echo $_SESSION['age'] .'<br>';

// Task 4
if(!empty($_SESSION['country'])){
    echo 'Ваша страна ' .$_SESSION['country'];
}

?>

<!--Form for task 6-->
<form action="">
    <div>
        <label><input type="text" name="name" placeholder="Your name"></label>
    </div>

    <div>
        <label><input type="text" name="surname" placeholder="Your surname"></label>
    </div>

    <div>
        <label><input type="password" name="password" placeholder="Your password"></label>
    </div>

    <div>
        <label><input type="text" name="email" placeholder="Your email" value="<?php if(!empty($_SESSION['email'])) echo $_SESSION['email'];?>"></label>
    </div>

    <input type="submit" name="submit" >
</form>