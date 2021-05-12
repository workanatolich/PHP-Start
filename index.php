<?php

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


if (isset($_GET['del'])) {
    $del = $_GET['del'];
    $sql = "DELETE FROM workers WHERE id=$del";
    mysqli_query($link, $sql) or die(mysqli_error($link));
}

$sql = "SELECT * FROM workers ";
$result = mysqli_query($link, $sql) or die(mysqli_error($link));

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>Title</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>

                <tbody>
                  <?php
                    for($data=[]; $row=mysqli_fetch_assoc($result); $data[] = $row);
                    $result = '';

                    foreach($data as $elem) {
                        $result .= '<tr>';

                        $result .= '<th scope="row">' .$elem['id'] . '</th>';
                        $result .= '<td>' .$elem['name'] . '</td>';
                        $result .= '<td>' .$elem['age'] . '</td>';
                        $result .= '<td>' .$elem['salary'] . '</td>';
                        $result .= '<td><a href ="?del='.$elem['id'].'">Click</a></td>';

                        $result .= '</tr>';
                    }
                    echo $result;?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Name" aria-label="Name" aria-describedby="basic-addon1">
                </div>

                <div class="mb-3">
                    <input type="number" class="form-control" name="age" placeholder="Age" aria-label="Age" aria-describedby="basic-addon1">
                </div>

                <div class="mb-3">
                    <input type="number" class="form-control" name="salary" placeholder="Salary" aria-label="Salary" aria-describedby="basic-addon1">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>





</div>

</body>
</html>