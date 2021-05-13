<?php

$link = mysqli_connect('database', 'root', 'test', 'test')
or die(mysqli_error($link));
mysqli_query($link, "SET NAMES 'utf8'");

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
            <a href="add.php" class="btn btn-primary">Add a worker</a>
        </div>
    </div>
</div>

</body>
</html>