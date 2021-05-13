<?php

function input($name) {

    if(isset($_POST[$name])) {
        $value = $_POST[$name];
    }
    else {
        $value = '';
    }

    return '<input type="text" class="form-control" name="'.$name
            .'"placeholder="' .$name .'"aria-label="' .$name .'"aria-describedby="basic-addon1"
            value="' .$value .'">';
}

$link = mysqli_connect('database', 'root', 'test', 'test')
or die(mysqli_error($link));
mysqli_query($link, "SET NAMES 'utf8'");

if(!empty($_POST)) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO workers SET name='$name', age='$age', salary='$salary'";
    mysqli_query($link, $sql) or die(mysqli_error($link));
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>Add a worker</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Add a worker</h1>
            <form action="" method="post">
                <div class="mb-3">
                    <?php echo input('name');?>
                </div>
                <div class="mb-3">
                    <?php echo input('age');?>
                </div>
                <div class="mb-3">
                    <?php echo input('salary');?>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <a href="/" class="btn btn-warning">Go back</a>
        </div>
    </div>
</div>
</body>
</html>

