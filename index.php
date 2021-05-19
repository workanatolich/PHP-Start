<?php

$link = mysqli_connect('database', 'root', 'test', 'test')
or die(mysqli_error($link));
mysqli_query($link, "SET NAMES 'utf8'");

if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$notesOfPage = 3;
$from = ($page-1) * $notesOfPage;

$sql = "SELECT * FROM workers LIMIT $from,$notesOfPage";
$result = mysqli_query($link, $sql) or die(mysqli_error($link));
for($data=[]; $row=mysqli_fetch_assoc($result); $data[] = $row);

echo '<pre>';
print_r($data);
echo '</pre>';


$sql = "SELECT COUNT(*) as count FROM workers";
$result = mysqli_query($link, $sql) or die(mysqli_error($link));
$count = mysqli_fetch_assoc($result)['count'];
$pages = ceil($count/$notesOfPage);


if($page != 1) {
    $prevPage = $page - 1;
    echo "<a href=\"?page=$prevPage\"><<</a> ";
}

for($i = 1; $i <= $pages; $i++) {
    echo "<a href=\"?page=$i\">$i</a> ";
}

if($page != $pages) {
    $nextPage = $page + 1;
    echo "<a href=\"?page=$nextPage\">>></a> ";
}
