<?php

$pdo = new PDO("mysql:host=database; dbname=test; charset=utf8", 'root', 'test');


// Pagination
$sql = "SELECT COUNT(*) as count FROM workers";
$sth = $pdo -> prepare($sql);
$sth -> execute();
$count = $sth -> fetch(PDO::FETCH_ASSOC)['count'];

$notesOnPage = 5;
$pages = ceil($count / $notesOnPage);


if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$from = ($page-1) * $notesOnPage;



$sql = "SELECT * FROM workers LIMIT $from,$notesOnPage";
$sth = $pdo -> prepare($sql);
$sth -> execute();
$data = $sth -> fetchAll(PDO::FETCH_ASSOC);



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Practice</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md">
            <h1>All workers</h1>
            <a href="add.php" class="btn btn-primary">Add a worker</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Salary</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($data as $value) : ?>
                    <tr>
                        <th scope="col"><?= $value['id'] ?></th>
                        <td><?= $value['name']?></td>
                        <td><?= $value['age']?></td>
                        <td><?= $value['salary']?></td>
                        <td>
                            <a href="edit.php?id=<?= $value['id']?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?= $value['id']?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
                <tfoot>
                    <tr>
                        <td>

                            <?php

                            if($page !== 1) {
                                $prevPage = $page - 1;
                                echo "<a href=\"?page=$prevPage?>\"><<</a> ";
                            }

                            for($i = 1; $i <= $pages; $i++) {
                                echo "<a href=\"?page=$i\">$i</a> ";
                            }

                            if($page !== $pages) {
                                $nextPage = $page + 1;
                                echo "<a href=\"?page=$nextPage?>\">>></a> ";
                            }

                            ?>

                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>




</body>
</html>
