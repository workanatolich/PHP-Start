<?php

$files = array_diff(scandir('dir'), ['.','..']);

foreach ($files as $file) {
    if(is_file('dir/'.$file)) {
        echo 'File ' .$file .'<br>';
    }

    if(is_dir('dir/'.$file)) {
        echo 'Directory ' .$file .'<br>';
    }

}