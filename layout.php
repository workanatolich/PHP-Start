<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <title><?= $title ?></title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <header><?php include 'elements/header.php';?></header>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <main> <?= $content ?> </main>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <footer><?php include 'elements/footer.php';?></footer>
        </div>
    </div>
</div>

</body>
</html>
