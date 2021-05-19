<?php

    $id = $_GET['id'];

    $pdo = new PDO('mysql:host=database; dbname=test; charset=utf8', 'root', 'test');
    $sql = "SELECT * FROM workers WHERE id=$id";
    $sth = $pdo -> prepare($sql);
    $sth -> execute();
    $worker = $sth -> fetch(PDO::FETCH_ASSOC);

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Edit the worker</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit the worker</h1>
            <form action="update.php?id=<?=$worker['id']?>" method="post">
                <fieldset>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-5">
                            <input type="text" name="name" class="form-control" id="inputName3" value="<?=$worker['name']?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Age</label>
                        <div class="col-sm-5">
                            <input type="number" name="age" class="form-control" id="inputAge3" value="<?=$worker['age']?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Salary</label>
                        <div class="col-sm-5">
                            <input type="number" name="salary" class="form-control" id="inputSalary3" value="<?=$worker['salary']?>">
                        </div>
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="index.php" class="btn btn-danger">Back</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>