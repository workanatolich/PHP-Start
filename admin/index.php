<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

$pdo = new PDO('mysql:host=database; dbname=guestBook; charset=utf8', 'root', 'test');

function showPageTable($pdo, $info = '') {
    $sql = "SELECT id,title,url FROM pages";
    $sth = $pdo ->query($sql);
    $data = $sth -> fetchAll(PDO::FETCH_ASSOC);


    $content = '<a href="add.php" class="btn btn-success">Add a page</a>
        <table class="table">
             <thead>
                <tr> 
                    <th scope="col">Title</th> 
                    <th scope="col">Url</th>
                    <th scope="col">Actions</th> 
                </tr>
              </thead>
              <tbody>';

    foreach ($data as $page) {
        $content .= "<tr> 
                    <td>{$page['title']}</td>
                    <td>{$page['url']}</td>
                    <td>
                        <a href=\"edit.php?edit={$page['id']}\" class=\"btn btn-warning\">Edit</a>
                        <a href=\"delete.php?delete={$page['id']}\" class=\"btn btn-danger\">Delete</a>
                    </td>
                </tr>";
    }
    $content .= '</tbody></table>';

    $title = 'Admin main page';

    include 'layout.php';
}

if(isset($_GET['deleted'])) {
    $info = 'Page deleted successfully';
}

if(isset($_GET['added'])) {
    $info = 'Page added successfully';
}

if(isset($_GET['edited'])) {
    $info = 'Page edited successfully';
}


if(isset($info)) {
    showPageTable($pdo, $info);
} else {
    showPageTable($pdo);
}



