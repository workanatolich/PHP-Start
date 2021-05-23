<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');


$pdo = new PDO('mysql:host=database; dbname=guestBook; charset=utf8', 'root', 'test');
$sql = "SELECT title,url FROM pages";
$sth = $pdo ->query($sql);
$data = $sth -> fetchAll(PDO::FETCH_ASSOC);

$title = 'admin main page';
$content = '<table class="table">
             <thead>
                <tr> 
                    <th scope="col">Title</th> 
                    <th scope="col">Url</th>
                    <th scope="col">Actions</th> 
                </tr>
              </thead>
              <tbody>';

foreach ($data as $value) {
    $content .= "<tr> 
                    <td>{$value['title']}</td>
                    <td>{$value['url']}</td>
                    <td>
                        <a href=\"\" class=\"btn btn-warning\">Edit</a>
                        <a href=\"\" class=\"btn btn-danger\">Delete</a>
                    </td>
                </tr>";
}
$content .= '</tbody></table>';

include 'layout.php';

