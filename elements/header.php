<?php

function createLink($href, $text) {

    if(
        (!isset($_GET['page']) && $href == '/')
        || (isset($_GET['page']) && $_GET['page'] == $href)
    ) {
        $class = ' class = "active"';
    } else {
        $class = '';
    }

    if($href != '/') {
        $hrefPart = '/?page=';
    } else {
        $hrefPart = '/';
    }

    echo "<a href=\"$hrefPart$href\"$class>$text</a>";
}

function getLinks() {
    global $pdo;
    $sql = "SELECT * FROM pages WHERE url!='404'";
    $sth = $pdo -> query($sql);
    $data = $sth -> fetchAll(PDO::FETCH_ASSOC);

    return $data;
}

function createLinks($data) {
    foreach ($data as $page) {
        createLink($page['url'], $page['text']);
    }
}

createLinks(getLinks());
