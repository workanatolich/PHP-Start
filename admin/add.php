<?php

$pdo = new PDO('mysql:host=database; dbname=guestBook; charset=utf8', 'root', 'test');

function addPage($pdo) {
    if(isset($_POST['title']) && isset($_POST['url']) && isset($_POST['text'])) {
        $title = $_POST['title'];
        $url = $_POST['url'];
        $text = $_POST['text'];


        $sql = "SELECT COUNT(*) as count FROM pages WHERE url='$url'";
        $sth = $pdo->query($sql);
        $isPage = $sth->fetch(PDO::FETCH_ASSOC)['count'];

        if ($isPage) {
            return 'Page with this url already exists';
        } else {
            $sql = "INSERT INTO pages (title,url,text) VALUES('$title', '$url', '$text')";
            $sth = $pdo->query($sql);

            header("Location: /admin/?added=true");
        }
    } else {
        return '';
    }
}

function getPage($info = '') {

    $title = 'Admin add new page';

    if(isset($_POST['title'], $_POST['url'] , $_POST['text'])) {
        $title = $_POST['title'];
        $url = $_POST['url'];
        $text = $_POST['text'];
    } else {
        $title = '';
        $url = '';
        $text = '';
    }

    $content =
        "<form method='post'>
              <div class=\"form-group\">
                <label for=\"inputTitle1\">Title</label>
                <input type=\"text\" name='title' class=\"form-control\" id=\"inputTitle1\" value=\"$title\">
             </div>
             
             <div class=\"form-group\">
                <label for=\"inputUrl1\">URL</label>
                <input type=\"text\" name='url' class=\"form-control\" id=\"inputUrl1\" value=\"$url\">
             </div>
             
             <div class=\"form-group\">
                <label for=\"inputText\">Text</label>
                <textarea name=\"text\" class=\"form-control\" rows='3'>$text</textarea>
             </div>
   
                                     
            <button class=\"btn btn-success\" type=\"submit\">Submit</button>
        </form>    ";

    include 'layout.php';
}

$info = addPage($pdo);
getPage($info);
