<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Title</title>
</head>
<body>
<table>
    <tr>
        <th>ID</th>
        <th>name</th>
        <th>age</th>
        <th>salary</th>
    </tr>
    <?php
        $link = mysqli_connect('database', 'root', 'test', 'test')
                or die(mysqli_error($link));
        mysqli_query($link, "SET NAMES 'utf8'");

        $sql = "SELECT * FROM workers ";
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));

        for($data=[]; $row=mysqli_fetch_assoc($result); $data[] = $row);

        $result = '';
        foreach($data as $elem) {
            $result .= '<tr>';

            $result .= '<td>' .$elem['id'] . '</td>';
            $result .= '<td>' .$elem['name'] . '</td>';
            $result .= '<td>' .$elem['age'] . '</td>';
            $result .= '<td>' .$elem['salary'] . '</td>';

            $result .= '</tr>';
        }

        echo $result;
    ?>
</table>



</body>
</html>