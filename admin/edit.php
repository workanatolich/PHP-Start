<?php


$pdo = new PDO('mysql:host=database; dbname=guestBook; charset=utf8', 'root', 'test');


function editPage($pdo)
{

    if (isset($_POST['title']) && isset($_POST['url']) && isset($_POST['text'])) {
        $title = $_POST['title'];
        $url = $_POST['url'];
        $text = $_POST['text'];

        $sql = "SELECT COUNT(*) as count FROM pages WHERE url='$url'";
        $sth = $pdo -> query($sql);
        $isPage = $sth -> fetch(PDO::FETCH_ASSOC)['count'];

        if($isPage) {
            return 'Page with this url already exists';
        } else {
            $id = $_GET['edit'];
            $sql = "UPDATE pages SET title='$title',url='$url',text='$text' WHERE id='$id'";
            $sth = $pdo->query($sql);

            header('Location: /admin/?edited=true');
        }

    } else {
        return '';
    }

}

function getPage($pdo) {
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
    }

    $sql = "SELECT * FROM pages WHERE id='$id'";
    $sth = $pdo -> query($sql);
    $data = $sth -> fetch(PDO::FETCH_ASSOC);

    return $data;
}

function getLayoutPage($data, $info='')
{

    $title = 'Admin edit the page';

    if (isset($_POST['title'], $_POST['url'], $_POST['text'], $_POST['submit'])) {
        $title = $_POST['title'];
        $url = $_POST['url'];
        $text = $_POST['text'];
    } else {
        $title = $data['title'];
        $url = $data['url'];
        $text = $data['text'];
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

$data = getPage($pdo);
$info = editPage($pdo);
getLayoutPage($data, $info);
